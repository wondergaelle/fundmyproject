<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        // rechercher les données dans la base de données
        $projects = $this->getDoctrine()->getRepository(Project::class)->findAll();
        $categories =$this->getDoctrine()->getRepository(Category::class)->findAll();


        //envoyer les données dans la vue
        return $this->render('default/index.html.twig', [
            'projects'=>$projects,
            'categories'=>$categories,
        ]);
    }

    public function headerCategories(){
        $categories=$this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('default/_listcategory.html.twig',['categories'=>$categories]);
    }
}
