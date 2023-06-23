<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Plat;
use App\Entity\Utilisateur;
use App\Entity\Detail;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //categories

        $categoriePizza = new Categorie();
        $categoriePizza->setLibelle("Pizza");
        $categoriePizza->setImage("pizza_cat.jpg");
        $categoriePizza->setActive(true);
        $manager->persist( $categoriePizza);

        $categorieBurger = new Categorie();
        $categorieBurger->setLibelle("Burger");
        $categorieBurger->setImage("burger_cat.jpg");
        $categorieBurger->setActive(true);
        $manager->persist($categorieBurger);

        $categoriewraps = new Categorie();
        $categoriewraps->setLibelle("Wraps");
        $categoriewraps->setImage("wraps_cat.jpg");
        $categoriewraps->setActive(true);
        $manager->persist($categoriewraps);


        $categoriePasta = new Categorie();
        $categoriePasta->setLibelle("Pasta");
        $categoriePasta->setImage("Pasta_cat.jpg");
        $categoriePasta->setActive(true);
        $manager->persist($categoriePasta);



        $categorieSandwich = new Categorie();
        $categorieSandwich->setLibelle("Sandwich");
        $categorieSandwich->setImage("sandwich_cat.jpg");
        $categorieSandwich->setActive(true);
        $manager->persist( $categorieSandwich);


        $categorieAsianFood = new Categorie();
        $categorieAsianFood->setLibelle("Asian Food");
        $categorieAsianFood->setImage("Asian Food_cat.jpg");
        $categorieAsianFood->setActive(true);
        $manager->persist($categorieAsianFood);


        
        $categorieSalade = new Categorie();
        $categorieSalade->setLibelle("Salade");
        $categorieSalade->setImage("Salade_cat.jpg");
        $categorieSalade->setActive(true);
        $manager->persist($categorieSalade);


        $categorieVeggie = new Categorie();
        $categorieVeggie->setLibelle("Veggie");
        $categorieVeggie->setImage("Veggie_cat.jpg");
        $categorieVeggie->setActive(true);
        $manager->persist($categorieVeggie);

        // plats


        $platDistrictBurger = new Plat();
        $platDistrictBurger->setLibelle("District Burger ");
        $platDistrictBurger->setDescription("Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits ");
        $platDistrictBurger->setPrix(8.00);
        $platDistrictBurger->setImage("hamburger_cat.jpg");
        $platDistrictBurger->setCategorie($categorieBurger);
        $platDistrictBurger->setActive(true);
        $manager->persist($platDistrictBurger);

        $platPizzaBianca = new Plat();
        $platPizzaBianca->setLibelle("Pizza Bianca");
        $platPizzaBianca->setDescription("Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.");
        $platPizzaBianca->setPrix(14.00);
        $platPizzaBianca->setImage("pizza-salmon.png");
        $platPizzaBianca->setCategorie($categoriePizza);
        $platPizzaBianca->setActive(true);
        $manager->persist($platPizzaBianca);


        $platWrap = new Plat();
        $platWrap->setLibelle("Buffalo Chicken Wrap");
        $platWrap->setDescription("Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.");
        $platWrap->setPrix(5.00);
        $platWrap->setImage("buffalo-chicken.jpg");
        $platWrap->setCategorie($categoriewraps);
        $platWrap->setActive(true);
        $manager->persist($platWrap);

        $platCheeseburger = new Plat();
        $platCheeseburger->setLibelle("Cheeseburger");
        $platCheeseburger->setDescription("Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.");
        $platCheeseburger->setPrix(8.00);
        $platCheeseburger->setImage("cheesburger.jpg");
        $platCheeseburger->setCategorie($categorieBurger);
        $platCheeseburger->setActive(true);
        $manager->persist($platCheeseburger);

        $platSpaghettiLe = new Plat();
        $platSpaghettiLe->setLibelle("Spaghetti aux légumes");
        $platSpaghettiLe->setDescription("Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.");
        $platSpaghettiLe->setPrix(10.00);
        $platSpaghettiLe->setImage("spaghetti-legumes.jpg");
        $platSpaghettiLe->setCategorie($categoriePasta);
        $platSpaghettiLe->setActive(true);
        $manager->persist($platSpaghettiLe);

        $platSCesar = new Plat();
        $platSCesar->setLibelle("Salade César");
        $platSCesar->setDescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $platSCesar->setPrix(07.00);
        $platSCesar->setImage("cesar_salad.jpg");
        $platSCesar->setCategorie($categorieSalade);
        $platSCesar->setActive(true);
        $manager->persist($platSCesar);

        $platPizzaMargherita = new Plat();
        $platPizzaMargherita->setLibelle("Pizza Margherita");
        $platPizzaMargherita->setDescription("Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre....");
        $platPizzaMargherita->setPrix(14.00);
        $platPizzaMargherita->setImage("pizza-margherita.jpg");
        $platPizzaMargherita->setCategorie($categoriePizza);
        $platPizzaMargherita->setActive(true);
        $manager->persist($platPizzaMargherita);

        $platCourgettes = new Plat();
        $platCourgettes->setLibelle("Courgettes farcies au quinoa et duxelles de champignons");
        $platCourgettes->setDescription("Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!");
        $platCourgettes->setPrix(08.00);
        $platCourgettes->setImage("courgettes_farcies.jpg");
        $platCourgettes->setCategorie($categorieVeggie);
        $platCourgettes->setActive(true);
        $manager->persist($platCourgettes);


        $platLasagnes = new Plat();
        $platLasagnes->setLibelle("Lasagnes");
        $platLasagnes->setDescription("Découvrez notre recette des lasagnes, l'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.");
        $platLasagnes->setPrix(12.00);
        $platLasagnes->setImage("lasagnes_viande.jpg");
        $platLasagnes->setCategorie($categoriePasta);
        $platLasagnes->setActive(true);
        $manager->persist($platLasagnes);

        $platsaumon = new Plat();
        $platsaumon->setLibelle("Tagliatelles au saumon");
        $platsaumon->setDescription("Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!");
        $platsaumon->setPrix(12.00);
        $platsaumon->setImage("tagliatelles_saumon.jpg");
        $platsaumon->setCategorie($categoriePasta);
        $platsaumon->setActive(true);
        $manager->persist($platsaumon);


       //Utilisateur

        $utilisateur1 = new Utilisateur();
        $utilisateur1->setNom("Macosso");
        $utilisateur1->setPrenom("Ervine");
        $utilisateur1->setTelephone("0712563487");
        $utilisateur1->setAdresse("5b rue de conde");
        $utilisateur1->setCp(80000);
        $utilisateur1->setVille("Amiens");
        $utilisateur1->setEmail("ervine.amiens@gmail.com");
        $utilisateur1->setPassword(125643);
        $utilisateur1->setRoles("admin");
        $manager->persist($utilisateur1);

        $utilisateur1 = new Utilisateur();
        $utilisateur1->setNom("Macosso");
        $utilisateur1->setPrenom("inacio");
        $utilisateur1->setTelephone("06125633637");
        $utilisateur1->setAdresse("5b rue de conde");
        $utilisateur1->setCp(80000);
        $utilisateur1->setVille("Amiens");
        $utilisateur1->setEmail("inacio.amiens@gmail.com");
        $utilisateur1->setPassword(65636247);
        $utilisateur1->setRoles("client");
        $manager->persist($utilisateur1);

     // Commandes

        $commande1 = new Commande();
        $commande1->setDateCommande(new \DateTime('2020-11-30 03:52:43'));
        $commande1->setTotal(16.00);
        $commande1->setEtat(1);
        $commande1->setUtilisateur($utilisateur1);
        $manager->persist($commande1);

        $commande2 = new Commande();
        $commande2->setDateCommande(new \DateTime('2020-11-30 04:07:17'));
        $commande2->setTotal(20.00);
        $commande2->setEtat(0);
        $commande2->setUtilisateur($utilisateur1);
        $manager->persist($commande2);


        $commande3 = new Commande();
        $commande3->setDateCommande(new \DateTime('2021-05-04 01:35:34'));
        $commande3->setTotal(10.00);
        $commande3->setEtat(2);
        $commande3->setUtilisateur($utilisateur1);
        $manager->persist($commande3);


        $commande4 = new Commande();
        $commande4->setDateCommande(new \DateTime('2021-07-20 06:10:37'));
        $commande4->setTotal(7.00);
        $commande4->setEtat(3);
        $commande4->setUtilisateur($utilisateur1);
        $manager->persist($commande4);


        $commande5 = new Commande();
        $commande5->setDateCommande(new \DateTime('2021-07-20 06:40:21'));
        $commande5->setTotal(8.00);
        $commande5->setEtat(1);
        $commande5->setUtilisateur($utilisateur1);
        $manager->persist($commande5);


        $commande6 = new Commande();
        $commande6->setDateCommande(new \DateTime('2021-07-20 06:40:57'));
        $commande6->setTotal(6.00);
        $commande6->setEtat(1);
        $commande6->setUtilisateur($utilisateur1);
        $manager->persist($commande6);


        $commande7 = new Commande();
        $commande7->setDateCommande(new \DateTime('2020-11-30 03:52:43'));
        $commande7->setTotal(16.00);
        $commande7->setEtat(1);
        $commande7->setUtilisateur($utilisateur1);
        $manager->persist($commande7);


        $commande8 = new Commande();
        $commande8->setDateCommande(new \DateTime('2020-11-30 03:52:43'));
        $commande8->setTotal(16.00);
        $commande8->setEtat(1);
        $commande8->setUtilisateur($utilisateur1);
        $manager->persist($commande8);

      // Detail
        $detail1 = new Detail();
        $detail1->setQuantite(2);
        $detail1->setCommande($commande1);
        $detail1->setPlat($platDistrictBurger);
        $manager->persist($detail1);
        

        $detail2 = new Detail();
        $detail2->setQuantite(3);
        $detail2->setCommande($commande2);
        $detail2->setPlat($platPizzaBianca);
        $manager->persist($detail2);

        $detail3 = new Detail();
        $detail3->setQuantite(4);
        $detail3->setCommande($commande3);
        $detail3->setPlat($platWrap);
        $manager->persist($detail3);

        $detail4 = new Detail();
        $detail4->setQuantite(5);
        $detail4->setCommande($commande4);
        $detail4->setPlat($platCheeseburger);
        $manager->persist($detail4);


        $detail5 = new Detail();
        $detail5->setQuantite(6);
        $detail5->setCommande($commande5);
        $detail5->setPlat($platSpaghettiLe);
        $manager->persist($detail5);

        $detail6 = new Detail();
        $detail6->setQuantite(7);
        $detail6->setCommande($commande6);
        $detail6->setPlat($platSCesar);
        $manager->persist($detail6);

        $detail7 = new Detail();
        $detail7->setQuantite(8);
        $detail7->setCommande($commande3);
        $detail7->setPlat($platPizzaMargherita);
        $manager->persist($detail7);

        $detail8 = new Detail();
        $detail8->setQuantite(4);
        $detail8->setCommande($commande2);
        $detail8->setPlat($platCourgettes);
        $manager->persist($detail8);



        $manager->flush();
    }
}
