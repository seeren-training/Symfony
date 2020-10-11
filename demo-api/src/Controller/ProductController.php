<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{

    /**
     * @Route("/products", name="products_index", methods={"GET"})
     *
     * @param SerializerInterface $serializer
     * @param ProductRepository $repository
     * @return JsonResponse
     */
    public function index(
        SerializerInterface $serializer,
        ProductRepository $repository
    ): JsonResponse
    {
        return (new JsonResponse())
            ->setStatusCode(200)
            ->setContent($serializer->serialize($repository->findAll(), 'json'));
    }

    /**
     * @Route("/products", name="products_new", methods={"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function new(
        Request $request,
        SerializerInterface $serializer
    ): JsonResponse
    {
        $entity = new Product();
        $response = new JsonResponse();
        $request->request->add(['product' => json_decode($request->getContent(), true)]);
        $form = $this->createForm(ProductType::class, $entity)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $response
                ->setStatusCode(Response::HTTP_CREATED)
                ->setContent($serializer->serialize($entity, "json"));
        }
        return $response
            ->setStatusCode(Response::HTTP_BAD_REQUEST);
    }

}
