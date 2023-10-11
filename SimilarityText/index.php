<?php

require_once 'vendor/autoload.php';

use \NlpTools\Similarity\JaccardIndex;
use \NlpTools\Similarity\CosineSimilarity;

// Sample book descriptions
// $description1 = "A gripping tale of adventure on the high seas.";
// $description2 = "An epic journey across the ocean filled with thrilling adventures.";
$description1 = "The book is about the russian revolution";
$description2 = "The back is filled with russian cakes";


// Tokenize the descriptions into words
$tokenizer = new \NlpTools\Tokenizers\WhitespaceTokenizer();
$tokens1 = $tokenizer->tokenize($description1);
$tokens2 = $tokenizer->tokenize($description2);

// Calculate Cosine similarity
$cosine = new CosineSimilarity();
$similarity = $cosine->similarity($tokens1, $tokens2);


// Output the similarity score
echo "Cosine Similarity: $similarity\n";
