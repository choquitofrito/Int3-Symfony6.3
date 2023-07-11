Guide de base pour adapter un template html à Symfony
=====================================================

Créez la structure HTML
-----------------------

1.  Telecharger un template

2.  Créer projet Symfony

3.  Copier le dossier du template à l\'interieur du projet (ex: dossier
    /src/monTemplate)

4.  Faire un premier Controller (ex: FrontController)

5.  Effacer index.html.twig dans le template du projet

6.  Copier tous les fichiers html dans le dossier templates de ce
    controller (front)

7.  Renommer toutes les fichiers .html du template à .html.twig

8.  Si votre template a de fichiers .php vous allez devoir les adapter
    pour qu\'ils deviennent des actions d\'un controller

9.  Identifier les parties communes et différentes dans toutes les pages

    1.  Identifier le block TITLE

    2.  Identifier le block CSS

    3.  Identifier le block JS

    4.  Identifier le contenu principal de chaque page .html du template

En gros, identifiez toutes les parties communes à toutes les pages
pour les mettre dans base.html.twig. Vous pouvez mettre du contenu
dans de fichiers séparés (voire **includes/footer.html.twig**)

10. Modifier le fichier **base.html.twig**, qui sera la master page du
    site

    1.  Incrustez tout le code des parties communes (sans blocs)

    2.  Créez de blocs pour les parties qui changent dans chaque page. Ces blocs seront écrasés ou élargis (fonction **parent()** de twig) selon les besoins du template ou vos propres besoins . Avec la fonction **parent()** de twig vous pouvez \"hériter\" le code d\'un block de base.html.twig et puis rajouter encore du code dans le bloc de la vue qui hérite (voir index.html, bloc javascripts)

    3.  Dans certains cas c\'est utile de créer des blocs **imbriqués** (voir base.html.twig, block bradcam\_area)
   

Adaptez les liens .html
-----------------------

Vous devez transformer tous les liens href du template qui dirigent vers
de pages .html.

Voici un exemple dans index.html :

```html
<a href="contact.html" class="boxed-btn4">Contact Us</a>
```

Doit devenir :
```html
<a href="{{ path ('contact') }}" class="boxed-btn4">Contact Us\</a>
```
Vous allez devoir créer aussi l\'action portant le **name** "**contact**"
qui renverra la vue contact.html.twig


Modifier les liens des images et de tous les fichiers .css et .js 
-----------------------------------------------------------------

(Ici on ne considère pas encore l\'utilisation de Webpack, mais plus
tard)

Les liens .css ni .js ne fonctionneront plus. On doit les transformer
dans des appel à la fonction **asset** (voir code dans
**base.html.twig** et comparer ce code avec l\'original)

1.  Créez un dossier **assets** dans **public** (si vous n'utilisez pas webpack!!)

2.  Adaptez tous les liens selon le modèle de **index.html**



