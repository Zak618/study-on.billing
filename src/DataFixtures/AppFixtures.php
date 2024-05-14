<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Создаем пользователей
        $this->loadUsers($manager);

        // Создаем курсы
        $this->loadCourses($manager);
    }

    private function loadUsers(ObjectManager $manager): void
    {
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $user->setEmail("user@example.com");
        $user->setPassword($this->hasher->hashPassword($user, 'password123'));
        $user->setBalance(100.0);

        $manager->persist($user);

        $admin = new User();
        $admin->setRoles(['ROLE_SUPER_ADMIN']);
        $admin->setEmail("admin@example.com");
        $admin->setPassword($this->hasher->hashPassword($admin, 'adminpassword'));
        $admin->setBalance(5000.0);

        $manager->persist($admin);

        $manager->flush();
    }

    private function loadCourses(ObjectManager $manager): void
{
    $course1 = new Course();
    $course1->setCode("course_101");
    $course1->setName("Introduction to Programming");
    $course1->setDescription("Learn the basics of programming with this introductory course.");
    $course1->setType(Course::TYPE_BUY);
    $course1->setPrice(29.99);
    $manager->persist($course1);

    $course2 = new Course();
    $course2->setCode("course_102");
    $course2->setName("Advanced Web Development");
    $course2->setDescription("Dive deeper into web development techniques with this advanced course.");
    $course2->setType(Course::TYPE_RENT);
    $course2->setPrice(49.99);
    $manager->persist($course2);

    $course3 = new Course();
    $course3->setCode("course_103");
    $course3->setName("Data Science Fundamentals");
    $course3->setDescription("Explore the fundamentals of data science, from data manipulation to machine learning.");
    $course3->setType(Course::TYPE_FREE); // Бесплатный курс
    $course3->setPrice(0); // Цена устанавливается в 0 для бесплатных курсов
    $manager->persist($course3);

    $manager->flush();
}

}
