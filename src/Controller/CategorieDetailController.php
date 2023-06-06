<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieDetailController extends AbstractController
{
    #[Route('/categorie/detail', name: 'app_categorie_detail')]
    public function index(): Response
    {
        return $this->render('categorie_detail/index.html.twig', [
            'controller_name' => 'CategorieDetailController',
        ]);
    }
}
