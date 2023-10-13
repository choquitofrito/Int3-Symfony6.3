<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Entity\Ingredients;
use App\Entity\DetailsRecette;

use App\Form\SearchIngredientType;
use App\Repository\RecetteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class RecetteController extends AbstractController
{
    //l'index va me permettre de voir mes recettes
    //récuperer le user!!!! 
    #[IsGranted('ROLE_USER')]
    #[Route('/recette', name: 'recette_index')]
    public function index(RecetteRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        //je récupère toutes les recettes
        $recettes = $paginator->paginate(
            $repository->findBy(['user' => $this->getUser()]),
            $request->query->getInt('page', 1),
            5
        );

        //je les envois à la vue
        return $this->render('recette/index.html.twig', [
            'recettes' => $recettes
        ]);
    }

    #[Route('/recette/public', name: 'recette_index_public')]
    public function indexPublic(RecetteRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        //je récupère toutes les recettes
        $recettes = $paginator->paginate(
            $repository->findPublicRecipe(null),
            $request->query->getInt('page', 1),
            5
        );

        //je les envois à la vue
        return $this->render('recette/indexPublic.html.twig', [
            'recettes' => $recettes
        ]);
    }


    #[IsGranted('ROLE_USER')]
    #[Route('/recette/creation', name: 'recette_creation')]
    public function new(Request $request, EntityManagerInterface $manage): Response
    {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);


        return $this->render('recette/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Security("is_granted('ROLE_USER') and user === recette.getUser()")]
    #[Route('/recette/edition/{id}', 'recette.edit', methods: ['GET', 'POST'])]
    public function edit(
        Recette $recette,
        Request $request,
        EntityManagerInterface $manager
    ): Response {

        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        return $this->render('recette/edit.html.twig', [
            'form' => $form->createView(),
            'recetteId' => $recette->getId()
        ]);
    }

    #[Security("is_granted('ROLE_USER') and user === recette.getUser()")]
    #[Route('/recette/save/{id}', 'recette_save')]
    public function saveAjax(Recette $recette, Request $request, ManagerRegistry $doctrine)
    {


        $form = $this->createForm(RecetteType::class, $recette);
        
        $form->handleRequest($request);
        


        if ($form->isSubmitted() && $form->isValid()) {
            // dd("submit");
            $doctrine->getManager()->persist($recette);

            $doctrine->getManager()->flush();
            return new JsonResponse(['success' => true, 'errors' => []]);

        }
        if (!$form->isValid()){
            $errors = $this->getErrorsFromForm($form);
            return new JsonResponse(['success' => false, 'errors' => $errors]);

        }
    }

    
    // on pourrait fusioner le save pour l'update et pour le new. On laisse tous les deux juste pour la clareté
    #[Security("is_granted('ROLE_USER')")]
    #[Route('/recette/new/save', 'recette_new_save')]
    public function newSaveAjax(Request $request, ManagerRegistry $doctrine)
    {
        $recette = new Recette();

        $form = $this->createForm(RecetteType::class, $recette);
        
        $form->handleRequest($request);

        // attention il faut fixer le user
        $recette->setUser($this->getUser());

        if ($form->isSubmitted() && $form->isValid()) {
            // dd($recette);
            // dd("submit");
            $doctrine->getManager()->persist($recette);

            $doctrine->getManager()->flush();
            return new JsonResponse(['success' => true, 'errors' => []]);

        }
        if (!$form->isValid()){
            $errors = $this->getErrorsFromForm($form);
            return new JsonResponse(['success' => false, 'errors' => $errors]);

        }
    }

    private function getErrorsFromForm(FormInterface $form): array
    {
        $errors = [];

        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }

        foreach ($form->all() as $childForm) {
            if (!$childForm->isValid()) {
                $errors[$childForm->getName()] = $this->getErrorsFromForm($childForm);
            }
        }
        return $errors;
    }

    #[Route('/recette/suppression/{id}', 'recette.delete', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER') and user === recette.getUser()")]
    public function delete(
        EntityManagerInterface $manager,
        Recette $recette
    ): Response {
        $manager->remove($recette);
        $manager->flush();

        $this->addFlash(
            'success',
            'Votre recette a été supprimé avec succès !'
        );

        return $this->redirectToRoute('recette_index');
    }

    #[Route('/recette/{id}', 'recette.show', methods: ['GET', 'POST'])]
    public function show(Recette $recette): Response
    {
        return $this->render(
            'recette/show.html.twig',
            ['recette' => $recette]
        );
    }
}
