<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function sendEmail(MailerInterface $mailer, Request $request): Response
    {
            $form = $this->createForm(ContactFormType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $formData =$form -> getData();

                $email = (new Email())
                        ->from($formData['email'])
                        ->to('admin@longoformation.com')
                        ->subject($formData['firstName'].' '.$formData['lastName'].' '.$formData['formation'])
                        ->text($formData['comment'])
                        ->html($formData['comment']);

                $mailer->send($email);

                $this->addFlash('success', 'L\'e-mail a bien été envoyé!');
        }

        return $this->render('contact/index.html.twig', [
            'ContactFormType' => $form->createView(),
        ]);
    }
}
