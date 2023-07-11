<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
        #[Route("/mail/envoyer/mail", name: "envoyer_mail")]
        public function envoyerMail(\Swift_Mailer $mailer)
        {
                $message = (new \Swift_Message('Hello mail'))
                        ->setFrom('developinterface3@gmail.com')
                        ->setTo('developinterface3@gmail.com')
                        ->setBody(
                                $this->renderView(
                                        'mail/contenu_mail.html.twig'

                                ),
                                'text/html'
                        );
                $mailer->send($message);
                return $this->render('mail/envoyer_mail.html.twig');
        }
}
