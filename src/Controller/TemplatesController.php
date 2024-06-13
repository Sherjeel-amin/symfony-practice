<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\VideoFormType;
use App\Entity\Video;

class TemplatesController extends AbstractController
{
    #[Route('/templates', name: 'app_templates')]
    public function index(): Response
    {

        $users = ['Sherjeel','Hashim','Johan','Rashid'];  // Declare an array here
        $video = new Video();

        // $video->setTitle('Write Blog post');
        // $video->setCreatedAt(new \DateTime('tomorrow'));

        $form = $this->createForm(VideoFormType::class, $video);

        // $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
        }



        return $this->render('templates/index.html.twig', [
            'controller_name' => 'TemplatesController',
            'users' => $users, // we can pass the array to the template as a variable.
            'form' => $form->createView(),
        ]); 
    }                                              
}


