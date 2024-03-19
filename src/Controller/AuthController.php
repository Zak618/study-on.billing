<?php

namespace App\Controller;

use App\Dto\RegistrationRequest;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\TokenGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;


class AuthController extends AbstractController
{
    #[Route('/api/v1/auth', name: 'api_auth')]
    public function login(): Response
    {
        throw new \LogicException('Этот метод не следует вызывать напрямую.');
    }


    /**
     * @OA\Post(
     *     path="/api/v1/register",
     *     summary="Регистрация нового пользователя",
     *     description="Создает нового пользователя и возвращает JWT токен.",
     *     @OA\RequestBody(
     *         description="Данные нового пользователя",
     *         required=true,
     *         @OA\JsonContent(
     *             ref=@Model(type=RegistrationRequest::class)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Пользователь успешно создан",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="token", type="string", example="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."),
     *             @OA\Property(property="roles", type="array", @OA\Items(type="string"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверные данные для регистрации"
     *     )
     * )
     */
    #[Route('/api/v1/register', name: 'api_register', methods: ['POST'])]
    public function register(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, TokenGeneratorInterface $tokenGenerator, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        $registrationRequest = $serializer->deserialize($request->getContent(), RegistrationRequest::class, 'json');

        $errors = $validator->validate($registrationRequest);
        if (count($errors) > 0) {
            $errorsJson = $serializer->serialize($errors, 'json');
            return new Response($errorsJson, Response::HTTP_BAD_REQUEST);
        }

        $existingUser = $userRepository->findOneBy(['email' => $registrationRequest->email]);
        if ($existingUser) {
            return $this->json(['message' => 'Пользователь с таким email уже существует!'], Response::HTTP_BAD_REQUEST);
        }

        $user = new User();
        $user->setEmail($registrationRequest->email);
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($passwordHasher->hashPassword($user, $registrationRequest->password));

        $entityManager->persist($user);
        $entityManager->flush();

        $token = $tokenGenerator->generateToken($user);

        return $this->json([
            'token' => $token,
            'roles' => $user->getRoles(),
        ]);
    }

    /**
    * @OA\Get(
        *     path="/api/v1/users/current",
        *     summary="Получение информации о текущем пользователе",
        *     description="Возвращает информацию о текущем аутентифицированном пользователе.",
        *     @OA\Response(
        *         response=200,
        *         description="Информация о пользователе",
        *         @OA\JsonContent(
        *             type="object",
        *             @OA\Property(property="username", type="string", example="user@example.com"),
        *             @OA\Property(property="roles", type="array", @OA\Items(type="string")),
        *             @OA\Property(property="balance", type="number", example=100.0)
        *         )
        *     ),
        *     @OA\Response(
        *         response=404,
        *         description="Пользователь не найден"
        *     )
        * )
        */

    #[Route('/api/v1/users/current', name: 'get_current_user', methods: ['GET'])]
    public function getCurrentUser(#[CurrentUser] ?User $user): JsonResponse
    {
        if (!$user) {
            return $this->json(['message' => 'Пользователь не найден('], 404);
        }

        return $this->json([
            'username' => $user->getUserIdentifier(),
            'roles' => $user->getRoles(),
            'balance' => $user->getBalance(),
        ]);
    }
}
