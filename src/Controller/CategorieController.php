<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/discotheque/categorie')]
class CategorieController extends AbstractController
{
    #[Route('/', name: 'app_categorie')]
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    #[Route('/{slug}', name: 'artistes_by_categories')]
    public function app_articles_by_categorie(CategorieRepository $repoCategorie, string $slug): Response
    {
        $categorie = $repoCategorie->findOneBySlug($slug);
        $artistes = [];
        if ($categorie) {
            $artistes = $categorie->getArtistes();
        }
        return $this->render('discotheque/artiste/artistes_by_categories.html.twig', [
            'controller_name' => 'ArtisteController',
            'artistes' => $artistes,
            'categorie' => $categorie,
        ]);
    }

}
