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
        $admin->setFirstname("Gaëlle");
        $admin->setLastname("Floch");
        $admin->setEmail("gaelle.floch@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "gfloch"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        $this->addReference("user-admin", $admin);

        $user = new User();
        $user->setFirstname("Lola");
        $user->setLastname("Tissier");
        $user->setEmail("lola.tissier@gmail.com");
        $user->setPassword($this->encoder->encodePassword($admin, "lola"));
        $manager->persist($user);
        $this->addReference("user-user", $user);

        $manager->flush();
    }

}
