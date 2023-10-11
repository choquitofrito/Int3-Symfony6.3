<?php

namespace App\DataFixtures;

use Faker;
use DateTime;
use App\Entity\User;
use App\Entity\Personne;

//Faker
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PersonneUserFixtures extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');


        //creation des personnes 
        for ($i = 0; $i < 16; $i++) {
            $personne = new Personne();
            $personne->setNom($faker->lastName);
            $personne->setPrenom($faker->firstName);
            $personne->setDateNaissance($faker->dateTime());
            $personne->setContact1($faker->email);
            $personne->setContact2($faker->email);

            $manager->persist($personne);

            // users sans role
            $user = new User();
            $user->setEmail("user" . $i . "@gmail.com");
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password' . $i));
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);

            $user->setPerson($personne);
        }

        //creation des personnes 
        for ($i = 0; $i < 2; $i++) {
            $personne = new Personne();
            $personne->setNom($faker->lastName);
            $personne->setPrenom($faker->firstName);
            $personne->setDateNaissance($faker->dateTime());
            $personne->setContact1($faker->email);
            $personne->setContact2($faker->email);

            $manager->persist($personne);

            //creation des users ROLE_ADMIN
            $user = new User();
            $user->setEmail("usera" . $i . "@gmail.com");
            $user->setPassword($this->passwordHasher->hashPassword($user, 'passworda' . $i));
            $user->setRoles(['ROLE_ADMIN']);

            $manager->persist($user);
            $user->setPerson($personne);
        }

        //creation des personnes ROLE_COACH
        for ($i = 0; $i < 3; $i++) {
            $personne = new Personne();
            $personne->setNom($faker->lastName);
            $personne->setPrenom($faker->firstName);
            $personne->setDateNaissance($faker->dateTime());
            $personne->setContact1($faker->email);
            $personne->setContact2($faker->email);

            $manager->persist($personne);


            //creation des users ROLE_COACH
            $user = new User();
            $user->setEmail("userc" . $i . "@gmail.com");
            $user->setPassword($this->passwordHasher->hashPassword($user, "passwordc" . $i));
            $user->setRoles(['ROLE_COACH']);

            $manager->persist($user);
            $user->setPerson($personne);
        }


        $manager->flush();
    }
}
