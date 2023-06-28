<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\commande;
use App\Repository\CommandeRepository;
use App\Repository\CategorieRepository;
use App\Repository\DetailRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\PlatRepository;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig;

class CommandeController extends AbstractController
{
    // private $platRepo;
    // private $detailRepo;
    // private $commandeREpo;

    // public function __construct( PlatRepository $platRepo, DetailRepository $detailRepo  )
    // {
        
    //     $this->platRepo = $platRepo;
    //     $this->detailRepo = $detailRepo;
    //     $this->commandeRepo =$commandeRepo;
    // }

     //la route qui affiche les plats commandes
      
   #[Route('/commande', name: 'app_commande')]
   public function commande(Request $request): Response
   {
      
      

       return $this->render('commande.html.twig', [
           'controller_name' => 'PlatController',
          //  'Commandes'=> $Commandes
       ]);
   }
} 