<?php


namespace App\Controller;


use App\Entity\FormMaleteo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class messageFormController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function sendMessage (Request $r, EntityManagerInterface $doctrine)
    {
        $form = $this->createForm(MessageFormType::class);
        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()){
            $datos = $form-getData();

            $message = new FormMaleteo();
            $message->setUser($datos["user"]);
            $message->setMessage($datos['message']);

            $doctrine->persist($message);
            $doctrine->flush();

            $this->addFlash('sucess', 'su comentario ha sido añadido');
            return $this->redirect('homepage');
        }else{
            return $this->render('base.html.twig', [
                'messageForm' => $form->createView()
            ]);
        }

    }



}