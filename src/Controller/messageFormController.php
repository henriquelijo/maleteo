<?php


namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class messageFormController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function sendMessage (Request $r, EntityManagerInterface $doctrine)
        $form = $this->createForm(MessageFormType::class);

}