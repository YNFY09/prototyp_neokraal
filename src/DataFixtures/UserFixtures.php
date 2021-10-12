<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
$user->setEmail('ynfy09@gmail.com');
$user->setRoles(['ROLE_ADMIN']);
$user->setPassword($this->passwordEncoder->encodePassword(
$user,
12345678
));
$manager->persist($user);


        $manager->flush();
    }
}
