<?php

namespace App\Controller;

use App\Entity\FormMaleteo;
use App\Form\FormType;
use App\Form\MessageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;



class DefaultController extends AbstractController
{
    /**
     * @Route("/maletea", name="homepage")
     */

    public function homepage (EntityManagerInterface $doctrine, Request $r)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()) {

            $datos = $form->getData();

            $datosformulario = new FormMaleteo();
            $datosformulario->setName($datos["nombre"]);
            $datosformulario->setEmail($datos["email"]);
            $datosformulario->setCity($datos["ciudad"]);



            $doctrine->persist($datosformulario);
            $doctrine->flush($datosformulario);


            $this->addFlash('success', 'Ha solicitado su demo');
            $this->addFlash('success', 'En breve nos pondremos en contacto');
        }
        return $this->render('base.html.twig', [
            'formulario'=>$form->createView()
            //'messageForm'=>$messageForm->createView()
        ]);

    }

}