<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();

            $email = (new Email())
                ->from($formData['email'])
                ->to('admin@longoformation.com')
                ->subject($formData['firstName'] . ' ' . $formData['lastName'] . ' ' . $formData['formation'])
                ->text($formData['comment'])
                ->html($formData['comment']);

            $mailer->send($email);

            $this->addFlash('success', 'L\'e-mail a bien été envoyé!');
        }

        return $this->render('home/index.html.twig', [
            'ContactFormType' => $form->createView(),
        ]);
    }
    #[Route('/whoWeAre', name: 'app_whoWeAre')]
    public function whoWeAre(): Response
    {
        return $this->render('whoWeAre/index.html.twig');
    }
}