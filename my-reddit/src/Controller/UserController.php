<?php

namespace App\Controller;

use App\Entity\User;
use App\Exception\EmailExistsException;
use App\Exception\InvalidFormException;
use App\Exception\PseudoExistsException;
use App\Form\UserType;
use App\Service\AppCore\FormValidator;
use App\Service\UserService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class UserController extends AbstractController
{

    /**
     * @IsGranted("IS_ANONYMOUS")
     * @Route("/user/new", name="user_new")
     *
     * @param Request $request
     * @param FormValidator $formValidator
     * @param UserService $userService
     * @param Session $session
     * @param TranslatorInterface $translator
     * @return Response
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function new(
        Request $request,
        FormValidator $formValidator,
        UserService $userService,
        Session $session,
        TranslatorInterface $translator
    ): Response
    {
        $form = $this->createForm(UserType::class, new User())->handleRequest($request);
        try {
            $formValidator->validate($form);
            $userService->new($form);
            $session->getFlashBag()->add("success", $translator->trans("user.new-success", [], "actions"));
            return $this->redirectToRoute("post_show_all");
        } catch (EmailExistsException $e) {
            $form->get("email")->addError(new FormError($translator->trans("user.email", [], "validators")));
        } catch (PseudoExistsException $e) {
            $form->get("pseudo")->addError(new FormError($translator->trans("user.pseudo", [], "validators")));
        } catch (InvalidFormException $e) {
        }
        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
