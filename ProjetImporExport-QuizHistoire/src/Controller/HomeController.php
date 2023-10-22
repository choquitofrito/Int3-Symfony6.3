<?php

namespace App\Controller;

use App\Entity\QuizItem;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

// own service
use App\Service\GenerateOptions;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(SessionInterface $session): Response
    {
        $session->clear();

        return $this->render('home/index.html.twig');
    }

    #[Route('/quiz', name: 'quiz')]
    public function quiz(ManagerRegistry $doctrine, GenerateOptions $generator, SessionInterface $session): Response
    {
        // Get array containing all the quiz items
        $allItems = $doctrine->getRepository(QuizItem::class);
        $allItemsArray = $allItems->findAll();

        // Pick random item from array
        $quizPropositionIndex = mt_rand(0, count($allItemsArray) - 1);
        $quizProposition = $allItemsArray[$quizPropositionIndex];

        // Find 3 coherent options by using own GenerateOptions service
        $options = $generator->genOptions($quizProposition);

        // Shuffle the array to randomize the order
        shuffle($options);

        // Check if session empty, if not --> empty session

        $cardCompilation = $session->get('card_compilation');

        if (empty($cardCompilation)) {
            // premier fois qu'on arrive sur le site,
            // on n'a pas de cartes alors notre compteur
            // doit valoir 0
            $session->set('card_compilation', []);
            $session->set('counter', 0);
        }
        // Check if game ended
        if ($session->get('counter') == 3) {
            // game ended, show result
            // dd("Game over");
            return $this->redirectToRoute('allcards');

        } else {
            // game in process, increment counter
            $session->set('counter', $session->get('counter') + 1);
        }

        $cardCompilation[] = $quizProposition;
        $cardCompilation = array_merge($cardCompilation, $options);

        // stocker dans la session
        $session->set('card_compilation', $cardCompilation);

        $vars = [
            'quizProposition' => $quizProposition,
            'options' => $options,
        ];

        return $this->render('home/quiz.html.twig', $vars);
    }

    // Controller action to handle the AJAX request
    #[Route('/correct/answers/count', name: 'correct count')]
    public function updateCorrectAnswersCount(Request $ajaxRequest, Session $session)
    {
        // Get the 'isCorrect' value from the AJAX request
        $data = json_decode($ajaxRequest->getContent(), true);
        $isCorrect = $data['isCorrect'];

        // If the user's answer is correct, increment the count in the session
        if ($isCorrect) {
            $correctAnswersCount = $session->get('correct_answers_count', 0);
            $session->set('correct_answers_count', $correctAnswersCount + 1);
        }

        // // You can return a response if needed
        // return new Response('Success');
    }

    // Controller --> all cards view (game over)
    #[Route('/allcards', name: 'allcards')]
    public function allcards(SessionInterface $session): Response
    {
        $cardCompilation = $session->get('card_compilation');

        $vars = ['card_compilation' => $cardCompilation];
        
        // $session->clear();

        return $this->render('home/allcards.html.twig', $vars);
    }

    #[Route('/vue1', name: 'vue 1')]
    public function vue1(): Response
    {
        return $this->render('home/vue1.html.twig');
    }

    #[Route('/vue2', name: 'vue 2')]
    public function vue2(): Response
    {
        return $this->render('home/vue2.html.twig');
    }
}
