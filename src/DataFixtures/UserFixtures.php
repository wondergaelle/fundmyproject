<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setLastname("Floch");
        $admin->setFirstname("Gaëlle");
        $admin->setEmail("gaelle.floch@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "gfloch"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $this->setReference("Gaelle",$admin);//implements userId
        $manager->persist($admin);


        $lola = new User();
        $lola->setLastname("Tissier");
        $lola->setFirstname("Lola");
        $lola->setEmail("lola.tissier@gmail.com");
        $lola->setPassword($this->encoder->encodePassword( $lola, "lolat"));
        $lola->setRoles(["ROLE_USER"]);
        $this->setReference("Lola", $lola);//implements userId
        $manager->persist( $lola);

        $manager->flush();
    }
}
