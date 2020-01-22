<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $goodgirl = new Project();
        $goodgirl->setName("Good Girl");
        $goodgirl->setImage("project1.jpg");
        $goodgirl->setExcerpt("Ce film parle de ...");
        $goodgirl->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $goodgirl->setGoal(5500.00);
        $goodgirl->prePersist();
        $goodgirl->addCategory($this->getReference("category-film"));
        $goodgirl->setUser($this->getReference("Gaelle"));
        $manager->persist($goodgirl);
        $this->addReference("Good Girl", $goodgirl);

        $lesyeux = new Project();
        $lesyeux->setName("Les yeux dans le bus");
        $lesyeux->setExcerpt("Revivez la grande épopée de l'équipe de France de football lors du mondial de football 2010.");
        $lesyeux->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $lesyeux->setGoal(12000.00);
        $lesyeux->setImage("placeholder.png");
        $lesyeux->prePersist();
        $lesyeux->addCategory($this->getReference("category-film"));
        $lesyeux->addCategory($this->getReference("category-sport"));
        $lesyeux->setUser($this->getReference("Gaelle"));
        $manager->persist($lesyeux);
        $this->addReference("Les yeux dans le bus", $lesyeux);

        $dabado = new Project();
        $dabado->setName("Dabado");
        $dabado->setExcerpt("Un jeu fantastique peint à la main. Plongez dans des aventures extra-ordinaires !");
        $dabado->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $dabado->setGoal(7500.00);
        $dabado->setImage("project3.jpg");
        $dabado->prePersist();
        $dabado->addCategory($this->getReference("category-film"));
        $dabado->addCategory($this->getReference("category-jeux"));
        $dabado->setUser($this->getReference("Gaelle"));
        $manager->persist($dabado);
        $this->addReference("Dabado", $dabado);

        $doosh = new Project();
        $doosh->setName("Doosh");
        $doosh->setExcerpt("Venez m'accompagner dans mon projet de création musicale avec clip vidéo !");
        $doosh->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $doosh->setGoal(8000.00);
        $doosh->setImage("project4.jpg");
        $doosh->prePersist();
        $doosh->addCategory($this->getReference("category-film"));
        $doosh->setUser($this->getReference("Gaelle"));
        $manager->persist($doosh);
        $this->addReference("Doosh", $doosh);

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
           CategoryFixtures::class,
       ];
    }
}
