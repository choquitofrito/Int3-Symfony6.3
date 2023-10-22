// Get all the cards that have a class "option"
const optionCards = document.getElementsByClassName("option");

// Bind event (click) and feedback function for each of them
for (let i = 0; i < optionCards.length; i++) {
    optionCards[i].addEventListener("click", feedbackAndNext);
}

// Function to provide players with feedback, 
// (count correct answers?) and reload page
function feedbackAndNext(event) {

    // get the element that is clicked on
    let card = event.currentTarget;

    // if response correct --> add "green-border" class
    if (card.dataset.type === "correct") {
        card.classList.add("green-border");

        // Declare variable
        let isCorrect = true;

        // Create a new XMLHttpRequest
        const xhr = new XMLHttpRequest();

        // Define the URL and request method
        const url = '/correct/answers/count';
        const method = 'POST';

        // Set up the request
        xhr.open(method, url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        // Send the isCorrect information to the server
        xhr.send(JSON.stringify({ isCorrect: isCorrect }));
    }
    else {
        // else --> add "red-border" class
        card.classList.add("red-border");

        // transform HTML collection into array
        let arrOptionCards = Array.from(optionCards);

        // go through array
        arrOptionCards.forEach(function (option) {

            //  if correct response --> add "dotted-green-border" class
            if (option.dataset.type === "correct") {
                option.classList.add("dotted-green-border");
            }
        });
    }

    // Reload page
    setTimeout(() => {
        window.location.href = "";
    }, 3500);
}