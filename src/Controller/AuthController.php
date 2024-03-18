<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route('/api/v1/auth', name: 'api_auth')]
    public function login(): Response
    {
        // Фактическая аутентификация будет обработана автоматически через security.json_login
        throw new \LogicException('This method should not be called directly.');
    }
}
