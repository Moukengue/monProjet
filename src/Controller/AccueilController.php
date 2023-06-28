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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController


{
    private $categorieRepo;
    private $platRepo;
    private $detailRepo;

    public function __construct(CategorieRepository $categorieRepo, PlatRepository $platRepo, DetailRepository $detailRepo )
    {
        $this->categorieRepo = $categorieRepo;
        $this->platRepo = $platRepo;
        $this->detailRepo = $detailRepo;
    }


    #[Route('/', name: 'app_accueil')]
    public function index( ): Response

       {


     $categories = $this->detailRepo->findCatPop();
    //  dd($categories);
     $plats = $this->detailRepo->Plat3();

     
    //  dd($plats);


        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'categories'=> $categories,
            'plats'=> $plats,
            
        ]);
    }

    #[Route('/recherche', name: 'app_recherche')]
    public function indexRecherche( Request $request): Response
       
       {
        //  dd($categories);
        $search = $request->request->get('recherche');
        // dd($search);
        $plats = $this->platRepo->getSomePlats($search);



        return $this->render('accueil/resultats_recherche.html.twig', [
            'controller_name' => 'AccueilController',
            
            'plats'=> $plats,
            
        ]);
    }

   
}
