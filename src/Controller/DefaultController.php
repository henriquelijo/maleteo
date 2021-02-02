<?php

namespace App\Controller;

use App\Controller\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * @Route("/maletea", name="homepape")
     */

    public function homepage (Request $r)
    {
        $form = $this ->createForm(FormType::class);
        //$form = $this->createForm(‘App\Form\FormType’); Hace lo mismo que la línea anterior.

        return $this->render('base.html.twig', [
            'formulario'=>$form->createView()
        ]);

    }

}