<?php
namespace App\Service;

use App\Entity\Transaction;
use App\Entity\User;
use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class PaymentService
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function deposit(User $user, float $amount): void
    {
        $this->entityManager->getConnection()->beginTransaction();
        try {
            $transaction = new Transaction();
            $transaction->setClient($user)
                        ->setType('deposit')
                        ->setAmount($amount)
                        ->setCreatedAt(new \DateTimeImmutable());

            $user->setBalance($user->getBalance() + $amount);

            $this->entityManager->persist($transaction);
            $this->entityManager->flush();

            $this->entityManager->getConnection()->commit();
        } catch (\Exception $e) {
            $this->entityManager->getConnection()->rollBack();
            $this->logger->error("Failed to deposit: " . $e->getMessage());
            throw $e;
        }
    }

    public function payForCourse(User $user, Course $course, float $price): bool
    {
        if ($user->getBalance() < $price) {
            $this->logger->warning("Insufficient funds for user {$user->getId()} for course {$course->getId()}");
            return false;
        }

        $this->entityManager->getConnection()->beginTransaction();
        try {
            $transaction = new Transaction();
            $transaction->setClient($user)
                        ->setCourse($course)
                        ->setAmount($price)
                        ->setCreatedAt(new \DateTimeImmutable());

            if ($course->getType() == 1) {
                $transaction->setType('payment');
                $transaction->setExpiresAt((new \DateTimeImmutable())->modify('+100 month'));  // Purchase doesn't expire
            } elseif ($course->getType() == 2) {
                $transaction->setType('rent');
                $transaction->setExpiresAt((new \DateTimeImmutable())->modify('+1 month'));
            }

            $user->setBalance($user->getBalance() - $price);

            $this->entityManager->persist($transaction);
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->entityManager->getConnection()->commit();
            return true;
        } catch (\Exception $e) {
            $this->entityManager->getConnection()->rollBack();
            $this->logger->error("Failed to pay for course: " . $e->getMessage());
            return false;
        }
    }
}
