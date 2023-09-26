<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UseApiController extends AbstractController
{

    #[Route('api/test')]
    public function apiTest(HttpClientInterface $client)
    {

        $client = $client->withOptions([
            'headers' => [
                'x-app-key' => 'f9073faf6bdc00e3b9f2f2cbe099f464',
                'x-app-id' =>  'a4edc91f'
            ],

        ]);

        $response = $client->request(
            'GET',
            'https://trackapi.nutritionix.com/v2/search/instant?query=chocolate'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        dd($content);
    }
}
