### Exercice 1

Question : Sélectionnez tous les livres ayant un prix supérieur à 20.

**Solution** :

```sql
SELECT  l
FROM App\Entity\Livre l
WHERE l.prix > 20
```

### Exercice 2

Question : Sélectionnez tous les clients dont le nom est "Smith".

**Solution** :

```sql
SELECT c
FROM App\Entity\Client c
WHERE c.nom = 'Smith'
```


### Exercice 3

Question : Comptez le nombre total de clients.

**Solution** :


```sql

SELECT COUNT(c)
FROM App\Entity\Client c
```

### Exercice 4

Question : Sélectionnez les clients dont l'adresse e-mail est manquante (NULL).

**Solution** :

```sql

SELECT c
FROM App\Entity\Client c
WHERE c.email IS NULL
```



### Exercice 5

Question : Sélectionnez tous les livres publiés après 2020.

**Solution** :

```sql
SELECT l
FROM App\Entity\Livre l
WHERE YEAR(l.datePublication) > 2020
```

### Exercice 6

Question : Sélectionnez tous les livres dont le titre commence par la lettre "A".

**Solution** :

```sql
SELECT l
FROM App\Entity\Livre l
WHERE l.titre LIKE 'A%'
```

### Exercice 7

Question : Comptez le nombre total de livres.

**Solution** :

```sql
SELECT COUNT(l)
FROM App\Entity\Livre l
```

### Exercice 8

Question : Sélectionnez les trois livres les moins chers.

**Solution** :

```sql
SELECT l
FROM App\Entity\Livre l
ORDER BY l.prix ASC
LIMIT 3
```

### Exercice 9

Question : Sélectionnez les livres publiés entre 2010 et 2020, triés par date de publication.

**Solution** :

```sql
SELECT l
FROM App\Entity\Livre l
WHERE YEAR(l.datePublication) BETWEEN 2010 AND 2020
ORDER BY l.datePublication ASC
```

### Exercice 5

Question : Sélectionnez les clients qui ont emprunté le livre avec l'ISBN "123456789".

**Solution** :

```sql
SELECT DISTINCT c
FROM App\Entity\Client c
JOIN c.emprunts e
JOIN e.exemplaire ex
JOIN ex.livre l
WHERE l.isbn = '123456789'
```

### Exercice 10

Question : Sélectionnez tous les livres qui ont des exemplaires en bon état (état = 'Bon').

**Solution** :

```sql
SELECT l
FROM App\Entity\Livre l
JOIN l.exemplaires e
WHERE e.etat = 'Bon'
```

### Exercice 11

Question : Sélectionnez les auteurs qui ont écrit plus de 5 livres.

**Solution** :

```sql
SELECT a
FROM App\Entity\Auteur a
WHERE SIZE(a.livres) > 5
```

### Exercice 12

Question : Sélectionnez les livres avec leur nombre total d'exemplaires disponibles.

**Solution** :

```sql
SELECT l, COUNT(e) AS nb_exemplaires
FROM App\Entity\Livre l
LEFT JOIN l.exemplaires e
GROUP BY l
```
(Note: LEFT JOIN mettra dans aussi dasn les résultats les Livres qui n'ont pas des Exemplaires. INNER JOIN les ignore.
C'est le même comportement qu'en ```sql)

### Exercice 13

Question : Sélectionnez les livres qui n'ont pas encore été empruntés.

**Solution** :

```sql
SELECT l
FROM App\Entity\Livre l
WHERE l.id NOT IN (
    SELECT e.livre
    FROM App\Entity\Emprunt e
)
```


### Exercice 14

Question : Sélectionnez tous les clients qui ont au moins un emprunt en cours (date de retour prévue dans le futur).

**Solution** :

```sql
SELECT c
FROM App\Entity\Client c
WHERE EXISTS (
    SELECT e
    FROM App\Entity\Emprunt e
    WHERE e.client = c
    AND e.dateRetourPrevu > CURRENT_DATE()
)
```


### Exercice 15

Question : Sélectionnez les clients qui ont emprunté au moins un livre publié avant 2010.

**Solution** :

```sql

SELECT c
FROM App\Entity\Client c
WHERE EXISTS (
    SELECT e
    FROM App\Entity\Emprunt e
    JOIN e.exemplaire ex
    JOIN ex.livre l
    WHERE e.client = c
    AND YEAR(l.datePublication) < 2010
)
```
