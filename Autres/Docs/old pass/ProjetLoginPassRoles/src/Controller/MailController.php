<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('zyriab@gmail.com')
            ->to('zyriab@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Le mail fonctionne!')
            ->text('Et c\'est si facile!!')
            ->html('<h3>Regardez la doc de Mailer pour plus d\'info</h3><br><a href=https://symfony.com/doc/current/mailer.html>https://symfony.com/doc/current/mailer.html</a>');

        $mailer->send($email);
        dd("Vérifiez le mail");
    }
}
