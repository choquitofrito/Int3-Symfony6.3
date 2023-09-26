# Panier simple

Ce document sert à decrire les pas les plus importantes pour créer un panier simple en Symfony (mais pas le plus simple :))


        symfony new --webapp ProjetPanierBase


        DATABASE_URL="mysql://root:root@127.0.0.1:3306/panier"

Créer entité Produit (nom, description, prix)
        

Installer fixtures 

ProduitFixtures

Créer AccueilController

npm install
npm run dev


Notes:
------
Créer un controller Accueil pour afficher tous les produits (/)

On pourra cliquer sur l'image d'un produit et voir le détail. Pour cela (et d'autres opérations) on va créer un controller Produit pour gérer les produits. L'action produit_detail affiche le détail d'un produit quand on clique sur l'image (href dans index.html.twig).

Créer les entités Commande (dateCreation, etat, dateModification) et DetailCommande (quantite)

Créer une relation OneToMany Produit vers DetailCommande - un produit se trouve dans plein de détails de commande... exercice de base, voir les notes UML!)

Créer une rélation OneToMany Commande-DetailCommande

Créez de Fixtures pour le tout, y inclus une fixture de liaison (voir ProjetCalendrierEvenements)

Rajoutez les opérations en cascade dans la Commande (on efface ou persist une commande et les détails seront persistés ou effacés aussi)

```php
    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: DetailCommande::class, orphanRemoval: true, cascade:['persist','remove'])]
```


Eviter les doublons dans les détails de commande : quand on rajoute un produit deux fois, la quantité de son détail doit s'incrementer et ne pas créer un nouveau détail.

Ex: on rajoute 3 citrons dans un panier -> on crée un détail de commande
on rajoute à nouveau de citrons (4) -> on NE crée pas un détail, on incrément l'existante
Pour ce faire on doit pouvoir comparer deux détails et voir s'ils sont pareils.

Dans **Commande**
```php
// méthode pour savoir si deux détails sont pareils.
// on compare le détail en cours avec un détail passé en paramètre
// Ces détails doivent avoir déjà un id, c'est à dire exister préalablement dans la BD
public function equals(DetailCommande $detail): bool {
    return $this->getProduit()->getId() == $detail->getProduit()->getId();
}
```

Dans **DetailCommande**
```php
// si le détail existe déjà, on doit incrementer la quantité.
// la méthode equals compare deux détails (méthode dans DetailCommande)
public function addDetail(DetailCommande $detailRajouter): self
{
    // if (!$this->details->contains($detail)) {
    //     $this->details[] = $detail;
    //     $detail->setCommande($this);
    // }
    foreach ($this->getDetails() as $detailExistant){
        if ($detailRajouter->equals($detailExistant)){
            $detailExistant->setQuantite($detailExistant->getQuantite() + $detailRajouter->getQuantite());
        }
        return $this;
    }
    $this->details[] = $detailRajouter;
    $detailRajouter->setCommande($this);
    return $this;
}
```

Créer une méthode pour vider la commande (effacer tous les détails):
```php
    // pour effacer tous les détails
    public function removeDetails ():self {
        foreach ($this->getDetails() as $detail){
            $this->removeDetail($detail);
        }
        return ($this);
    }   
```
Créer une méthode pour calculer le total d'un détail de la commande
```php
// obtenir le prix d'un Detail
public function getTotal():float {
    return $this->getProduit()->getPrix() * $this->getQuantite();
}
``` 

et un autre pour le total de la Commande
```php
// obtenir le prix de la Commande
public function getTotal(): float
{
    $total = 0;
    foreach ($this->getDetails() as $detail){
        $total = $total + $detail->getTotal();
    }
    return $total;
}
```



## Gestion du Panier dans la session


Regardez le reste du code (commenté! controllers et vues) dans le Controller PanierController et CommandeController




