<?php


namespace App\Controller;


use App\Controller\Form\FormType;
use App\Entity\FormMaleteo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/sendform", name="sendform")
     */
    public function sendform (Request $r, EntityManagerInterface $doctrine)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()){

            $datos = $form->getData();

            $datosformulario = new FormularioDato();
            $datosformulario->setName($datos["nombre"]);
            $datosformulario->setEmail($datos["email"]);
            $datosformulario->setCity($datos["ciudad"]);

            $doctrine->persist($datosformulario);
            $doctrine->flush($datosformulario);

            $this->addFlash('sucess', 'Ha solicitado su demo');
            $this->addFlash('sucess', 'En breve nos pondremos en contacto');

            return $this->redirectToRoute('homepage');

        }

    }

    /**
     * @Route("/backend", name="backend")
     */
    public function demo (EntityManagerInterface $doctrine)
    {
        $back = $doctrine->getRepository(FormMaleteo::class);
        $showbackend = $back->findAll();

        return $this->render('showback.html.twig', [
            'showbackend' => $showbackend
        ]);


    }

}