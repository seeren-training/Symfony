<?php

namespace App\Controller\Post;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends AbstractController
{

    /**
     * @param Post $post
     * @return Response
     */
    public function showAll(Post $post)
    {
        return $this->render('post/comment/show_all.html.twig', [
            'comments' => $this->getDoctrine()
                ->getRepository(Comment::class)
                ->findBy(["post" => $post]),
        ]);
    }

    /**
     * @param Post $post
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function new(
        Post $post,
        Request $request,
        User $user
    ): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setPost($post);
            $comment->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            header("Location: " . $this->generateUrl("post_show", ["id" => $post->getId()]));
            exit;
        }
        return $this->render('post/comment/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
