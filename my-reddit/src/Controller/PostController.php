<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class PostController extends AbstractController
{

    /**
     * @Route("/", name="post_show_all")
     *
     * @param PostRepository $repository
     * @return Response
     */
    public function showAll(PostRepository $repository): Response
    {
        return $this->render('post/show_all.html.twig', [
            "posts" => $repository->findBy([], [ "id" => "DESC"], 10)
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}", name="post_show")
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            "post" => $post,
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/post/new", name="post_new")
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setUser($this->getUser());
            $post->setTotal(0);
            $post->setCreatedAt(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute("post_show_all");
        }
        return $this->render('post/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
