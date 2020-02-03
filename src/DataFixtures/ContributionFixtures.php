<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class ContributionFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $contribution = new Contribution();
        $contribution->setAmount(1000.00);
        $contribution->setUser($this->getReference("Gaelle"));
        $contribution->setProject($this->getReference("Good Girl"));
        $this->addReference("amount", $contribution);
        $manager->persist($contribution);



        $manager->flush();
    }


    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return[
            UserFixtures::class,
            ProjectFixtures::class
        ];
    }
}
