<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransactionRepository;
use Symfony\Component\Security\Core\Security;

class TransactionController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/api/v1/transactions', name: 'get_transactions', methods: ['GET'])]
    public function getTransactions(TransactionRepository $transactionRepository): JsonResponse
    {
        $user = $this->security->getUser();
        $transactions = $transactionRepository->findBy(['client' => $user]);

        $data = array_map(function ($transaction) {
            return [
                'id' => $transaction->getId(),
                'created_at' => $transaction->getCreatedAt()->format(\DateTime::ISO8601),
                'type' => $transaction->getType(),
                'course_code' => $transaction->getCourse() ? $transaction->getCourse()->getCode() : null,
                'amount' => $transaction->getAmount(),
                'expires_at' => $transaction->getExpiresAt() ? $transaction->getExpiresAt()->format(\DateTime::ISO8601) : null,
            ];
        }, $transactions);

        return $this->json($data);
    }
}
