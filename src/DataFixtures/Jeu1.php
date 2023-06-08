<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;

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

        $plat = new Plat();
        $plat->setLibelle("District Burger ");
        $plat->setDescription("Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits ");
        $plat->setPrix(8.00);
        $plat->setImage("hamburger_cat.jpg");
        $plat->setActive(true);
        $manager->persist($plat);


        $manager->flush();
    }
}
