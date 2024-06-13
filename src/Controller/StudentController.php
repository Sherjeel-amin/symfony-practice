<?php

namespace App\Controller;

use App\Entity\Students;
use App\Form\StudentsType;
use Doctrine\ORM\EntityManagerInterface; // Include EntityManagerInterface to manage entity operations
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/students', name: 'students')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Create a new instance of Students entity
        $student = new Students();

        // Create the form using StudentsType form type class and pass the $student entity object
        $form = $this->createForm(StudentsType::class, $student);

        // Handle the form submission
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the $student object (which now contains form data) to the database
            $entityManager->persist($student);
            $entityManager->flush(); // Execute SQL INSERT query to save data

            // Optionally, redirect to a success page or perform other actions
            // return $this->redirectToRoute('students_success');
        }

        // Render the form template with the form view and other variables
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
            'form' => $form->createView(), // Create a view representation of the form to render in Twig template
        ]);
    }

    #[Route('/students/success', name: 'students_success')]
    public function success(): Response
    {
        // Render a success page after successful form submission
        return $this->render('student/success.html.twig');
    }
}
