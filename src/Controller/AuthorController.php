<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{


    private array $authors = [
        ['id' => 1, "picture" => "/images/Victor-Hugo.jpg", "username" => "Victor Hugo", "email" => "victor.hugo@gmail.com", "nb_books" => 100],
        ['id' => 2, "picture" => "/images/william.jpg", "username" => "William Shakespeare", "email" => "william.shakespeare@gmail.com", "nb_books" => 200],
        ['id' => 3, "picture" => "/images/Taha-Hussein.jpg", "username" => "Taha Hussein", "email" => "taha.hussein@gmail.com", "nb_books" => 300]
    ];

    //exerice1: afficher la variable name dans template
    // ? used to handle cases where name is not provided
    //
/*    #[Route('/author/{name?}', name: "app_author")]
    public function showAuthor($name): Response
    {
        return $this->render("author/show.html.twig", [
            'name' => $name
        ]);
    }*/


    #[Route('/authors', name: 'app_authors')]
    public function listAuthors(): Response
    {
        return $this->render("author/list.html.twig", [
            'authors' => $this->authors
        ]);

    }

    #[Route('/author/{id}')]
    public function authorDetails($id): Response
    {
        //the requested author data
        $requested_author = [];

        foreach ($this->authors as $author){
            if($author['id'] == $id){
                $requested_author = $author;
                break;
            }
        }

        return $this->render("author/showAuthor.html.twig", [
            'author' => $requested_author
        ]);
    }
}
