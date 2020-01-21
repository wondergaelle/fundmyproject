<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    /**
     * UserFixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager )
    {
       $admin = new User();
       $admin->setFirstname("Floch");
       $admin->setLastname("Gaëlle");
       $admin->setEmail("gaelle.floch@gmail.com");
       $admin->setPassword($this->encoder->encodePassword($admin,"gfloch"));
       $admin->setRoles(["ROLE_ADMIN"]);
       $manager->persist($admin);


        $manager->flush();
    }
}
