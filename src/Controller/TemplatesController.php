<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplatesController extends AbstractController
{
    #[Route('/templates', name: 'app_templates')]
    public function index(): Response
    {

        $users = ['Sherjeel','Hashim','Johan','Rashid'];  // Declare an array here

        return $this->render('templates/index.html.twig', [
            'controller_name' => 'TemplatesController',
            'users' => $users, // we can pass the array to the template as a variable.
        ]); 
    }                                              
}


