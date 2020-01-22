<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $film = new Category();
        $film->setName("Films");
        $manager->persist($film);
        $this->addReference("category-film", $film);

        $sport = new Category();
        $sport->setName("Sport");
        $manager->persist($sport);
        $this->addReference("category-sport", $sport);

        $musique = new Category();
        $musique->setName("Musique");
        $manager->persist($musique);
        $this->addReference("category-musique", $musique);

        $jeux = new Category();
        $jeux->setName("Jeux");
        $manager->persist($jeux);
        $this->addReference("category-jeux", $jeux);



        $manager->flush();
    }
}
