**Installation de XDebug : debugging en PHP**
=============================================

<br>

**1.**  Vérifiez **si vous avez déjà** le fichier du module XDebug dans votre disque : allez dans **xampp/php/ext** et cherchez le fichier **php\_xdebug.dll**

 Si c'est le cas, vous avez déjà le module et il reste qu'à l'activer.
 Passez alors directement au point 3 de ce tutoriel

<br>

**2.** **Téléchargez XDebug** de xDebug.org (https://xdebug.org/download#releases)
   

Vous devez cherchez le fichier de XDebug qui correspond à votre version de PHP. Ce n'est pas un 'logiciel', c'est juste une librairie DLL. Pour savoir quoi télécharger, vous devez connaitre votre version de PHP ainsi que d'autres infos importantes.

Créez un fichier **info.php** dans c:/xampp/htdocs contenant ce code:
 
 
 ```php
 <?php
  php_info()
 
 ```
 
Ouvrez cette page (**localhost/info.php** dans la barre d'adresses du navigateur) et vous verrez plein d'info sur votre installation de PHP.

Selectionnez et copiez toute ces infos (CTRL-A puis CTRL-C).

Allez sur ce site:

https://xdebug.org/wizard

(Ce wizard vous aide à connaitre la version de XDebug à télécharger pour votre installation de PHP et vous génére un lien de téléchargement)

et faites CTRL-V. Puis cliquez sur **Analise my phpinfo() output**. Dans la page qui s'affichera, cliquez sur le lien de téléchargement dans la section **Instructions**.

En Windows il s'agit d'un fichier dll. Le plus simple est de renommer le fichier à **php\_xdebug.dll**. Puis, placez-le dans **xampp/php/ext** pour qu'il soit accèssible par Apache

<br>

**3.** **Editez le fichier php.ini (xampp/php)**

 Créez la section **\[XDebug\]** contenant les lignes suivantes (à la fin du fichier php.ini, par exemple). Le fichier **php\_xdebug.dll** est le fichier que vous avez téléchargé :

```apache
zend_extension = "C:\xampp\php\ext\php_xdebug.dll"
;xdebug.mode = debug
;xdebug.start_with_request = yes
;xdebug.client_port = 9090
;xdebug.remote_host = "127.0.0.1"
```
 **Note** : cette section peut exister déjà. Si c'est le cas, mettez-la à
 jour. Rajustez les chemins selon vos besoins

<br>

**4.**  **Vérifiez que XDebug est installé**:

4.1.  Si vous n'avez pas du le créer avant, créez le fichier le fichier **info.php** dans c:/xampp/htdocs contenant ce code:
  
 ```php
<?php
php_info()

 ```

4.2.  Redemarrez Apache

4.3.  Relancez la page info.php et cherchez la section **xdebug (CTRL-F)**. Le module doit être marqué comme **enabled**.

4.4. Rajoutez un simple ligne de **var_dump** avant php_info et observez que le format d'affichage a changé

```php
<?php
var_dump (['Pepi','Luci','Sandrine'])
php_info()
```
