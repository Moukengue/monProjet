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
use Symfony\Component\HttpFoundation\Request;
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

     //la route qui affiche le détail d'une catégorie

     #[Route('/categorie_detail/{id}', name: 'app_categorie_detail')]
     public function  categorie_detail(Request $request, Categorie $id): Response
       
       {
       if($id){
         $categorie = $id;
       
 
         return $this->render('categorie/categorie_detail.html.twig', [
                 'controller_name' => 'CategorieController',
             
             'categorie'=> $categorie,
             
         ]);
         }
         $this->redirectToRoute('app_accueil');
     }
}
