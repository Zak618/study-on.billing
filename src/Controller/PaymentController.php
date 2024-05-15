<?php

namespace App\Controller;

use App\Service\BillingClient;
use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CourseRepository;
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class PaymentController extends AbstractController
{
    /**
     * @OA\Post(
     *     path="/api/v1/courses/{code}/pay",
     *     summary="Оплата курса",
     *     description="Осуществляет оплату выбранного курса для текущего пользователя.",
     *     @OA\Parameter(
     *         name="code",
     *         in="path",
     *         required=true,
     *         description="Код курса, который нужно оплатить",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         description="Тело запроса не требуется для этого метода",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Оплата успешно проведена",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="course_type", type="integer", example=1),
     *             @OA\Property(property="expires_at", type="string", example="2021-12-31T23:59:59+00:00")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Требуется аутентификация"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Курс не найден"
     *     ),
     *     @OA\Response(
     *         response=402,
     *         description="Недостаточно средств для оплаты курса"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ошибка при проведении оплаты"
     *     )
     * )
     */
    #[Route('/api/v1/courses/{code}/pay', name: 'pay_course', methods: ['POST'])]
    public function payCourse(
        Request $request,
        EntityManagerInterface $em,
        CourseRepository $courseRepository,
        PaymentService $paymentService,
        string $code,
        #[CurrentUser] ?User $user
    ): JsonResponse {
        if (!$user) {
            return $this->json(['message' => 'Authentication required'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $course = $courseRepository->findOneByCode($code);
        if (!$course) {
            return $this->json(['message' => 'Course not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        if ($user->getBalance() < $course->getPrice()) {
            return $this->json(['message' => 'Кончились денюжки'], JsonResponse::HTTP_PAYMENT_REQUIRED);
        }

        if (!$paymentService->payForCourse($user, $course, $course->getPrice())) {
            return $this->json(['message' => 'Payment failed due to internal error'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->json([
            'success' => true,
            'course_type' => $course->getType(),
            'expires_at' => $course->getType() == 2 ? (new \DateTimeImmutable())->modify('+1 month')->format(\DateTime::ISO8601) : (new \DateTimeImmutable())->modify('+100 month')->format(\DateTime::ISO8601),
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/deposit",
     *     summary="Пополнение баланса",
     *     description="Позволяет пользователю пополнить свой баланс.",
     *     @OA\RequestBody(
     *         description="Сумма для пополнения",
     *         required=true,
     *         @OA\JsonContent(
     *             required={"amount"},
     *             @OA\Property(property="amount", type="number", example=100.0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Баланс успешно пополнен",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="balance", type="number", example=150.0)
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверная сумма пополнения"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Требуется аутентификация"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ошибка при пополнении"
     *     )
     * )
     */
    #[Route('/api/v1/deposit', name: 'deposit', methods: ['POST'])]
    public function deposit(Request $request, PaymentService $paymentService, #[CurrentUser] ?User $user): JsonResponse
    {
        if (!$user) {
            return $this->json(['message' => 'Authentication required'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $content = $request->getContent();
        file_put_contents('/tmp/logfile.log', $content . PHP_EOL, FILE_APPEND);

        $data = json_decode($content, true);
        $amount = $data['amount'] ?? null;

        if (!$amount || $amount <= 0) {
            return $this->json(['message' => 'Invalid amount'], JsonResponse::HTTP_BAD_REQUEST);
        }

        try {
            $paymentService->deposit($user, (float)$amount);
            return $this->json(['success' => true, 'balance' => $user->getBalance()]);
        } catch (\Exception $e) {
            return $this->json(['message' => 'Deposit failed: ' . $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
