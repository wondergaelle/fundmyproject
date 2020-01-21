<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContributionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $proj1 = new Contribution();
        $proj1->setAmount("5500€");
        $manager->persist($proj1);

        $proj2 = new Contribution();
        $proj2->setAmount("12500€");
        $manager->persist($proj2);

        $proj3 = new Contribution();
        $proj3->setAmount("8000€");
        $manager->persist($proj3);

        $proj4 = new Contribution();
        $proj4->setAmount("4500€");
        $manager->persist($proj4);

        $manager->flush();
    }
}
