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
            // Hacher le mot de passe avant de sauvegarder l'utilisateur
            $hashedPassword = $passwordHasher->hashPassword($employee, $employee->getPassword());
            $employee->setPassword($hashedPassword);

            $employee->setRoles(['ROLE_EMPLOYEE']);
            $em->persist($employee);
            $em->flush();
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('admin/create_employee.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/user/create', name: 'admin_user_create')]
    public function createAdminUser(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
    
        $user->setEmail('admin1@gmail.com'); 
        $user->setRoles(['ROLE_ADMIN']);

        // Hacher le mot de passe avant de l'enregistrer
        $hashedPassword = $passwordHasher->hashPassword($user, '123');
        $user->setPassword($hashedPassword);
    
        $em->persist($user);
        $em->flush();

        return new Response('Le compte Admin a été créé avec succès!');
    }
}