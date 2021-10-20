<?php

namespace App\Controller;

use App\Entity\Card;
use App\Repository\ColorRepository;
use App\Repository\DeckRepository;
use App\Repository\TypeRepository;
use Psr\Cache\CacheItemPoolInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[IsGranted('ROLE_USER')]
class CardController extends AbstractController
{

    #[Route('/card/{name<.{1,256}>}', name: 'card_active', methods: ['GET'])]
    public function active(
        string $name,
        DeckRepository $deckRepository,
        RequestStack $requestStack): Response
    {
        $deck = $deckRepository->findOneBy([
            'user' => $this->getUser(),
            'name' => $name
        ]);
        if ($deck) {
            $requestStack->getSession()->set('active-deck', $deck->getName());
        }
        return $this->redirectToRoute('card_index');
    }

    #[Route('/card', name: 'card_index', methods: ['GET'])]
    public function index(
        Request $request,
        ColorRepository $colorRepository,
        TypeRepository $typeRepository,
        DeckRepository $deckRepository,
        HttpClientInterface $httpClient): Response
    {
        $colors = $colorRepository->findAll();
        $color = current(array_filter(
            $colors,
            fn($color) => $color->getName() === ucfirst(strtolower($request->query->get('color')))
        ));
        $options = [
            'page' => abs((int)$request->query->get('page')),
            'colors' => false !== $color ? strtolower($color->getName()) : null
        ];
        if (0 === $options['page']) {
            $options['page'] = 1;
        }
        $apiCards = $httpClient->request(
            'GET',
            'https://api.magicthegathering.io/v1/cards?' . http_build_query($options)
        )->toArray()['cards'];
        $cards = [];
        foreach ($apiCards as $apiCard) {
            $card = new Card();
            $card->setName($apiCard['name']);
            if (array_key_exists('text', $apiCard)) {
                $card->setText($apiCard['text']);
            }
            if (array_key_exists('multiverseid', $apiCard)) {
                $card->setMultiverseId($apiCard['multiverseid']);
            }
            if (array_key_exists('manaCost', $apiCard)) {
                $card->setManaCost($apiCard['manaCost']);
            }
            if (array_key_exists('colors', $apiCard)) {
                foreach ($apiCard['colors'] as $color) {
                    $card->addColor($colorRepository->findOneByName($color));
                }
            }
            if (array_key_exists('types', $apiCard)) {
                foreach ($apiCard['types'] as $type) {
                    $card->addType($typeRepository->findOneByName($type));
                }
            }
            $cards[] = $card;
        }
        return $this->render('card/index.html.twig', [
            'colors' => $colors,
            'cards' => $cards,
            'options' => $options,
            'decks' => $deckRepository->findByUser($this->getUser(), [
                'id' => 'DESC'
            ]),
        ]);
    }

}
