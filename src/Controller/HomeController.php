<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController 
{
    #[Route('/', name : 'app_homepage')]
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
    #[Route('/client', name : 'app_client')]
    public function client(): Response
    {
        $accueil = [
          'name'=>'Garage',
          'description' =>'Vente de Voiture',
          'valeur' => 'Transparent , Sécurité , Accompagnement'
        ];
        return $this->render('client.html.twig', [

        ]);
    }
}