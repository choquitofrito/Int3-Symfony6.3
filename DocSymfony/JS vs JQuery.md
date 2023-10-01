# Cheatsheets JS vs JQuery

```javascript
// Sélectionner un élément par son ID

document.getElementById("monID");

$("#monID");

// Sélectionner un élément par sa classe

document.getElementsByClassName("maClasse")[0]; // Notez que cela retourne une collection d'éléments

$(".maClasse");

// Sélectionner tous les éléments d'un type

document.getElementsByTagName("balise");

$("balise");

// Modifier le texte d'un élément
document.getElementById("monElement").textContent = "Nouveau texte";

$("#monElement").text("Nouveau texte");

// Modifier le contenu HTML d'un élément
document.getElementById("monElement").innerHTML = "<p>Nouveau contenu</p>";

$("#monElement").html("<p>Nouveau contenu</p>");

// Ajouter une classe à un élément
document.getElementById("monElement").classList.add("maClasse");

$("#monElement").addClass("maClasse");

// Attacher un événement de clic à un élément
document.getElementById("monElement").addEventListener("click", function () {
    // Code à exécuter lors du clic
});
$("#monElement").click(function () {
    // Code à exécuter lors du clic
});

// Attacher un événement de clic à tous les éléments d'une classe
const elementsWithClass = document.querySelectorAll(".myClass");
elementsWithClass.forEach(function(element) {
    element.addEventListener("click", function() {
        // Code à exécuter
    });
});

$(".myClass").click(function () {
  // Code à exécuter lors du clic
});


// Vérifier si un élément a une classe
if (document.getElementById("myElement").classList.contains("maClasse")) {
    // Faire quelque chose si l'élément a la classe
}

if ($("#myElement").hasClass("maClasse")) {
    // Faire quelque chose si l'élément a la classe
}




```

