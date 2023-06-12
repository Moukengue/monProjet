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

        $categorie = new Categorie();
        $categorie->setLibelle("Pizza");
        $categorie->setImage("pizza_cat.jpg");
        $categorie->setActive(true);
        $manager->persist($categorie);

        $categorie1 = new Categorie();
        $categorie1->setLibelle("Burger");
        $categorie1->setImage("burger_cat.jpg");
        $categorie1->setActive(true);
        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setLibelle("Wraps");
        $categorie2->setImage("wraps_cat.jpg");
        $categorie2->setActive(true);
        $manager->persist($categorie2);


        $categorie3 = new Categorie();
        $categorie3->setLibelle("Pasta");
        $categorie3->setImage("Pasta_cat.jpg");
        $categorie3->setActive(true);
        $manager->persist($categorie3);



        $categorie4 = new Categorie();
        $categorie4->setLibelle("Sandwich");
        $categorie4->setImage("sandwich_cat.jpg");
        $categorie4->setActive(true);
        $manager->persist($categorie4);


        $categorie5 = new Categorie();
        $categorie5->setLibelle("Asian Food");
        $categorie5->setImage("Asian Food_cat.jpg");
        $categorie5->setActive(true);
        $manager->persist($categorie5);


        $categorie6 = new Categorie();
        $categorie6->setLibelle("Pasta");
        $categorie6->setImage("Pasta_cat.jpg");
        $categorie6->setActive(true);
        $manager->persist($categorie6);


        $categorie7 = new Categorie();
        $categorie7->setLibelle("Salade");
        $categorie7->setImage("Salade_cat.jpg");
        $categorie7->setActive(true);
        $manager->persist($categorie7);

        $categorie8 = new Categorie();
        $categorie8->setLibelle("Salade");
        $categorie8->setImage("Salade_cat.jpg");
        $categorie8->setActive(true);
        $manager->persist($categorie8);

        $categorie9 = new Categorie();
        $categorie9->setLibelle("Veggie");
        $categorie9->setImage("Veggie_cat.jpg");
        $categorie9->setActive(true);
        $manager->persist($categorie9);


        $plat = new Plat();
        $plat->setLibelle("District Burger ");
        $plat->setDescription("Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits ");
        $plat->setPrix(8.00);
        $plat->setImage("hamburger_cat.jpg");
        $plat->setCategorie($categorie1);
        $plat->setActive(true);
        $manager->persist($plat);

        $plat1 = new Plat();
        $plat1->setLibelle("Pizza Bianca");
        $plat1->setDescription("Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.");
        $plat1->setPrix(14.00);
        $plat1->setImage("pizza-salmon.png");
        $plat1->setCategorie($categorie1);
        $plat1->setActive(true);
        $manager->persist($plat1);


        $plat2 = new Plat();
        $plat2->setLibelle("Buffalo Chicken Wrap");
        $plat2->setDescription("Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.");
        $plat2->setPrix(5.00);
        $plat2->setImage("buffalo-chicken.webp");
        $plat2->setCategorie($categorie1);
        $plat2->setActive(true);
        $manager->persist($plat2);

        $plat3 = new Plat();
        $plat3->setLibelle("Cheeseburger");
        $plat3->setDescription("Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.");
        $plat3->setPrix(8.00);
        $plat3->setImage("cheesburger.jpg");
        $plat3->setCategorie($categorie1);
        $plat3->setActive(true);
        $manager->persist($plat3);

        $plat4 = new Plat();
        $plat4->setLibelle("Spaghetti aux légumes");
        $plat4->setDescription("Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.");
        $plat4->setPrix(10.00);
        $plat4->setImage("spaghetti-legumes.jpg");
        $plat4->setCategorie($categorie6);
        $plat4->setActive(true);
        $manager->persist($plat4);

        $plat5 = new Plat();
        $plat5->setLibelle("Salade César");
        $plat5->setDescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $plat5->setPrix(07.00);
        $plat5->setImage("cesar_salad.jpg");
        $plat5->setCategorie($categorie1);
        $plat5->setActive(true);
        $manager->persist($plat5);

        $plat6 = new Plat();
        $plat6->setLibelle("Pizza Margherita");
        $plat6->setDescription("Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre....");
        $plat6->setPrix(14.00);
        $plat6->setImage("pizza-margherita.jpg");
        $plat6->setCategorie($categorie);
        $plat6->setActive(true);
        $manager->persist($plat6);

        $plat7 = new Plat();
        $plat7->setLibelle("Courgettes farcies au quinoa et duxelles de champignons");
        $plat7->setDescription("Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!");
        $plat7->setPrix(08.00);
        $plat7->setImage("courgettes_farcies.jpg");
        $plat7->setCategorie($categorie1);
        $plat7->setActive(true);
        $manager->persist($plat7);


        $plat8 = new Plat();
        $plat8->setLibelle("Salade César");
        $plat8->setDescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $plat8->setPrix(07.00);
        $plat8->setImage("cesar_salad.jpg");
        $plat8->setCategorie($categorie8);
        $plat8->setActive(true);
        $manager->persist($plat8);


        $plat9 = new Plat();
        $plat9->setLibelle("Salade César");
        $plat9->setDescription("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $plat9->setPrix(07.00);
        $plat9->setImage("cesar_salad.jpg");
        $plat9->setCategorie($categorie8);
        $plat9->setActive(true);
        $manager->persist($plat9);



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


        $detail1 = new Detail();
        $detail1->setQuantite(2);
        $detail1->setCommande($commande1);
        $detail1->setPlat($plat);
        $manager->persist($detail1);



        $manager->flush();
    }
}
