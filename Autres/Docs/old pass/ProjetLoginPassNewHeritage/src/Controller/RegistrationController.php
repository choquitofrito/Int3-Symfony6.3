<?php

namespace App\Controller;

use App\Entity\Formateur;
use App\Entity\Utilisateur;
use App\Form\FormateurFormType;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    
    
    #[Route('/reg/formateur', name: 'app_register_formateur')]
    public function registerFormateur(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $formateur = new Formateur();
        $form = $this->createForm(FormateurFormType::class, $formateur);
        $form->handleRequest($request);
        // dd($formateur);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $formateur->setPassword(
            $userPasswordHasher->hashPassword(
                    $formateur,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($formateur);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register_formateur.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

}
