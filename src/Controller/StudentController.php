<?php

namespace App\Controller;

use App\Entity\Students;
use App\Form\StudentsType;
use Doctrine\ORM\EntityManagerInterface;
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

            // Clear the form data by creating a new instance of Students
            $student = new Students();
            $form = $this->createForm(StudentsType::class, $student);

            // Add a flash message for success
            $this->addFlash('success', 'Student has been successfully added.');
        }

        // Render the form template with the form view and other variables
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
            'form' => $form->createView(), // Create a view representation of the form to render in Twig template
        ]);
    }
}
