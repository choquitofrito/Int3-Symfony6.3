<?php

namespace App\Security;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;

class LoginAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(Security::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Récupérer l'utilisateur connecté
        $user = $token->getUser();
        // dd($user);

        // Vérifier le rôle de l'utilisateur
        if (in_array('ROLE_COACH', $user->getRoles(),true)) {
            // Rediriger l'utilisateur avec le rôle de coach vers une page spécifique
            return new RedirectResponse($this->urlGenerator->generate('home_coach'));
        } 
        elseif (in_array('ROLE_ADMIN', $user->getRoles(),true)) {
            // Rediriger l'utilisateur avec le rôle d'administrateur vers une page spécifique
            return new RedirectResponse($this->urlGenerator->generate('home_admin'));
        } 
        else {
            // Rediriger tous les autres utilisateurs (cas par défaut)
            return new RedirectResponse($this->urlGenerator->generate('login'));
        }
    }


    // méthode faite par nous-mêmes. Enlevez les commentaires pour voir l'effet
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        // la méthode est doit renvoyer une réponse. 
        // à nouse de rediriger, lancer une exception ou autre...
        return new Response("Erreur dans le login");
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
