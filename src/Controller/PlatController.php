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

class PlatController extends AbstractController
{
    private $platRepo;
    private $detailRepo;

    public function __construct( PlatRepository $platRepo, DetailRepository $detailRepo )
    {
        
        $this->platRepo = $platRepo;
        $this->detailRepo = $detailRepo;
    }

    #[Route('/plat', name: 'app_plat')]
    public function index(): Response
    {
        $plats = $this->platRepo -> findAll();
       

        return $this->render('plat/index.html.twig', [
            'controller_name' => 'PlatController',
            'plats'=> $plats
        ]);
    }

      
}
