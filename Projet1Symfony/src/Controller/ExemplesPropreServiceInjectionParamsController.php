<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Services\StatistiquesLogMail;
use App\Services\BonjourService;

// /src/controller/ExemplesPropreServiceInjectionParamsController.php
class ExemplesPropreServiceInjectionParamsController extends AbstractController
{
        // on injecte le service diréctement dans le constructeur du controller
        // sans paramètres!
        public function __construct (private StatistiquesLogMail $mesStats){
            $this->mesStats = $mesStats;
        }
        #[Route ("/exemples/propre/service/injection/utilise/statistiques/log/mail")]
        public function utiliseStatistiquesLogMail (){
            $arrayNoms = ['Lucas','Jean','Norah'];
            $permutationsNoms = $this->mesStats->permutations($arrayNoms);
            return $this->render ('exemples_propre_service_injection_params/utilise_statistiques_log_mail.html.twig', ['permutationsNoms'=> $permutationsNoms]);
        }
}
