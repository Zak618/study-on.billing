<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $hash;

    public function __construct(UserPasswordHasherInterface $hash)
    {
        $this->hash = $hash;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $user->setRoles(['ROLE_USER']);
        $password = $this->hash->hashPassword($user, 'password');
        $user->setEmail("user@gmail.com");
        $user->setPassword($password);

        $manager->persist($user);

        $manager->flush();

        $admin = new User();
        $admin->setRoles(['ROLE_SUPER_ADMIN']);
        $adminPassword = $this->hash->hashPassword($admin, 'password');
        $admin->setEmail("admin@gmail.com");
        $admin->setPassword($adminPassword);

        $manager->persist($admin);

        $manager->flush();
    }
}
