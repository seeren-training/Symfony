<?php

namespace App\Controller\Post;

use App\Entity\Post;
use App\Service\AppCore\CSRFValidator;
use App\Service\VotePostService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoteController extends AbstractController
{

    /**
     * @IsGranted("ROLE_USER")
     *
     * @Route("/post/{id<\d+>}/vote/down", name="post_vote_down")
     * @param Post $post
     * @param Request $request
     * @param CSRFValidator $csrfValidator
     * @param VotePostService $service
     * @return RedirectResponse
     */
    public function down(
        Post $post,
        Request $request,
        CSRFValidator $csrfValidator,
        VotePostService $service
    ): Response
    {
        $csrfValidator->validate("post_vote_down", $request->get("csrf_token"));
        $service->vote($post, false);
        return $this->redirectToRoute("post_show", ["id" => $post->getId()]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/post/{id<\d+>}/vote/up", name="post_vote_up")
     *
     * @param Post $post
     * @param Request $request
     * @param CSRFValidator $csrfValidator
     * @param VotePostService $service
     * @return Response
     */
    public function up(
        Post $post,
        Request $request,
        CSRFValidator $csrfValidator,
        VotePostService $service
    ): Response
    {
        $csrfValidator->validate("post_vote_up", $request->get("csrf_token"));
        $service->vote($post, true);
        return $this->redirectToRoute("post_show", ["id" => $post->getId()]);
    }

}
