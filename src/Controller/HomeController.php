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
          'name'=>'Garage',
          'description' =>'Vente de Voiture',
          'valeur' => 'Transparent , Sécurité , Accompagnement'
        ];
        return $this->render('accueil.html.twig', [

        ]);
    }
}