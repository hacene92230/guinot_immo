<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BienGestionController extends AbstractController
{
    /**
     * @Route("/bien/ventes", name="ventes")
     */
    public function ventes()
    {
        return $this->render('bien_gestion/ventes.html.twig');
    }

    /**
     * @Route("/bien/locations", name="locations")
     */
    public function locations()
    {
        return $this->render('bien_gestion/ventes.html.twig');
    }
}
