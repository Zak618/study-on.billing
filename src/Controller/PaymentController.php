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

class PaymentController extends AbstractController
{
    #[Route('/api/v1/courses/{code}/pay', name: 'pay_course', methods: ['POST'])]
    public function payCourse(
        Request $request, 
        EntityManagerInterface $em, 
        CourseRepository $courseRepository, 
        PaymentService $paymentService,
        string $code, 
        #[CurrentUser] ?User $user
    ): JsonResponse
    {
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
    #[Route('/api/v1/deposit', name: 'deposit', methods: ['POST'])]
public function deposit(Request $request, PaymentService $paymentService, #[CurrentUser] ?User $user): JsonResponse
{
    if (!$user) {
        return $this->json(['message' => 'Authentication required'], JsonResponse::HTTP_UNAUTHORIZED);
    }

    // Debugging: Log the raw request content
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
