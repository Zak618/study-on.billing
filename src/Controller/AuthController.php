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

class AuthController extends AbstractController
{
    #[Route('/api/v1/auth', name: 'api_auth')]
    public function login(): Response
    {
        throw new \LogicException('Этот метод не следует вызывать напрямую.');
    }

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
}
