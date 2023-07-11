## Guide de base pour créer un Formulaire de Login
(tradution simplifiée de https://symfony.com/doc/current/security/form_login.html)


Créez un projet

```console
composer require symfony/security-bundle
```

Installez les dépéndances de Webpack et compilez une fois
```
npm install 
npm run dev
```


Observez le fichier **security.yaml**:

```yaml
security:
    enable_authenticator_manager: true
    # https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords
    password_hashers:
        Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface: 'auto'
    # https://symfony.com/doc/current/security.html#loading-the-user-the-user-provider
    providers:
        users_in_memory: { memory: null }
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            provider: users_in_memory

            # activate different ways to authenticate
            # https://symfony.com/doc/current/security.html#the-firewall

            # https://symfony.com/doc/current/security/impersonating_user.html
            # switch_user: true

    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        # - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }

when@test:
    security:
        password_hashers:
            # By default, password hashers are resource intensive and take time. This is
            # important to generate secure password hashes. In tests however, secure hashes
            # are not important, waste resources and increase test times. The following
            # reduces the work factor to the lowest possible values.
            Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface:
                algorithm: auto
                cost: 4 # Lowest possible value for bcrypt
                time_cost: 3 # Lowest possible value for argon
                memory_cost: 10 # Lowest possible value for argon


```
**L'utilisateur** (**provider**)
    Toute section sécurisée de votre application nécessite un certain concept d'utilisateur. Le **provider** d'utilisateurs charge les utilisateurs à partir de n'importe quel stockage (par exemple, la base de données) sur la base d'un "identifiant d'utilisateur" (par exemple, l'adresse e-mail de l'utilisateur) 
    Il doit aussi charger/stocker les données des utilisateurs dans la session

Le **firewall** (pare-feu) et **l'authentification des utilisateurs**
    Le pare-feu est au cœur de la sécurisation de votre application. Chaque demande dans le pare-feu est vérifiée si elle nécessite un utilisateur authentifié. Le pare-feu se charge également d'authentifier cet utilisateur (par exemple à l'aide d'un formulaire de connexion) ;

**Contrôle d'accès (autorisation) (access_control)**
    À l'aide du contrôle d'accès et du vérificateur d'autorisation, vous contrôlez les autorisations requises pour effectuer une action spécifique ou visiter une URL spécifique.



Créez l'entité **Utilisateur**:

```
symfony console make:user
``` 


Rajoutez des propriétés à l'utilisateur à volonté

```
symfony console make:entity Utilisateur
```
*Options*: yes, email, yes




Adaptez le fichier .env et migrez.



Créez un controller Home (ou **Accueil**). On sera redirigés à ce controller quand l'user sera enregistré correctement.


Créez un formulaire d'enregistrement:

```
symfony console make:registration-form
```
*Options*: yes, no (on ne veut pas envoyer un mail de validation dans ce projet),


Modifiez le form /src/Form/RegistrationFormTpe.php pour rajouter les propriétés propres à votre entité (ex: nom)
Modifiez aussi la vue dans /templates/register/register.html selon vos besoins. Ici on rajoute le nom, par exemple:

```twig
    {{ form_start(registrationForm) }}
        {{ form_row(registrationForm.email) }}
        {{ form_row(registrationForm.plainPassword, {
            label: 'Password'
        }) }}
        {{ form_row (registrationForm.nom )}}
        {{ form_row(registrationForm.agreeTerms) }}

        <button type="submit" class="btn">Register</button>
    {{ form_end(registrationForm) }}
```



Créez un controller où on gérera les actions liées au login (login et logout)

```
symfony console make:controller Login
```


```php
<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    // #[Route('/login', name: 'app_login')]
    // public function index(): Response
    // {
    //     return $this->render('login/index.html.twig', [
    //         'controller_name' => 'LoginController',
    //     ]);
    // }

    // créez cette action, importez AuthenticationUtils
    // Cette action fait le rendu du formulaire et renvoie le dernier utilisateur connecté ainsi que les messages 
    // d'erreur (s'ils existent)
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route("/logout", name: "app_logout", methods: ["GET"])]
    public function logout()
    {
        return $this->redirectToRoute('app_login');
        // controller can be blank: it will never be called!
        // throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}


```



### Fonctionnement général: 

<br>

- L'utilisateur essaie d'accéder à une ressource protégée (par exemple /admin). 
- Le pare-feu (firewall) initie le processus d'authentification en redirigeant l'utilisateur vers le formulaire de connexion (/login)
- La page /login rend le formulaire de connexion via la route et le contrôleur créés dans cet exemple
- L'utilisateur soumet le formulaire de connexion à /login
- Le système de sécurité (c'est-à-dire l'authentificateur form_login) intercepte la demande, vérifie les informations d'identification soumises par l'utilisateur, authentifie l'utilisateur si elles sont correctes et renvoie l'utilisateur au formulaire de connexion si elles ne le sont pas.






Modifiez security.yaml selon vos besoins (default_target_path notamment)


```yaml
        main:
            # lazy: true 
            # provider: app_user_provider 
            form_login:
                login_path: login
                check_path: login
                default_target_path: app_home # à personnaliser, on charge cette route si login ok

```


Rajoutez le logout dans security.yaml
```yaml
firewalls:
        main:
            # ...
            logout:
                path: app_logout
```

Créez une action logout:

```php
    #[Route("/logout", name: "app_logout", methods: ["GET"])]
    public function logout()
    {
        return $this->redirectToRoute('app_login');
        // controller can be blank: it will never be called!
        // throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
``` 

Testez le tout.

