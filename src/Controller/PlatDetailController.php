<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatDetailController extends AbstractController
{
    #[Route('/plat/detail', name: 'app_plat_detail')]
    public function index(): Response
    {
        return $this->render('plat_detail/index.html.twig', [
            'controller_name' => 'PlatDetailController',
        ]);
    }
}
