<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this -> passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++)
        {
            $user = new User();
            $user->setNom('UserNom'.$i);
            $user->setPrenom('UserPrenom'.$i);
            $user->setSociete('UserSociete'.$i);
            $user->setTelephone('00000'.$i);
            $user->setAdresse('rue X n° '.$i);
            $user->setTva('BE000 '.$i);

            $user->setPassword(
                $this->passwordHasher->hashPassword($user, "test1234")
            );
            $user->setEmail('mail'.$i.'@gmail.com');

            $manager->persist($user);
            
            
        }
        
        $manager->flush();

        
    }
}
