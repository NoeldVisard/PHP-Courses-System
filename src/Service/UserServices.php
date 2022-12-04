<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserServices extends AbstractService
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager);
    }

    public function createUser($post, UserPasswordHasherInterface $userPasswordHasher): User
    {
        $newUser = new User(email: $_POST["email"]);
        $hashedPassword = $userPasswordHasher->hashPassword($newUser, $_POST["password"]);
        $newUser->setPassword($hashedPassword);
        return $newUser;
    }

    public function saveUser(User $user): void
    {
        $this->entityManager->getRepository(User::class)->save($user, true);
    }
}