<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ExempleControllerDansVueController extends AbstractController
{
    #[Route("/exemple/affiche/vue1")]
    public function afficheVue1 (){
        // ici on charge de données d'une BD pour les incruster dans la section 
        // dynamique
        // on fait semblant ici, en créant un array
        $nouvelles = ['Les chats ne sont pas si gentils que ça',
                            'Tombe, tombe, tombe la pluie',
                            'Vamos a la playa'
        ];
        return $this->render ('exemple_controller_dans_vue/vue1.html.twig', ['nouvelles'=>$nouvelles]);
    }
    
    #[Route("/exemple/affiche/vue2")]
    public function afficheVue2 (){
        // ici c'est pareil que dans afficheVue1... on répéte du code! 
        $nouvelles = ['Les chats ne sont pas si gentils que ça',
                            'Tombe, tombe, tombe la pluie',
                            'Vamos a la playa'
        ]; 
        return $this->render ('exemple_controller_dans_vue/vue2.html.twig', ['nouvelles'=>$nouvelles]);
    }
}
