<?php

// src/Services/StatistiquesLogMail.php
namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class StatistiquesLogMail {
       
    function __construct (private LoggerInterface $logger, private MailerInterface $mailer, private string $adresse){
        $this->logger = $logger;
        $this->mailer = $mailer;
        $this->adresse = $adresse;
    }
        
    function permutations($items, $perms = array( )) {
        if (empty($items)) {
            $res = array($perms);
        }  else {
            $res = array();
            for ($i = count($items) - 1; $i >= 0; --$i) {
                 $newitems = $items;
                 $newperms = $perms;
             list($foo) = array_splice($newitems, $i, 1);
                 array_unshift($newperms, $foo);
                 $res = array_merge($res, $this->permutations($newitems, $newperms));
             }
        }
        // on utilise le service de log
        $this->logger->info ("De permutations ont été calculées");
        // on envoie un mail
        $message = (new Email())
                ->from($this->adresse)
                ->to ("autre@gmail.com")
                ->subject('Le sujet')
                ->text('blablabla')
                ->html('<p>Aussi du HTML!</p>');
        // on doit envoyer ici le mail après avoir configuré le service

        // https://symfony.com/doc/current/email.html#configuration
        // dump ($message);
        // die();
        return $res;
    }
}
