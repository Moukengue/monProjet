<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Commande;
use App\Entity\Detail;
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
use Doctrine\ORM\EntityManagerInterface;
// use Symfony\Component\MailService;
use App\Service\MailService;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

class CommandeController extends AbstractController
{
    
    private $platRepo;
    private $userRepo;
    private $cs;
    private $security;
    private $em;
    private $requestStack;
    private $ms;


    public function __construct(PlatRepository $platRepo, UtilisateurRepository $userRepo, CartService $cs, Security $security, EntityManagerInterface $em, RequestStack $requestStack, MailService $ms){
        
        $this->platRepo = $platRepo;
        $this->userRepo = $userRepo;
        $this->cs=$cs;
        $this->security=$security;
        $this->em=$em;
        $this->requestStack=$requestStack;
        $this->ms=$ms;

    }


   #[Route('panier/commande', name: 'app_panier_commande')]
   public function commande(Request $request): Response
   {
    $this->denyAccessUnlessGranted("ROLE_USER");
    $user = $this->getUser();   
              
        // dd($monPanier);

        //on vérifie qu'il y a un utilisateur connecté

        if($user){
            //on récupère l'utilisateur de la base
            $utilisateur = $this->userRepo->findOneBy(["email"=>$user->getUserIdentifier()]);
            if($utilisateur){

               
                $monPanier = $this->cs->getCart();
                $total = 0;
                

                foreach ($monPanier as $item) {
                  $totalItem = $item['plat']->getPrix() * $item['quantity'];
                  $total += $totalItem;
                }
                //s'il n'y a rien on revient sur le panier

                if($total == 0){
                    return $this->redirectToRoute('app_panier_cart');
                }
                    
                
                $commande = new Commande();
                $commande->setDateCommande(new \DateTime());
                $commande->setTotal($total);
                $commande->setEtat(0);
                $commande->setUtilisateur($utilisateur);
                $this->em->persist($commande);

                foreach ($monPanier as $item) {
                    $plat = $item['plat'];
                    $quantite =$item['quantity'];

                    $detail= new Detail();
                    $detail->setQuantite($quantite);
                    $detail->setCommande($commande);
                    $detail->setPlat($plat);
                    $this->em->persist($detail);


                  }
                  ///envoyer un mail
                  $this->em-> flush();
                  $session = $this->requestStack->getSession();
                  $session->remove('panier');
                  $exp = "thedistrict@district.com";
                  $dest = $utilisateur->getEmail();
                  $subject = "Confirmation de commande";
                  //Mettre le prenom dans mon mail
                  $prenom = $utilisateur->getprenom();
                  
                  $text = "Hello $prenom,Toute l'équipe de The district  Vous remercie de votre Commande.On a des nouveautés toutes les semaines! de quoi a vous faire plaisir à vo-lon-té. ";

                  
                //   Il te faut au moins 4 paramètres (exp, destinataire, subject, text.....)
                   $this->ms->sendEmail($exp, $dest, $subject, $text);



                  return $this->redirectToRoute('app_commande_detail', ["commande"=> $commande->getId()]);



            }else{
                //sinon, on le redirige vers login
                return $this->redirectToRoute('app_login');
            }
        } return $this->redirectToRoute('app_login');

              
    
   }

   #[Route('/commande_detail/{commande}', name: 'app_commande_detail')]

    public function getCommandeDetail(Commande $commande){

         
        return $this->render('panier/commande.html.twig', [
            'controller_name' => 'CommandeController',
            'commande'=>$commande
           
             
        ]);

    }
    }
