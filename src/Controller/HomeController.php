<?php

namespace App\Controller;

use App\Entity\Immobilier;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * 
     * @Route("/", name="index")
     * @Route("/accueil", name="accueil")
     * 
     */
    public function index()
    {
        // Connexion à Doctrine,
        // Connexion au Repository,
        $repo = $this->getDoctrine()->getRepository(Immobilier::class);
        $immobiliers = $repo->findAll();

        return $this->render('home/index.html.twig', [
           'controller_name' => 'HomeController',
            // passage du contenu de $immobilier
            'immobiliers'=>$immobiliers
        ]);
    }

     /**
    * @Route("/article/{id}", name="index.affich")
    */
    // recuperation de l'identifiant
    public function affich($id ) 
    {
        // Appel à Doctrine & au repository
        $repo = $this->getDoctrine()->getRepository(Immobilier::class);

        //Recherche de l'article avec son identifaint
        $immobilier = $repo->find($id);
        // Passage à Twig de tableau avec des variables à utiliser
        return $this->render('home/affich.html.twig', [
            'controller_name' => 'HomeController',
            'immobilier' => $immobilier
        ]);
    }


    /**
    * @Route("/apropos", name="apropos")
    */
    public function apropos()
    {
        return $this->render('home/apropos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
    * @Route("/page", name="page")
    */
    public function page()
    {
        return $this->render('home/page.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
