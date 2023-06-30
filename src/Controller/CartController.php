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
use SessionIdInterface;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController{
   
#[Route('/panier/cart', name: 'app_panier_cart')] 

 public function index(SessionInterface $session, PlatRepository $platRepository){
   $panier =$session->get('panier',[]);

   $panierWithData = [];

   foreach($panier as $id => $quantity){
   $panierWithData[] = [ 
      'plat'=> $platRepository->find($id),
      'quantity' => $quantity
   ];
   }

    return $this->render('panier/cart.html.twig', [
      'items' => $panierWithData
    ]);
 }

 /**
 * Route("/ panier" ajouter)
 */
 
 #[Route("/panier/add/{id}", name: "app_panier_ajouter")]

 public function add($id, Request  $request){
  $session = $request->getSession();

  $panier = $session->get('panier',[]);

  if(!empty($panier[$id])){
   $panier[$id]++;
  }else {

   $panier[$id] = 1;
  }

  $panier[$id ] = 1;

  $session->set('panier',$panier);
  dd($session->get('panier'));

 }



}
