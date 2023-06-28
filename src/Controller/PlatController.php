<?php

namespace App\Controller;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\commande;
use App\Entity\panier;
use App\Repository\CommandeRepository;
use App\Repository\CategorieRepository;
use App\Repository\DetailRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatController extends AbstractController
{
    private $platRepo;
    private $detailRepo;

    public function __construct( PlatRepository $platRepo, DetailRepository $detailRepo )
    {
        
        $this->platRepo = $platRepo;
        $this->detailRepo = $detailRepo;
        
    }

    //la route qui affiche la liste de tous les plats

    #[Route('/plat', name: 'app_plat')]
    public function index(): Response
    {
        $plats = $this->platRepo -> findAll();
       

        return $this->render('plat/index.html.twig', [
            'controller_name' => 'PlatController',
            'plats'=> $plats
        ]);
    }
    //la route qui affiche le détail d'un plat

    #[Route('/plat_detail/{id}', name: 'app_plat_detail')]
    public function  Plat_detail(Request $request, Plat $id): Response
      
      {
      if($id){
        $plat = $id;
      

        return $this->render('plat/plat_detail.html.twig', [
                'controller_name' => 'PlatController',
            
            'plat'=> $plat,
            
        ]);
        }
        $this->redirectToRoute('app_accueil');
    }
   //la route qui affiche les plats commandes
      
//    #[Route('plat/commande', name: 'app_commande')]
//    public function commande(): Response
//    {
      
      

    //    return $this->render('plat/commande.html.twig', [
        //    'controller_name' => 'PlatController',
        //    'Commandes'=> $Commandes
    //    ]);
//    }
}
