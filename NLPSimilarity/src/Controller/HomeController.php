<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// imports de nlp-tools
use NlpTools\Similarity\CosineSimilarity;


class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index()
    {

        // Voici quelques descriptions des livres
        $desc1 = "The book is about the russian revolution";
        $desc2 = "The back is filled with russian cakes";
        $desc3 = "The book is filed in a russian library";
        $desc4 = "The book is filed in a russian library";
        $desc5 = "The book ... je n'ai pas trop à voir avec la description originale";



        // Obtenir les mots à partir du texte
        $tokenizer = new \NlpTools\Tokenizers\WhitespaceTokenizer();
        $tokens1 = $tokenizer->tokenize($desc1);
        $tokens2 = $tokenizer->tokenize($desc2);
        $tokens3 = $tokenizer->tokenize($desc3);
        $tokens4 = $tokenizer->tokenize($desc4);
        $tokens5 = $tokenizer->tokenize($desc5);


        // Calculer la similarité en utilisant la méthode du Cosinus entre plusieurs descriptions
        $cosine = new CosineSimilarity();

        $similarity_1_2 = $cosine->similarity($tokens1, $tokens2);

        $similarity_1_3 = $cosine->similarity($tokens1, $tokens3);
        
        $similarity_3_4 = $cosine->similarity($tokens3, $tokens4);
        
        $similarity_1_5 = $cosine->similarity($tokens1, $tokens5);
        
        
        // afficher la similarité
        dump ("Tokens:");
        dump ($tokens1); // juste pour montrer les tokens (mots)

        dump ("Similarité entre desc1 et desc2: " . $similarity_1_2);
        dump ("Similarité entre desc1 et desc3: " . $similarity_1_3);
        dump ("Similarité entre desc3 et desc4: " . $similarity_3_4);
        dump ("Similarité entre desc1 et desc5: " . $similarity_1_5);

        dd();
       
    }
}
