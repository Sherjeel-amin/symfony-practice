<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RandomNumberController extends AbstractController
{
    #[Route('/random/number', name: 'app_random_number_tmp')]
    public function index(): Response
    {
        return $this->render('random_number/index.html.twig', [
            'controller_name' => 'Sherjeels Controller',
        ]);
    }
    #[Route('/show/{id}', name: 'app_random_number')]
    public function number(int $id): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body><h1>Lucky number: '.$number.' and your id is '.$id.'</h1></body></html>'
        );
    }

    #[Route('/message', name: 'message')]
    public function message(): Response
    {
        $message = 'Hello World!';

        return new Response(
            '<html><body><h1>'.$message.'</h1></body></html>'
        );
    }
}
