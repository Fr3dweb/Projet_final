<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationsController extends AbstractController
{
    #[Route('/formations', name: 'app_formations')]
    public function index(FormationRepository $formationRepository): Response
    {
        return $this->render('formations/index.html.twig', [
            'formations' => $formationRepository->findAll()
        ]);
    }

    #[Route('/formations/{id}', name: 'app_formations_show', methods: ['get'])]
    public function show(Formation $formation): Response
    {
        return $this->render('formations/show.html.twig', [
            'formation' => $formation
        ]);
    }

}
