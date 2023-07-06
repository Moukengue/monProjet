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
use App\Service\CartService;
use SessionIdInterface;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
   
    private $platRepo;
    private $userRepo;
    private $cs;


    public function __construct(PlatRepository $platRepo, UtilisateurRepository $userRepo,  CartService $cs){
     
        $this->platRepo = $platRepo;
        $this->userRepo = $userRepo;
        $this->cs = $cs;

    }

  #[Route('/panier/cart', name: 'app_panier_cart')]

  public function index()
  {
    $panierWithData = $this->cs->getCart();

    // $panier = $session->get('panier', []);



    // $panierWithData = [];

    // foreach ($panier as $id => $quantity) {
    //   $panierWithData[] = [
    //     'plat' => $platRepository->find($id),
    //     'quantity' => $quantity
    //   ];
    // }
    $total = 0;
    foreach ($panierWithData as $item) {
      $totalItem = $item['plat']->getPrix() * $item['quantity'];
      $total += $totalItem;
    }

    return $this->render('panier/cart.html.twig', [
      'items' => $panierWithData,
      'total' => $total
    ]);
  }

 

  #[Route("/panier/add/{id}", name: "app_panier_ajouter")]

  public function add($id, Request  $request)
  {
    $addPlat = $this->cs->addToCart($id);
    /**
     * Récuperer le panier
     */
    // $session = $request->getSession();
    /**
     *On récupére le panier actuel
     */
    // $panier = $session->get('panier', []);
    // dd($panier);

    //si le panier n'est pas vide, on ajoute les autres plats
//     if (!empty($panier[$id])) {
//       $panier[$id]++;
//     } else {
// //autrement ce sera notre premier plat
//       $panier[$id] = 1;
//     }

//     // $panier[$id] = 1;
//     // on sauvegarde dans le session

//     $session->set('panier', $panier);
//     // dd($session->get('panier'));
    return $this-> redirectToRoute('app_panier_cart');
  }

 
// Retire un produit
#[Route("/panier/remove/{id}", name: "app_panier_remove")]
 public function remove($id, Request  $request){
 
  $session = $request->getSession();

   $panier = $session->get('panier',[]);

   if(!empty($panier[$id])){
    // dd($panier[$id]);

    if($panier[$id] > 1){
      $panier[$id]--;
    }else{
      
      unset($panier[$id]);
    }

   
   }
   $session->set('panier',$panier);
   return $this-> redirectToRoute('app_panier_cart');

//   $session->set('panier',$panier);
//   // dd($session->get('panier'));

 }

}
