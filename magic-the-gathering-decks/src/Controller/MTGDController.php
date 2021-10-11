<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MTGDController extends AbstractController
{

    #[Route('/', name: 'mtgd_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('mtgd/index.html.twig');
    }

}
