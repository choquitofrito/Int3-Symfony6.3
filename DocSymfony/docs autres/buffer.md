# 22. Response JSON en Symfony

## 22.1. Renvoi JSON d'un array d'objets obtenu avec les méthodes d'un repo  

On montre ici comment renvoyer un array d'objets sous la forme de JSON depuis une acion du controller. Les objets proviennent d'une requête à la BD en utilisant les méthodes de base du repo.

La séquence peut être résumée en : 

**obtenir avec find (ou autre) -> serialize -> renvoyer un objet Response contenant du JSON**

**Exemple** : obtenir une liste des aeroports et les afficher dans un div dans la vue

**Code commenté :**

-   **Projet** projetFormulaires

-   **Controller** ExemplesAjaxAxiosController, actions :

    -   exempleAffichageObjetsRepo

    -   exempleAffichageObjetsTraitementRepo

-   **Vue** exemple_affichage_objets_repo.html.twig


<br>


## 22.2. Renvoi JSON d'un array d'objets obtenu avec DQL


La séquence peut être résumée en : 

**obtenir avec find (ou autre) -> getArrayResult -> renvoyer un objet JsonResponse**

**Exemple** : obtenir une liste des aeroports et les afficher dans un div

**Code :**

-   **Projet** projetFormulaires

-   **Controller** ExemplesAjaxAxiosController, actions

    -   exempleAffichageObjetsDql

    -   exempleAffichageObjetsTraitementDql

-   **Vue** exemple_affichage_objets_dql.html.twig

<br>


# 23. Mail

Pour configurer l'envoi de mail, regardez cette doc:

https://symfony.com/doc/current/mailer.html

Ici on va faire un exemple en utilisant un compte google.

**Exemple**:

1. Installez le module **symfony/google-mailer**

```console
composer require symfony/google-mailer
```
Cette installation (**'recipe'**) modifiera le fichier **.env** pour rajouter une configuration adaptée à un compte mail de Google.

Changez-la selon vos besoins (decommentez la ligne d'abord):

```
###> symfony/google-mailer ###
# Gmail SHOULD NOT be used on production, use it in development only.
MAILER_DSN=gmail://monUserGoogle:monPass@default
###< symfony/google-mailer ###
```

Créez un controller **MailController** et cette action d'exemple:

**Note:**
Vous devez activer l'accès à des applications moins-sécurisées dans votre compte Gmail.

https://support.google.com/accounts/answer/6010255?hl=fr#zippy=%2Csi-le-param%C3%A8tre-autoriser-les-applications-moins-s%C3%A9curis%C3%A9es-est-activ%C3%A9-pour-votre-compte


```php
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
```





<br>


# 24. Authentification : inscription et login/password

**Objectif** : créer un système d'authentification 

Créez un projet **ProjetLoginPass**. Ce projet contiendra :

1.  Un **formulaire de login/password** traditionnel

2.  Un **formulaire d'inscription** pour rajouter des utilisateurs dans la BD

**Important :** Si vous avez une ancienne version de XAMPP assurez-vous d'avoir au moins la version 10.2 de MariaDB. Pour mettre à jour votre version de MariaDB pour xampp suivez les instructions qui se trouvent ici **dans sa totalité** :

<https://stackoverflow.com/questions/44027926/update-xampp-from-maria-db-10-1-to-10-2>

<br>

## 24.1. Configuration de la sécurité et création d'un formulaire de login


On va réaliser une configuration de base de la sécurité pour pouvoir
créer un formulaire d'inscription/login standard. Pour des options
plus avancés (ex : changez d'utilisateur sans devoir se déconnecter
de l'application) consultez la documentation ici :

<https://symfony.com/doc/current/security.html>

<https://symfony.com/doc/current/security/form_login_setup.html>


**Resumé de la procédure** à suivre :

1.  **Installer le support de sécurité dans le projet**

2.  **Créer** **une** **entité** **User** (assistant)

3.  **Créer** (assistant)

    -   Un **controller** pour le **login** et **le logout**

    -   Un **template pour afficher le formulaire** de login

    -   Un **Guard Authenticator**, **classe** qui **traite les
        informations** du formulaire de login

4.  Configurer la BD dans **.env**, créer le **schéma** de la BD, créer et lancer une **migration**

5.  **Encoder des utilisateurs et de passwords dans la BD**

6.  **Vérifier** le bon fonctionnement en tapant un couple login/pass
    valable


**Procedure**: 

1.  **Installer le support de sécurité dans le projet**

```php
composer require symfony/security-bundle
```

2.  **Créer** **une** **entité** **User** avec l'assistant avec
    **make:user** (pas make:entity!)

```console
php bin/console make:user
```

Cette commande crée l'entité, qui **doit** implémenter l'interface
[UserInterface](https://github.com/symfony/symfony/blob/4.2/src/Symfony/Component/Security/Core/User/UserInterface.php)

(Faites la migration pour que la BD soit mise à jour!)

L'assistant vous demandera :

-   Le nom de la classe (on choisira User)

-   Si vous voulez stocker de données dans la BD avec Doctrine (oui!)

-   La propriété qu'on utilisera pour réaliser le login (on choisira
    email)

-   Si on souhaite hasher les passwords (oui!)

Ouvrez **src/Entity/User.php** et regardez le code. **Vous pouvez par
après rajouter d'autres propriétés ou méthodes si vous le souhaitez
(make:entity)**

L'assistant aura modifié aussi le fichier **security.yaml** (dans
**config/packages**) selon les informations qu'on vient de fournir.

Note : c'est très important de respecter l'indentation dans les
fichiers .yaml 

3.  **Créer le controller, le template et un Guard Authenticator (avec l'assistant)** :

    -   Un **controller** pour le **login** et **une route**

    -   Un **template pour afficher le formulaire** de login

    -   Un **Guard Authenticator**, **classe** qui **traite les
        informations** du formulaire de login

Ces trois pas se font **avec une seule commande de l'assistant** :
```console
php bin/console make:auth
```
Pour les questions posées par l'assistant on choisira :

-   **L'option** **1** pour que Symfony crée un formulaire de login de base et pas seulement le système d'authentification vide

-   **FormulaireLoginAuthenticator** comme nomme de la classe Guard
    Authenticator qui prendra en charge la requête à la BD pour réaliser **l'authentification** (crée dans le dossier **src/Security**)

-   **SecuriteController** comme nom du controller (actions login et
    logout)

-   **Oui**, car on veut que Symfony crée aussi l'URL de logout (avec
    l'action qui deloggera l'user, c.à.d. l'effacer de la session)

Cette action met aussi à jour le fichier de configuration
**config/packages/security.yaml**.

Observez que le controller et le template ont été créés. Vous pouvez
accéder à la vue contenant le formulaire de login en tapant la route
de l'action **login** du controller.

4.  Configurer la BD dans **.env** (**projetloginpass**), créer le
    **schéma** de la BD, créer et lancer une **migration**

```console
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

5.  **Encoder des utilisateurs et de passwords dans la BD**

Créez une fixture pour la classe User (voir chapitre précédant sur le
Doctrine Fixtures).

```console
composer require --dev doctrine/doctrine-fixtures-bundle
```

```console
php bin/console make:fixture
```

La fixture portera le nom **UserFixtures**. Attention au nom car si on se trompe il n'y aura pas un message d'erreur.

```php
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10 ; $i++){
            $user = new User();
            $user->setEmail ("user".$i."@lala.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'lePassword'.$i
             ));
            $manager->persist ($user);
        }
        $manager->flush();
    }
}
```


Cette méthode est plus facile qu'encoder les utilisateurs à la main,
**car le password doit être hashé**

Doc: <https://symfony.com/doc/current/security.html(2c)

Dans ce cas, la fonction **load** devra créer un utilisateur, fixer ses attributs et le stocker dans la BD. Nous devons utiliser un
service pour encoder le password avant d'appeler à setPassword. Le
service est injecté dans le constructeur de la classe (dependency
injection par le constructeur !!).


**Important :** si votre entité a d'autres attributs (nom, adresse,
etc...) il faudra rajouter les sets qui correspondent

N'oubliez pas de lancer la fixture avec :

```console
php bin/console doctrine:fixtures:load
```

**Note** : Symfony nous indique qu'il effacera la BD (purge). Choisissez **oui**.

Si vous avez besoin à un moment donné d'obtenir le hash d'un password
depuis la console, tapez :

```console
php bin/console security:encode-password
```

et puis tapez le password. Vous pouvez par après le copier-coller dans la table (colonne password)

Dans **phpmyadmin** votre tableau **User** ressemblera à :


![](./images/usertable.png)

6.  **Vérifier** le bon fonctionnement en tapant un couple login/pass
    valable

Allez sur la page de login (par défaut l'action **login** dans **SecuriteController**) et tapez un couple *login/pass* valable. Si tout va bien vous allez obtenir une Exception car **dans votre controller Authenticator** (**FormulaireLoginAuthenticator** dans le dossier **src/Security**) vous n'avez pas spécifié une Response pour le serveur (méthode **onAuthenticationSuccess** de ce controller)

![](./images/loginredirect.png)


Vous avez juste à implémenter cette action pour indiquer quoi faire
dans le cas de succès (modifiez le fichier **src/Security/FormulaireLoginAuthenticator.php**). 

Voici un exemple :

```php
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            
            return new RedirectResponse($targetPath);
        }

        // nous devons charger une vue ou faire quoi qui ce soit
        // ex:
        // on peut penser à  : return $this->redirectToRoute ('accueil')
        // mais cette classe n'a pas la méthode car 

        // elle n'est pas un controller! On utilise alors :
        return new RedirectResponse($this->urlGenerator->generate('accueil'));
        // on commente l'exception.
        // throw new Exception('TODO: provide a valid redirect inside '.__FILE__);
    }
```

Dans le cas de succès, le code qui reste de l'action **login** ne
sera pas lancé car on a fait un redirect. Ici vers une action de votre choix (ici *accueil*). Pour cet exemple, créez le controller **AccueilController** avec l'assistant, l'action *accueil* et une vue contenant un message de bienvenue.

Si une erreur de login s'est produite, **nous avons deux possibilités** pour le **traiter** :

**a) Utiliser le template login crée par Symfony et l'adapter à nos besoins (par défaut)**

Dans cet exemple, si le couple login/pass n'est pas correcte
l'action **onAuthenticationSuccess** ne sera pas lancé. Symfony
**cherchera l'action onAuthenticationFailure** mais elle
n'existe pas. Le code de l'action login continuera et la variable
**error** contiendra l'info de l'erreur de login.

La vue du login sera rechargée et affichera (voir **if** dans le code) un div contenant le message de l'erreur qui s'est produite (ex: mail inexistant, invalid credentials si le password n'est pas correcte...).

Dans la vue on peut choisir par nous-mêmes quoi faire s'il y a une
erreur, il suffit de vérifier la valeur de cette variable et agir
conséquemment (afficher un message d'erreur, rediriger vers un autre
site etc...). On peut aussi juste établir une traduction pour les
messages d'erreur de base de Symfony, car par défaut ils seront en
anglais !

À chaque essai de login c'est conseillé de lancer l'action **logout** pour effacer le contenu de la session. On parlera du logout plus bas.

**b)**  Rajouter une action **onAuthenticationFailure** dans **FormulaireLoginAuthenticator.php**

L'action **onAuthenticationFailure** sera lancée quand il y aura une erreur de login, de la même manière que *onAuthenticationSuccess* est lancée dans le cas de succès. Elle est commentée dans le code, effacez les commentaires pour que Symfony la trouve. Le comportement expliqué dans a) sera logiquement annulé car le code de la vue ne sera plus lancé.


```php
// méthode faite par nous-mêmes. Enlevez les commentaires pour voir l'effet
public function onAuthenticationFailure(\Symfony\Component\HttpFoundation\Request $request,
                                    \Symfony\Component\Security\Core\Exception\AuthenticationException $exception) 
{
    throw new \Exception("error dans le login, c'est onAuthenticationFailure dans FormulaireLoginAuthenticator qui s'en occupe"); // rediriger, exception etc...
}    
```

<br>

## 24.2. Création d'un formulaire d'inscription

Nous allons créer un formulaire d'inscription qui utilises une vérification par mail Assurez-vous d'avoir installé et configuré un service de mail.

Vous pouvez créer un formulaire d'inscription automatiquement et le personnaliser après en suivant les instructions de cette documentation
:

<https://symfony.com/doc/current/doctrine/registration_form.html>

Si vous n'avez pas réalisé les opérations du chapitre précédente,
suivez au moins les pas 1,2,3 pour configurer la sécurité dans
Symfony, créer l'entité User et le Guard Authenticator.

Voici la continuation de la procédure, qui créera un formulaire
d'inscription :

Lancez, dans la console :

```console
php bin/console make:registration-form
```
Suivez les instructions de l'assistant. Choisissez si :

- Vous voulez qu'on ne puisse pas avoir de doublons dans les Users 
- Vous voulez envoyer un lien d'authentification pour l'inscription. Dans ce cas, tapez l'adresse mail
- Vous voulez (par défaut non) rajouter l'user id dans le lien
- Vous voulez que les utilisateurs soient logués directement après l'inscription (comme dans la plupart de sites)

L'assistant créera :

-   Une classe formulaire (**RegistrationFormType**)

-   Un controller (**RegistrationController**) qui crée l'objet formulaire et le renvoie à la vue

-   Un template qui affiche le formulaire (**register.html.twig**)


Installez :

```console
composer require symfonycasts/verify-email-bundle
```

Créez et lancez une migration (une propriété *verifyMail* a été rajoutée dans l'entité *User*)

![](./images/loginverifymail.PNG)

Testez le formulaire en lançant l'action **register**.
Adaptez le formulaire, le controller et la vue selon vos besoins.

**Important :** si vous modifiez l'entité User pour, par exemple,
en rajoutant une propriété **nom,** et vous voulez **générer à nouveau le formulaire d'inscription**, **effacez** d'abord **le** **formulaire** RegistrationFormType.php, **le controller** RegistrationController.php **et le template** register.html.twig.

<br>

## 24.3. Logout


Les outils de sécurité de Symfony nous permettent d'implémenter le
logout très facilement :

1. Rajoutez dans **config/packages/security.yaml** une section qui **indique le path à saisir dans l'URL** **quand on veut réaliser un logout (pas un name)** et **la route de l'action qui sera lancée après avoir fait le logout** (route complete, pas le name!). "Faire le logout" est, en gros, effacer l'objet User de la session. Symfony s'en chargera de le faire sans votre intervention


```yaml
        main:
            anonymous: true
            lazy: true
            provider: app_user_provider
            guard:
                authenticators:
                    - App\Security\FormulaireLoginAuthenticator
            logout:
                path: logout
                target: /apres/logout 

```
On peut choisir le **path** selon nos besoins.

**Important** : Respectez l'indentation dans les fichiers .yaml. Elle est faite avec des espaces!

On doit avoir une action à lancer après le logout.


2. Laissez vide l'action de logout (elle ne sera jamais lancée) et créez l'action à lancer après d'avoir fini le traitement du logout (effacer user, session etc...)

**ProjetLoginPass** contient cette fonctionnalité. L'action cible se
trouve dans **SecuriteController**.

```php
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
  
    // target: la route à lancer APRÈS le logout 
    /**
     * @Route("/apres/logout")
     */
    public function apresLogout()
    {
        dd("Hasta la vista, baby");
    }
```
