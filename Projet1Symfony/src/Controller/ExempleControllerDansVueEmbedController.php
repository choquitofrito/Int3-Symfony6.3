<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExempleControllerDansVueEmbedController extends AbstractController
{
    // Cette méthode génère le contenu commun
    // pas de route pour cette action, elle est juste utilisée
    // par les templates
    public function sectionNouvellesDynamique($nombreNouvelles = 3)
    {

        // ici on charge de données d'une BD pour les incruster dans la section 
        // dynamique
        // on fait semblant ici, en créant un array
        $nouvelles = [
            'Les chats ne sont pas si gentils que ça',
            'Tombe, tombe, tombe la pluie',
            'Vamos a la playa',
            'Vive la vie',
            'Vive le chocolat'
        ];
        // on prend $nombreNouvelles
        $nouvelles = array_slice($nouvelles, 0, $nombreNouvelles);

        return $this->render('exemple_controller_dans_vue_embed/section_nouvelles_dynamique.html.twig', ['nouvelles' => $nouvelles]);
    }


    #[Route("/exemple/affiche/embed/vue1")]
    public function afficheEmbedVue1()
    {
        // plus besoin de générer de données ici
        return $this->render('exemple_controller_dans_vue_embed/vue1.html.twig');
    }

    #[Route("/exemple/affiche/embed/vue2")]
    public function afficheEmbedVue2()
    {
        // plus besoin de générer de données ici
        return $this->render('exemple_controller_dans_vue_embed/vue2.html.twig');
    }
}
