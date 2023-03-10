<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class landingPageController extends AbstractController
{
    #[Route('/', name: 'landingPage')]
    public function index(): Response
    {
        return $this->render('landingPage/index.html.twig', [
            'controller_name' => 'landingPageController',
        ]);
    }
}
