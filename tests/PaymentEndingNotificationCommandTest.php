<?php

namespace App\Tests\Command;

use App\Command\PaymentEndingNotificationCommand;
use App\Entity\Course;
use App\Entity\Transaction;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;

class PaymentEndingNotificationCommandTest extends TestCase
{
    public function testExecute()
    {
        // Mock the dependencies
        $mailer = $this->createMock(MailerInterface::class);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $userRepository = $this->createMock(UserRepository::class);

        // Mock User, Transaction, and Course entities
        $course = new Course();
        $course->setType(Course::TYPE_RENT);
        $course->setTitle('Test Course');

        $transaction = new Transaction();
        $transaction->setCourse($course);
        $transaction->setExpiresAt((new \DateTimeImmutable())->modify('+1 day')->setTime(12, 0, 0));

        $user = new User();
        $user->setEmail('user@example.com');
        $user->addTransaction($transaction);  // Add transaction to user

        // Configure the UserRepository mock to return the user
        $userRepository->method('findUsersWithEndingRentals')
                       ->willReturn([$user]);

        // Configure the MailerInterface mock to expect a send call
        $mailer->expects($this->once())
               ->method('send')
               ->with($this->callback(function (Email $email) {
                   return $email->getTo()[0]->getAddress() === 'user@example.com' &&
                          strpos($email->getTextBody(), 'Test Course') !== false;
               }));

        // Create the command with the mocked dependencies
        $command = new PaymentEndingNotificationCommand($mailer, $entityManager, $userRepository);

        // Set up the command tester
        $application = new Application();
        $application->add($command);
        $commandTester = new CommandTester($application->find('payment:ending:notification'));

        // Execute the command
        $commandTester->execute([]);

        // Check the output
        $this->assertStringContainsString('Notification emails have been sent successfully.', $commandTester->getDisplay());
    }
}
