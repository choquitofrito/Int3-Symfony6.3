make entity

Formateur (specialite)

Heritage:
---------

Rajoutez un **extends** dans la définition de Formateur

Rajoutez les annotations dans Utilisateur


Effacez les id's des classes filles (Formateur)

Créez nouvelle action register pour enregistrer les Formateurs
Créez nouveau form FormateurType contenant les propriétés extras


```php
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
.
.
.
#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[InheritanceType("SINGLE_TABLE")]
#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["utilisateur" => "Utilisateur", "formateur" => "Formateur"])]
.
.
```

