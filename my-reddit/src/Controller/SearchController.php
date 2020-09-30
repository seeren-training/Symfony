<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

    /**
     * @Route("/search/{query}", name="search_results")
     */
    public function results(string $query)
    {
        return $this->render('search/results.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    /**
     * @Route("/search/{query}/{date}", name="search_results_by_date")
     */
    public function resultsByDate(string $query, string $date)
    {
        return $this->render('search/results_by_date.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    /**
     * @Route("/search/{query}/{theme}", name="search_results_by_theme")
     */
    public function resultsByTheme(string $query, string $theme)
    {
        return $this->render('search/results_by_theme.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

}
