<?php

namespace App\Controller;

use App\Repository\DeckRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]
class CardController extends AbstractController
{

    #[Route('/card', name: 'card_index', methods: ['GET'])]
    public function index(DeckRepository $deckRepository): Response
    {
        return $this->render('card/index.html.twig', [
            'decks' => $deckRepository->findByUser($this->getUser(), [
                'id' => 'DESC'
            ])
        ]);
    }

}
