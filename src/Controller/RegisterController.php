<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(UsersRepository $usersRepository): Response
    {
        $users = $usersRepository->findAll();
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'users' => $users,
        ]);
    }

    #[Route('/register/new', name: 'app_register_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer un nouveau user
        $user = new User();
        // Créer le formulaire et lui donner l
        $formUser = $this->createForm(TeamType::class, $user);
        // Remplir le formulaire avec les informations de la requête
        $formUser->handleRequest($request);
        // si le formulaire est soumis et qu'il est valide :
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            // persister la nouvelle équipe
            $entityManager->persist($user);
            // enregistrer en base de données
            $entityManager->flush();
            // ajouter un message flash
            $this->addFlash('success', 'Nouvel utilisateur créé!');
            // rediriger vers l'index
            return $this->redirectToRoute('app_register');
        }
        return $this->render('register/index.html.twig', [
                'formUser' => $formUser->createView()
            ]
        );
    }

    #[Route('/user/edit/{id}', name: 'app_team_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager,UsersRepository $usersRepository, string $id): Response
    {
        $user = $usersRepository->find($id);
        // Créer le formulaire et lui donnéer le user
        $formUser = $this->createForm(TeamType::class, $user);
        // Remplir le formulaire avec les informations de la requête
        $formUser->handleRequest($request);
        // si le formulaire est soumis et qu'il est valide :
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            // persister la nouvelle équipe
            $entityManager->persist($user);
            // enregistrer en base de données
            $entityManager->flush();
            // ajouter un message flash
            $this->addFlash('success', 'Utilisateur modifié!');
            // rediriger vers l'index
            return $this->redirectToRoute('app_register');
        }
        return $this->render('register/index.html.twig', [
                'formUser' => $formUser->createView()
            ]
        );
    }

    #[Route('/user/remove/{id}', name: 'app_user_remove')]
    public function remove(Request $request, EntityManagerInterface $entityManager,UsersRepository $usersRepository, string $id): Response
    {
        $user = $userRepository->find($id);
        $entityManager->remove($user);
        // enregistrer en base de données
        $entityManager->flush();
        // ajouter un message flash
        $this->addFlash('success', 'Utilisateur supprimé!');
        // rediriger vers l'index
        return $this->redirectToRoute('app_register');
    }
    #[Route('/user/{id}', name: 'app_user_detail')]
    public function detail(UsersRepository $usersRepository, string $id): Response
    {
        $user = $usersRepository->find($id);
        return $this->render('user/detail.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user,
        ]);
    }
}
