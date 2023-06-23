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

class CategorieController extends AbstractController
{

    private $categorieRepo;
    private $detailRepo;

    public function __construct( categorieRepository $categorieRepo, DetailRepository $detailRepo )
    {
        
        $this->categorieRepo = $categorieRepo;
        $this->detailRepo = $detailRepo;
    }

    #[Route('/categorie', name: 'app_categorie')]
    public function index(categorieRepository $categorieRepo): Response
    {
        $categories = $categorieRepo -> findAll();
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'categories' => $categories
       
        ]);
    }
}
