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
     * @Route("/users", methods={"OPTIONS"})
     * @return Response
     */
    public function registerOptions(): Response
    {
        return $this->json([]);
    }

    /**
     * @Route("/users", methods={"POST"})
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
                $basicToken = base64_encode($user->getUsername() . ':' . $user->getPassword());
                $user->setToken($basicToken);
                $repository->upgradePassword($user, $encoder->encodePassword($user, $user->getPassword()));
                return $this->json($user, Response::HTTP_CREATED, [], ['groups' => ['public', 'private']]);
            }
            throw new InvalidArgumentException();
        } catch (UniqueConstraintViolationException $e) {
            return $this->json(['error' => 'Conflict'], Response::HTTP_CONFLICT);
        } catch (NotNullConstraintViolationException | InvalidArgumentException $e) {
            return $this->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/login", methods={"OPTIONS"})
     * @return Response
     */
    public function loginOptions(): Response
    {
        return $this->json([]);
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
                $rawPassword = $user->getPassword();
                $user = $repository->findOneBy(["email" => $user->getEmail()]);
                if (!$user || !$encoder->isPasswordValid($user, $rawPassword)) {
                    throw new RuntimeException();
                }
                return $this->json($user, Response::HTTP_OK, [], ['groups' => ['public', 'private']]);
            }
            throw new InvalidArgumentException();
        } catch (RuntimeException $e) {
            return $this->json(['error' => 'Not Found'], Response::HTTP_NOT_FOUND);
        } catch (InvalidArgumentException $e) {
            return $this->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
        }
    }

}
