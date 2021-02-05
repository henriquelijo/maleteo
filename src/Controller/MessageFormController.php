<?php


namespace App\Controller;


use App\Entity\FormMaleteo;
use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MessageFormType;

class MessageFormController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function sendMessage (Request $r, EntityManagerInterface $doctrine)
    {
        $form = $this->createForm(MessageFormType::class);
        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();

            $message = new Message();
            $message->setUser($datos["user"]);
            $message->setMessage($datos['message']);

            $doctrine->persist($message);
            $doctrine->flush();

            $this->addFlash('success', 'su comentario ha sido añadido');
            return $this->redirectToRoute('homepage');

        }
            return $this->render('message.html.twig', [
                'messageForm' => $form->createView()
            ]);


    }



}