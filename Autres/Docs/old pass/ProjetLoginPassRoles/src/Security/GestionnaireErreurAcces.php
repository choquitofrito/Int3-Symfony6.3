<?php
// src/Security/AccessDeniedHandler.php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class GestionnaireErreurAcces implements AccessDeniedHandlerInterface
{


    private $router;

    public function __construct (UrlGeneratorInterface $router){
        $this->router = $router;

    }

    public function handle(Request $request, AccessDeniedException $accessDeniedException) :?Response
    {
        // choisissez la route vers laquelle y aller. Ici on a choisi app_login
        return new RedirectResponse ($this->router->generate ("app_login")); 
    }
}