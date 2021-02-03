<?php

namespace App\Controller;

use App\Controller\Form\FormType;
use App\Form\MessageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/maletea", name="homepage")
     */

    public function homepage (Request $r)
    {
        $form = $this ->createForm(FormType::class);
        $messaForm = $this->createForm(MessageFormType::class)
        //$form = $this->createForm(‘App\Form\FormType’); Hace lo mismo que la línea anterior.

        return $this->render('base.html.twig', [
            'formulario'=>$form->createView(),
            'messageForm'=>$messaForm->createView()
        ]);

    }

}