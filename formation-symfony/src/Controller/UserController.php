<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use App\Repository\ProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

class UserController extends AbstractController
{

    #[Route('/user/{id<[0-9]{1,11}>}', name: 'user_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function show($id): Response
    {
        return $this->render('user/show.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route('/user/edit', name: 'user_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function edit(
        Request           $request,
        ProfileRepository $profileRepository,
        SluggerInterface  $slugger): Response
    {
        $user = $this->getUser();
        $profile = $user->getProfile() ?? new Profile();
        $form = $this->createForm(ProfileType::class, $profile)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $avatarFile = $form->get('avatar')->getData();
                if ($avatarFile) {
                    $newFilename = $slugger->slug(pathinfo($avatarFile->getClientOriginalName(), PATHINFO_FILENAME))
                        . uniqid()
                        . '.'
                        . $avatarFile->guessExtension();
                    $avatarFile->move(__DIR__ . '/../../public/uploads', $newFilename);
                    $profile->setAvatar($newFilename);
                }
                $profile->getUser() ? $profileRepository->update() : $profileRepository->insert($profile->setUser($user));
                return $this->redirectToRoute("user_edit");
            } catch (FileException $e) {
                $form->get('avatar')->addError(new FormError('Impossible de télécharger l\'avatar'));
            }
        }
        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
            'profile' => $profile
        ]);
    }

}
