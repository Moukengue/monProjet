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
use App\Form\CommandeFormType;
use App\Service\CartService;
use Symfony\Component\HttpFoundation\RequestStack;

class CommandeController extends AbstractController
{
    
    private $platRepo;
    private $userRepo;
    private $cs;


    public function __construct(PlatRepository $platRepo, UtilisateurRepository $userRepo, CartService $cs){
        
        $this->platRepo = $platRepo;
        $this->userRepo = $userRepo;
        $this->cs=$cs;

    }


   #[Route('panier/commande', name: 'app_panier_commande')]
   public function commande(Request $request): Response
   {
    $this->denyAccessUnlessGranted("ROLE_USER");
    $user = $this->getUser();   
              
        
        $commande = new Commande();

        $monPanier = $this->cs->getCart();
        $total = 0;
        foreach ($monPanier as $item) {
          $totalItem = $item['plat']->getPrix() * $item['quantity'];
          $total += $totalItem;
        }
        // dd($monPanier);

        // $form = $this->createForm(CommandeFormType::class, $commande);
        // $form->handleRequest($request);

        // dd($panier); 

        

       return $this->render('panier/commande.html.twig', [
           'controller_name' => 'CommandeController',
           'panier' => $monPanier,
           'total' => $total
          
            
       ]);
    
   }
}
