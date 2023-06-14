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


    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response

       {


     $categories = $this->detailRepo->findCatPop();



        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'categories'=> $categories
        ]);
    }
}
