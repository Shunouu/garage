<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController 
{
    #[Route('/')]
    public function accueil(): Response
    {
        $accueil = [
          'name'=>'Agence Web',
          'description' =>'Voyager comme vous etes',
          'valeur' => 'Transparent , Sécurité , Accompagnement'
        ];
        return $this->render('base.html.twig', [

        ]);
    }

    #[Route('/destination')]
    public function destination(): Response
    {
        $destination = [
            'name' => 'Paris',
            'description' => "C'est beau",
        ];

        return $this->render('destination.html.twig', [
            'destination' => $destination,
        ]);
    }
    #[Route('/base')]
    public function base(): Response
    {
        $destination = [
            'name' => 'Paris',
            'description' => "C'est beau",
        ];

        return $this->render('base.html.twig', [
            'destination' => $destination,
        ]);
    }
}