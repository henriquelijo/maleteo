<?php

namespace App\Controller;

use App\Controller\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/maletea")
     */

    public function homepage (Request $r)
    {
        $form = $this ->createForm(FormType::class);

        $form ->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $this->addFlash('sucess',  'Su pedido ha sido recibido');
            $this->addFlash('sucess', 'Pronto nos pondremos en contacto con usted');
        }

        return $this->render('base.html.twig');

    }

}