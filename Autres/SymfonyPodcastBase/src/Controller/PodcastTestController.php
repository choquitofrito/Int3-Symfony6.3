<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PodcastTestController extends AbstractController
{

    #[Route('/')]
    public function index(): Response {
       
        return $this->render ('podcast_test/index.html.twig');

    }
    


    #[Route('/podcast/contenu', name: 'app_podcast_test')]
    public function contenu(Request $request): Response
    {

        $infoChannel = [
            'title' => 'Le titre',
            'link' => 'http://pingsteskilstuna.se',
            'author' => 'Pingstkyrkan',
            'language' => 'se_sv',
            'copyright' => '℗ &amp; © 2019 Pingstkyrkan Eskilstuna &amp;',
            'itunes_subtitle' => 'Predikan',
            'summary' => 'resumé',
            'description' => 'une description',
            'owner_name' => 'proprietaire',
            'owner_email' => 'email du prop',
            'channel_image' => 'channel.jpg',
            'itunes_explicit' => 'no',
            'itunes_category' => '<itunes:category text="Religion &amp; Spirituality"><itunes:category text="Religion"/></itunes:category>',
            'category' => 'une categorie',
            'mp3_default_author' => 'author',
            'description' => 'description'
        ];

        // read every file in a folder

        $fileDir = __DIR__ . "/../../public/mp3"; // change to base url, schema, etc...
        
        $baseUrl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        
        $arrayFileNames = scandir($fileDir);

        $arrayInfoFiles = [];
        foreach ($arrayFileNames as $fileName) {
            if (substr($fileName, -4) == ".mp3") {
                // $feed_image = substr($fileName, 0, strlen($fileName) - 4) . '.jpg'; // should separate images and mp3
                // all should be changed here depending on the file coming from the BD. This is just a test
                $arrayInfoFiles['fileName'] = [
                    'title' => $fileName,
                    'fileUrl' => $baseUrl . "/mp3/" . $fileName,
                    'author' => 'auteur fichier',
                    'category' => $infoChannel['category'],
                    'itunes_category' => $infoChannel['itunes_category'],
                    'description' => 'une description',
                    'duration' => 90,
                    'date' => '1/1/2060',
                    'size' => 3000,
                    'image' => '/images/test.jpg',
                    'explicit' => 'no',
                ];
            }
        }
        // dd($arrayInfoFiles);

        $response = new Response($this->renderView('podcast_test/contenu.html.twig', [
            'infoChannel' => $infoChannel,
            'arrayInfoFiles' => $arrayInfoFiles,
        ]));
        $response->headers->set('Content-Type', 'application/xml');
        return $response;
    }
}
