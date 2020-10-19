<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Immobilier;
use App\Form\ImmobilierType;
use Symfony\Component\Validator\Constraints as Assert;
class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig');
    }
    /**
     * @Route("/test/form", name="form")
     */

    public function form(Request $request)
    {
   $immobilier = $this->getDoctrine()->getRepository(Immobilier::class);
$immobilier = new Immobilier();
        $form = $this->createForm(ImmobilierType::class, $immobilier);
    $form->handleRequest($request);
if ($form->isSubmitted() && $form->isValid()) {
        $immobilier->setCreatedAt(new \DateTime('now'));
	        $doctrine = $this->getDoctrine()->getManager();
	        $doctrine->persist($immobilier);
	        $doctrine->flush();
        return $this->redirectToRoute('test');
}
		return $this->render('test/form.html.twig', array('form' => $form->createView(),));
    }
}
