<?php

namespace App\Service;

use App\Repository\PlatRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;

class CartService {

    private $requestStack;
    private $platRepo;
    private $userRepo;


    public function __construct(RequestStack $requestStack, PlatRepository $platRepo, UtilisateurRepository $userRepo){
        $this->requestStack = $requestStack;
        $this->platRepo = $platRepo;
        $this->userRepo = $userRepo;

    }

    public function getCart()
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);
  
        $panierWithData = [];
  
      foreach ($panier as $id => $quantity) {
        $panierWithData[] = [
          'plat' => $this->platRepo->find($id),
          'quantity' => $quantity
        ];
      }
      $total = 0;
      foreach ($panierWithData as $item) {
        $totalItem = $item['plat']->getPrix() * $item['quantity'];
        $total += $totalItem;
      }
  
      return $panierWithData;
    }

    public function addToCart($id)
    {
     
      $session = $this->requestStack->getSession();
      /**
       *On récupére le panier actuel
       */
      $panier = $session->get('panier', []);
    //   dd($panier);
  
      //si le panier n'est pas vide, on ajoute les autres plats
      if (!empty($panier[$id])) {
        $panier[$id]++;
      } else {
  //autrement ce sera notre premier plat
        $panier[$id] = 1;
      }
  
      // $panier[$id] = 1;
      // on sauvegarde dans le session
  
      $session->set('panier', $panier);
      // dd($session->get('panier'));
      return $panier;
    }

}
