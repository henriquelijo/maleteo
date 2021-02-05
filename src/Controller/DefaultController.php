<?php

namespace App\Controller;

use App\Entity\FormMaleteo;
use App\Entity\Message;
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
        $repository = $doctrine->getRepository(Message::class);
        $message = $repository->findAll();
        shuffle($message);
        $message = array_slice($message, 0, 3);
        return $this->render('main.html.twig', [
            'formulario'=>$form->createView(),
            'messages'=> $message
            //'messageForm'=>$messageForm->createView()
        ]);

    }
    /**
     * @Route("/", name="home")
     */

    public function home ()
    {
        return $this->redirectToRoute('homepage');
    }


}