import "./styles/calendrier.css";

import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

import axios from "axios";

// ce code séra lancé quand le DOM sera chargé
document.addEventListener("DOMContentLoaded", function () {
  // Obtenir les données du controller (le JSON)
  let div_calendrier = document.getElementById("div_calendrier");
  let eventsJSON = div_calendrier.dataset.calendrier;

  let eventsArray = JSON.parse(eventsJSON);

  // Créer un objet Calendar (fullcalendar)
  let calendar = new Calendar(div_calendrier, {
    // données pour le calendrier (evenements)
    events: eventsArray,

    initialView: "dayGridMonth",
    initialDate: new Date(), // aujourd'hui
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    plugins: [interactionPlugin, dayGridPlugin],
    // click sur date
    dateClick: function (info) {
      console.log(info.dateStr);

      // Laurence
      // window.location.href =
        // "/affiche/liste/equipes/" +
        // info.dateStr +
        // "/" +
        // div_calendrier.dataset.equipe;
    },
  });

  calendar.render();

  // Mettre le calendar dans le DIV

  // Fixer le format du calendar

  // Fixer les événements (click)
  // - Laurence: charger une autre page, il faut envoyer la date et l'équipe
  // - Hsin I: aller vers une page pour reserver
  // - Yusra: on clique sur une disponibilité:
  //          - Modifier le dom pour afficher les slots qui sont libres pour cette date
  //          - Gérer le click sur le slot -> enlever le slot des Disponibilités et le rajouter à RDV
});
