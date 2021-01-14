<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use InvalidArgumentException;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/register", methods={"POST"})
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param UserRepository $repository
     * @return Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function register(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        UserRepository $repository): Response
    {
        $user = new User();
        $request->request->add(['user' => json_decode($request->getContent(), true)]);
        try {
            $form = $this->createForm(UserType::class, $user)->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $passwordHash = $encoder->encodePassword($user, $user->getPassword());
                $user->setToken(base64_encode($user->getUsername() . ':' . $passwordHash));
                $repository->upgradePassword($user, $passwordHash);
                return $this->json($user, Response::HTTP_CREATED, [], ['groups' => ['public', 'private']]);
            }
            throw new InvalidArgumentException();
        } catch (UniqueConstraintViolationException $e) {
            return $this->json(['error' => 'Conflict'], Response::HTTP_CONFLICT, [], ['groups' => 'public']);
        } catch (NotNullConstraintViolationException | InvalidArgumentException $e) {
            return $this->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST, [], ['groups' => 'public']);
        }
    }

    /**
     * @Route("/login", methods={"POST"})
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param UserRepository $repository
     * @return Response
     */
    public function login(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        UserRepository $repository): Response
    {
        $user = new User();
        $request->request->add(['user' => json_decode($request->getContent(), true)]);
        try {
            $form = $this->createForm(UserType::class, $user)->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $password = $user->getPassword();
                $user = $repository->findOneBy(["email" => $user->getEmail()]);
                if ($user && $encoder->isPasswordValid($user, $password)) {
                    return $this->json($user, Response::HTTP_OK, [], ['groups' => ['public', 'private']]);
                }
                throw new RuntimeException();
            }
            throw new InvalidArgumentException();
        } catch (RuntimeException $e) {
            return $this->json(['error' => 'Not Found'], Response::HTTP_NOT_FOUND, [], ['groups' => 'public']);
        } catch (InvalidArgumentException $e) {
            return $this->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST, [], ['groups' => 'public']);
        }
    }

}
