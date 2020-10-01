<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

    /**
     * @Route("/search/{query}", name="search_results")
     *
     * @return Response
     */
    public function results(): Response
    {
        return $this->render('search/results.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    /**
     * @Route("/search/{query}/{date}", name="search_results_by_date")
     * @return Response
     */
    public function resultsByDate(): Response
    {
        return $this->render('search/results_by_date.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    /**
     * @Route("/search/{query}/{theme}", name="search_results_by_theme")
     * @return Response
     */
    public function resultsByTheme(): Response
    {
        return $this->render('search/results_by_theme.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

}
