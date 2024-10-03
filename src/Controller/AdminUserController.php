<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EmployeeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminUserController extends AbstractController
{
    #[Route('/admin/employee/create', name: 'admin_employee_create')]
    public function createEmployee(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $employee = new User();
        $form = $this->createForm(EmployeeType::class, $employee);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employee->setRoles(['ROLE_EMPLOYEE']);
            $em->persist($employee);
            $em->flush();

            return $this->redirectToRoute('accueil.html.twig');
        }

        return $this->render('admin/create_employee.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/admin/user/create', name: 'admin_user_create')]
    public function createAdminUser(EntityManagerInterface $em): Response
    {
        $user = new User();

    
        $user->setEmail('admin@example.com'); 
        $user->setPassword('admin_password'); 
        $user->setRoles(['ROLE_ADMIN']); 

    
        $em->persist($user);
        $em->flush();

        return new Response('Le compte Admin!');
    }
}