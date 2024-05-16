<?php

namespace App\Tests\Command;

use App\Command\PaymentReportCommand;
use App\Entity\Course;
use App\Entity\Transaction;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment as TwigEnvironment;

class PaymentReportCommandTest extends TestCase
{
    public function testExecute()
    {
        // Мокаем зависимости
        $mailer = $this->createMock(MailerInterface::class);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $twig = $this->createMock(TwigEnvironment::class);

        // Мокаем сущности Course и Transaction
        $course = new Course();
        $course->setTitle('Test Course');
        $course->setType(Course::TYPE_RENT);

        $transaction = new Transaction();
        $transaction->setCourse($course);
        $transaction->setAmount(100);
        $transaction->setCreatedAt((new \DateTimeImmutable())->modify('-15 days'));

        $transaction2 = new Transaction();
        $transaction2->setCourse($course);
        $transaction2->setAmount(200);
        $transaction2->setCreatedAt((new \DateTimeImmutable())->modify('-10 days'));

        // Мокаем Query и QueryBuilder
        $query = $this->createMock(AbstractQuery::class);
        $query->expects($this->once())
              ->method('getResult')
              ->willReturn([$transaction, $transaction2]);

        $qb = $this->createMock(QueryBuilder::class);
        $qb->expects($this->once())
           ->method('where')
           ->willReturn($qb);
        $qb->expects($this->once())
           ->method('setParameter')
           ->willReturn($qb);
        $qb->expects($this->once())
           ->method('getQuery')
           ->willReturn($query);

        // Мокаем репозиторий для возврата QueryBuilder
        $transactionRepository = $this->createMock(EntityRepository::class);
        $transactionRepository->expects($this->once())
                              ->method('createQueryBuilder')
                              ->willReturn($qb);

        // Настраиваем EntityManager для возврата репозитория
        $entityManager->expects($this->once())
                      ->method('getRepository')
                      ->willReturn($transactionRepository);

        // Настраиваем TwigEnvironment для возврата сгенерированного HTML-отчета
        $twig->method('render')
             ->willReturn('<html>Report</html>');

        // Настраиваем MailerInterface для проверки вызова метода send
        $mailer->expects($this->once())
               ->method('send')
               ->with($this->callback(function (Email $email) {
                   return $email->getTo()[0]->getAddress() === 'admin@example.com' &&
                          strpos($email->getHtmlBody(), 'Report') !== false;
               }));

        // Создаем команду с замоканными зависимостями
        $command = new PaymentReportCommand($mailer, $entityManager, $twig);

        // Настраиваем CommandTester для тестирования команды
        $application = new Application();
        $application->add($command);
        $commandTester = new CommandTester($application->find('payment:report'));

        // Выполняем команду
        $commandTester->execute([]);

        // Проверяем вывод
        $this->assertStringContainsString('Payment report has been sent successfully.', $commandTester->getDisplay());
    }
}
