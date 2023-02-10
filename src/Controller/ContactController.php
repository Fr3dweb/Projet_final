<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    private $emailVerifier;

    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
            $form = $this->createForm(ContactFormType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $formData =$form -> getData();
//
//                $this->emailVerifier->sendEmail(
//                    new TemplatedEmail())
//                        ->from($formData ['email'])
//                        ->to('admin@longoformation.com', 'LongoFormation')
//                        ->subject('Longo Formation | Vous avez un mail de'. " " .($formData["firstame"]. " " . $formData["lastName"]))
//                        ->htmlTemplate();

            $this->addFlash('success', 'L\'e-mail a bien été envoyé!');


        }

        return $this->render('contact/index.html.twig', [
            'ContactFormType' => $form->createView(),
        ]);
    }
}
