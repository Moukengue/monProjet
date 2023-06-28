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
use SessionIdInterface;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Route("/ panier")
 */

class PanierController extends AbstractController{
    
    //1
    // #[Route('/panier/panier', name: 'app_panier')]

    // public function index(Plat $plats): Response
    // {
       
    //     return $this->render('panier/panier.html.twig', [
    //         'controller_name' => 'PanierController',
    //         'plats'=> $plats
    //     ]);
    // }

    // #[Route("/add/{id}", name="add")]

    // dd($session);

    // public function add($id,SessionIdInterface $session){

        
    // }

    //2
 /**
 * Route("/ panier")
 */
// public function index(){

//     return $this->render('panier/panier.html.twig',[]);
// }

// /**
//  * @route("/add/{id}",name="add")
//  * 
//  */
// public function add($id,SessionInterface $session){
//     dd($session);
// }
      
#[Route('/panier/ajouter', name: 'app_panier_ajouter')]
public function panier_ajout(Plat $plats): Response
{

    //mes fonctions, ce que je veux envoyer à ma page : $moninfo
   
    return $this->render('panier/ajouter.html.twig', [
        'controller_name' => 'PanierController',
        //mes infos, mes resultats
        // 'mon_info' => $moninfo,
    ]);
}

public function add($id,SessionInterface $session){
        dd($session);
     }

}









?>