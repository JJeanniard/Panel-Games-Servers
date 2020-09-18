<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setUserEmail("jonas.du.trente.neuf@hotmail.fr");
        $user->setUserFistname("Jonathan");
        $user->setUserLastname("");
        $user->setUserPseudo("jonasbadboys");
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'tatata'));

        $user->flush();
    }
}
