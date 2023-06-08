<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $passwordEncoder) {}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i = 1; $i < 10; $i++){
            $user = new Users();
            $user->setEmail($faker->email);
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstName);
            $user->setAddress($faker->streetAddress);
            $user->setCity($faker->city);
            $user->setZipcode($faker->postcode);
            $user->setPassword($this->passwordEncoder->hashPassword($user, 'secret'));
            $manager->persist($user);
        }

        $admin = new Users();
        $admin->setEmail('ziad.bensaada7@gmail.com');
        $admin->setLastname('Ben Saada');
        $admin->setFirstname('Ziad');
        $admin->setAddress('Janah El Akhdar');
        $admin->setCity('Chefchaouen');
        $admin->setZipcode('91000');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, '159730'));
        $admin->setRoles(['Admin']);
        $manager->persist($admin);

        $manager->flush();
    }
}
