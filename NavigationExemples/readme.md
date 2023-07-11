# Filtres et pagination


NavigationController: exemple de controller avec un form contenant de filtres. NO AJAX

Routes et éléments à observer :

1. **/navigation/pagination** : charger le page d'accueil et la barre de navigation
   
2. **/contenu/base** (click sur *Recherche avec Pagination (no Ajax)*: route qui **affiche** et **traite** le form. On crée **le contenu à afficher grâce au repo**. 
 
Le repo **renvoie déjà un objet PaginationInterface** (au lieu d'un array d'objet) qu'on peut passer au paginator.
Cet objet est parcourable avec une boucle for (voir code navigation_pagination/contenu_base.html.twig)

Lisez attentivement le code de l'action.

On a choisi, par défaut, d'envoyer déjà un ensemble de résultats à la vue (une recherche sans filtres car 'data' contient que la page pour le paginator, pas d'autres valeurs du form)


```
{% for film in filmsFiltres %}
.
.
.

{{ knp_pagination_render(filmsFiltres) }}
```


3. **Repository\FilmRepository**: lire tous le commentaires. 
4. **Form\FilmType**: lire tous les commentaires




NOTES:

  - nouvelle version avec onchange-> submit
  