<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $goodgirl = new Project();
        $goodgirl->setName("Good Girl");
        $goodgirl->setExcerpt("Ce film parle de ...");
        $goodgirl->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $goodgirl->setCreatedAt(new \ DateTime("2019-08-04 09:00:00"));
        $goodgirl->setGoal("5500€");
        $goodgirl->setUser("Paula Georges");
        $goodgirl->setImage("project1.jpg");
        $manager->persist($goodgirl);

        $lesyeux = new Project();
        $lesyeux->setName("Les yeux dans le bus");
        $lesyeux->setExcerpt("Revivez la grande épopée de l'équipe de France de football lors du mondial de football 2010.");
        $lesyeux->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $lesyeux->setCreatedAt(new \DateTime("2018-11-04 15:00:00"));
        $lesyeux->setGoal("12000€");
        $lesyeux->setUser("Alban Bin");
        $lesyeux->setImage("placeholder.png");
        $manager->persist($lesyeux);

        $dabado = new Project();
        $dabado->setName("Dabado");
        $dabado->setExcerpt("Un jeu fantastique peint à la main. Plongez dans des aventures extra-ordinaires !");
        $dabado->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $dabado->setCreatedAt(new \ DateTime("2019-07-06 12:00:00"));
        $dabado->setGoal("8000€");
        $dabado->setUser("Norah Jones");
        $dabado->setImage("project3.jpg");
        $manager->persist($dabado);

        $doosh =new Project();
        $doosh->setName("Doosh");
        $doosh->setExcerpt("Venez m'accompagner dans mon projet de création musicale avec clip vidéo !");
        $doosh->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $doosh->setCreatedAt(new \ DateTime("2019-06-06 10:00:00"));
        $doosh->setGoal("4500€");
        $doosh->setUser("Pasquito Pepe");
        $doosh->setImage("project4.jpg");
        $manager->persist($doosh);

        $manager->flush();
    }
}
