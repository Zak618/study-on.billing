<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment as TwigEnvironment;
use App\Entity\Course;
use App\Entity\Transaction;

class PaymentReportCommand extends Command
{
    protected static $defaultName = 'payment:report';

    private $mailer;
    private $entityManager;
    private $twig;

    public function __construct(MailerInterface $mailer, EntityManagerInterface $entityManager, TwigEnvironment $twig)
    {
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
        $this->twig = $twig;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Generates and sends a payment report for the last month.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Получение данных о транзакциях за последний месяц
        $lastMonth = (new \DateTime())->modify('-1 month');
        $transactions = $this->entityManager->getRepository(Transaction::class)
            ->createQueryBuilder('t')
            ->where('t.createdAt >= :lastMonth')
            ->setParameter('lastMonth', $lastMonth)
            ->getQuery()
            ->getResult();

        // Сбор данных для отчета
        $reportData = [];
        $totalAmount = 0;

        foreach ($transactions as $transaction) {
            $course = $transaction->getCourse();
            $courseName = $course->getTitle();
            $courseType = $course->getType() == Course::TYPE_RENT ? 'Аренда' : 'Покупка';
            $amount = $transaction->getAmount();

            if (!isset($reportData[$courseName])) {
                $reportData[$courseName] = [
                    'type' => $courseType,
                    'count' => 0,
                    'total' => 0,
                ];
            }

            $reportData[$courseName]['count']++;
            $reportData[$courseName]['total'] += $amount;
            $totalAmount += $amount;
        }

        // Генерация HTML отчета
        $reportHtml = $this->twig->render('email/payment_report.html.twig', [
            'reportData' => $reportData,
            'totalAmount' => $totalAmount,
            'startDate' => $lastMonth->format('d.m.Y'),
            'endDate' => (new \DateTime())->format('d.m.Y'),
        ]);

        // Отправка отчета по электронной почте
        $email = (new Email())
            ->from('no-reply@example.com')
            ->to('admin@example.com')
            ->subject('Отчет по оплатам за месяц')
            ->html($reportHtml);

        $this->mailer->send($email);

        $output->writeln('Payment report has been sent successfully.');

        return Command::SUCCESS;
    }
}
