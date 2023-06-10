<?php

namespace App\Controller;

use App\Repository\ChansonRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/discotheque')]
class DiscothequeController extends AbstractController
{
    #[Route('/', name: 'app_discotheque')]
    public function index(Request $request, ChansonRepository $repoChanson): Response
    {
        $chansons = $repoChanson->findAll();
        $message = $request->query->get('message') ?? null;
        return $this->render('discotheque/index.html.twig', [
            'controller_name' => 'DiscothequeController',
            'chansons' => $chansons,
            'message' => $message,
        ]);
    }

    public function getCategories(CategorieRepository $repoCategorie) {
        $categories = $repoCategorie->findAll();
        return $this->render('discotheque/listeCategorie.html.twig', 
            ['categories' => $categories ]
        ); 
    }
}
