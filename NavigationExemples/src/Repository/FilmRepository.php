<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Knp\Component\Pager\PaginatorInterface;



/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    // on a un paginator ici car on va créer une méthode qui ne renvoie pas tous le résultats,
    // mais un sous-ensemble (à nous de choisir). Autrement dit, on fait la pagination ici.
    private $paginator;

    // injection du paginator
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Film::class);
        $this->paginator = $paginator;
    }


    // la méthode va recevoir un objet de la classe SearchData (voir code dans Data\SearchData.php)
    // Cette classe représente notre form de recherche (car il est custom, ne correspond pas à une entité). 
    // Si on lie un objet de cette classe (SearchData) avec un Form (Form\SearchType), 
    // on reçoit un objet SearchData au moment du submit et c'est très simple à traiter après 
    // On fonctionne alors de la même façon qu'avec les entités, mais avec un form custom!
    // Cette classe n'en est pas, par contre, une entité 
    // (c'est pour ça qu'on la stocke dans un autre dossier Data (racine)) et que il n'y a pas
    // des annotations ORM (pas dans la BD) ni un repository

    // Créer cette classe n'est pas indispensable, car on aurait pu juste faire un form
    // isolé ... mais alors on doit obtenir à la main tous les champs sous la forme d'un 
    // array. On verra plus tard que c'est mieux d'avoir un objet

    // On aurai pu aussi envoyer de strings pour filtrer, mais 
    // c'est plus avantageux d'envoyer un objet contenant 
    // toutes les données du filtre (SearchData)
    public function obtenirResultatsFiltres(SearchData $objFiltres)
    {
        // si on veut de filtres optionnels, construire la requête avec DQL 
        // ou SQL pur devient très dur (on doit créer un string où on concatenne - ou pas - des INNER JOINS et WHERES dans un "SELECT f films ......")

        // Ici c'est beaucoup plus simple d'utiliser QueryBuilder
        // La syntaxe est équivalente à celle de DQL mais en notation objet
        // https://www.doctrine-project.org/projects/doctrine-orm/en/2.8/reference/query-builder.html
        // "film" est un alias pour l'objet qu'on obtient
        // Normalement on utilise juste une lettre pour les entités ('f' au lieu de 'film')
        // mais ça se voit plus claire avec le nom complet dans cet exemple
        $reqQB = $this->createQueryBuilder('film')
            ->join('film.genre', 'genre');   // inner join avec genre. Pour optimiser, on devrait rajouter ->select ('film','genre')


        // Rajout des filtres:

        // on peut filtrer par recherche partielle (on tape quoi qui ce soit dans le champ 
        // de recherche, à la Google), genre, durée minimale... 
        // On peut rajouter de champs de recherche, il faut alors modifier
        // SearchData et SearchType (regardez leur code) 


        // si le champ de recherche n'est pas vide. Ce champ sert à faire une recherche partialle
        if (!empty($objFiltres->query)) {
            $reqQB = $reqQB->andWhere('film.titre LIKE :query')
                ->setParameter('query', '%' . $objFiltres->query . '%'); // le LIKE a besoin de % %
        }
        // // on peut rajouter autant de filtres - de toute sorte - qu'on veut (durée min, max etc...)
        if (!empty($objFiltres->minDuree)) {
            $reqQB = $reqQB->andWhere('film.duree >= :minDuree')
                ->setParameter('minDuree', $objFiltres->minDuree);
        }

        // Voici un filtre pour le genre (ici pour un seul genre)
        if (!empty($objFiltres->genre)) {
            $reqQB = $reqQB->andWhere('film.genre = :genre')
                ->setParameter('genre', $objFiltres->genre);
        }

        // Maintenant on a un filtre par text, autre par number (basiquement la même chose) et 
        // un autre par Entité (Symfony s'arrange avec les ids, on ne cherche par id nous mêmes)

        // 1. si on ne veut pas de pagination, on renvoie le resultat et c'est bon.
        
        // dd ($reqQB->getQuery()->getResult());
        // return $reqQB->getQuery()->getResult();

        // 2. mais on veut de la pagination! Du coup on n'envoie plus un array d'objets mais un objet PaginatorInterface.
        // on aurait pu faire la pagination dans le controller aussi, tel qu'on fait d'habitude
        // La différence est qu'au lieu d'envoyer un array d'objets on renvoie un PaginatorInterface
        // qui contient des objets et qu'on peut utiliser directement dans la vue... et on plus le parcourir
        // avec un fort. On a tout!

        $reqQBQuery = $reqQB->getQuery();
        return $this->paginator->paginate(
            $reqQBQuery,
            $objFiltres->numeroPage, // objet $data dans le controller, propriété publique dans la classe
            5
        );
    }

    // d'autres requêtes du repo
    public function autreRequete(){
        // obtenir quoi qui ce soit
    
    }
}

