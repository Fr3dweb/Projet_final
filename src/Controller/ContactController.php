<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ContactFormType;
use App\Security\EmailVerifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $user = new User();
        $form = $this->createForm(ContactFormType::class, $user);
        $form->handleRequest($request);

        $this->addFlash('success', 'L\'e-mail a bien été envoyé!');

        return $this->render('contact/index.html.twig', [
            'error' => $error,
            'ContactFormType' => $form->createView(),
        ]);
    }
}
