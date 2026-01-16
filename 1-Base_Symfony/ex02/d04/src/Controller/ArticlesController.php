<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticlesController extends AbstractController
{

    #[Route('/e01', name: 'main_directory')]
    public function list(): Response
    {
        $categories = $this->getParameter('app.categories');
        return $this->render('articles/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    
    #[Route('/e01/{article}', name: 'app_articles')]
    public function show(string $article): Response
    {
        $categories = $this->getParameter('app.categories');

        switch ($article) {
            case "BTS":
                return $this->render('articles/bts.html.twig', ['article' => $article]);
            case "Korea":
                return $this->render('articles/korea.html.twig', ['article' => $article]);
            case "Hangul":
                return $this->render('articles/hangul.html.twig', ['article' => $article]);
            default:
                return $this->redirectToRoute('main_directory');
        }
    }
}
