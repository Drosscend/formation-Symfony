<?php

namespace App\Controller;

use App\Repository\ArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/discotheque/artiste')]
class ArtisteController extends AbstractController
{
    // #[Route('/', name: 'app_artiste')]
    // public function index(): Response
    // {
    //     return $this->render('artiste/index.html.twig', [
    //         'controller_name' => 'ArtisteController',
    //     ]);
    // }

    #[Route('/{id}', name: 'app_artiste_show')]
    public function show(ArtisteRepository $repoArtiste, int $id): Response
    {
        $artiste = $repoArtiste->find($id);
        return $this->render('discotheque/artiste/show.html.twig', [
            'controller_name' => 'ArtisteController',
            'artiste' => $artiste,
        ]);
    }
}
