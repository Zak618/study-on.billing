<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Entity\Course;

class PaymentEndingNotificationCommand extends Command
{
    protected static $defaultName = 'payment:ending:notification';

    private $mailer;
    private $entityManager;
    private $userRepository;

    public function __construct(MailerInterface $mailer, EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Sends notification emails to users whose course rentals are ending soon.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $users = $this->userRepository->findUsersWithEndingRentals();

        foreach ($users as $user) {
            $transactions = $user->getTransactions()->filter(function($transaction) {
                $expiresAt = $transaction->getExpiresAt();
                $tomorrow = (new \DateTime())->modify('+1 day');
                return $transaction->getCourse()->getType() === Course::TYPE_RENT &&
                       $expiresAt >= $tomorrow->setTime(0, 0, 0) &&
                       $expiresAt < $tomorrow->modify('+1 day')->setTime(0, 0, 0);
            });

            if ($transactions->isEmpty()) {
                continue;
            }

            $courseNames = array_map(function($transaction) {
                return sprintf(
                    "%s действует до %s",
                    $transaction->getCourse()->getTitle(),
                    $transaction->getExpiresAt()->format('d.m.Y H:i')
                );
            }, $transactions->toArray());

            $courseList = implode("\n", $courseNames);

            $email = (new Email())
                ->from('no-reply@example.com')
                ->to($user->getEmail())
                ->subject('Уведомление об окончании срока аренды курсов')
                ->text(sprintf(
                    "Уважаемый клиент! У вас есть курсы, срок аренды которых подходит к концу:\n%s",
                    $courseList
                ));

            $this->mailer->send($email);
        }

        $output->writeln('Notification emails have been sent successfully.');

        return Command::SUCCESS;
    }
}
