<?php

namespace App\Controller;

use App\Entity\User;
use App\Exception\EmailExistsException;
use App\Exception\InvalidFormException;
use App\Exception\PseudoExistsException;
use App\Form\UserType;
use App\Service\UserService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @IsGranted("IS_ANONYMOUS")
     * @Route("/user/new", name="user_new")
     *
     * @param Request $request
     * @param UserService $service
     * @return Response
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function new(
        Request $request,
        UserService $service
    ): Response
    {
        $form = $this->createForm(UserType::class, new User())->handleRequest($request);
        try {
            $service->new($form);
            return $this->redirectToRoute("post_show_all");
        } catch (EmailExistsException $e) {
            $form->get("email")->addError(new FormError("Email already exists"));
        } catch (PseudoExistsException $e) {
            $form->get("pseudo")->addError(new FormError("Pseudo already exists"));
        } catch (InvalidFormException $e) {
        }
        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
