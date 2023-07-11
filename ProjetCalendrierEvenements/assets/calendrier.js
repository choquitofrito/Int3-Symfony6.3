// alert("hello");

// any CSS you import will output into a single css file (app.css in this case)

// importez ici le css que vous voulez rajoutez au calendrier (optionnel, mais le fichier doit exister si vous faites l'import)
import "./styles/calendrier.css";

// importer les objets de fullcalendar dont on a besoin
import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";


// installez AXIOS (npm install axios) et importez-le (concrètement l'objet AXIOS)
import axios from "axios";

document.addEventListener("DOMContentLoaded", function () {

  // 1. on obtient les événements du controller, on les stocke dans le data-calendrier du div  
  // console.log (document.getElementById ('calendrier').dataset.calendrier);
  let evenementsJSONJS = document.getElementById('calendrier').dataset.calendrier;
  // 2. On transforme le JSON en array d'objets JS
  let evenementsJSONJSArray = JSON.parse(evenementsJSONJS);
  
  // console.log(evenementsJSONJSArray);


  // 3. On crée le calendrier, associé au div
  let calendarEl = document.getElementById("calendrier");

  // initilialisation du calendrier
  // et définition du comportement du click
  var calendar = new Calendar(calendarEl, {
    // events:[
    // exemple :
      // {
      //   title: "",
      //   start: "2022-03-20",
      //    etc...
      // },
    // ],
    // nous avons notre array déjà en format js (on la crée plus haut)
    events: evenementsJSONJSArray,
  
    displayEventTime: false, // cacher l'heure
    initialView: "dayGridMonth",
    initialDate: new Date(), // aujourd'hui
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },

    // nous allons utiliser cet evenement pour
    // rajouter de nouveaux Evenements 
    dateClick: function (info) {
      // Nous devons choisir quoi faire quand on clique. 
      // Ici on va juste rajouter un evenement à chaque click qui dure toute la journée.
      // Pour l'effacer, on va gérer la situation avec EventClick
      let nouvelEvenement =
      {
        title: "nouveau",
        start: info.dateStr,
        allDay: true 
        // on rajoute ce qu'on veut ici!
      } 

      // OPTIONNEL: éviter doublons: Obtenir tous les Evenements du calendrier et chercher 
      // un événement ayant 
      // le même title et
      // le même start (ce critére est à vous de le choisir)
      var allEvents = calendar.getEvents();
      var existe = false;
      allEvents.forEach(function(value) 
      {
        
        if (value.title === nouvelEvenement.title && 
          new Date(value.start).toDateString() === new Date(nouvelEvenement.start).toDateString())
        { 
          existe = true;
        }
      });
      // console.log (existe);

      // on ne rajout pas si l'Evenement existe
      if (!existe){
        axios.post("/add/evenement", 
              nouvelEvenement) // axios encode le nouvelElement en json automatiquement et l'envoie dans le corps de la Request
              .then (function (response){
                  // si success dans l'insertion dans la BD
                  console.log (response);
                  // rajouter à calendrier (interface)
                  // d'abord obtenir l'id fourni par Doctrine
                  // et l'incruster dans le nouvel Evenement 
                  nouvelEvenement.id = response.data.id;           
                  calendar.addEvent (nouvelEvenement);
              });  
      }
      else {
        console.log ("on ne rajoute pas, l'Evenement existe");
      } 

    },
    // ici on detecte un click sur un Evenement
    // on va choisir de l'effacer
    eventClick: function (info){
      console.log (info.event.id);
      let idEvenementEffacer = info.event.id;
      // on doit effacer de la BD aussi!
      axios.post("/effacer/evenement", 
       { id: idEvenementEffacer})
      .then (function (response){
        // si success dans l'insertion dans la BD
        console.log (response);
        // effacer du calendrier (interface)  
        calendar.getEventById(idEvenementEffacer).remove();
      }); 
      

    },
    // liste de plugins qu'on va utiliser
    plugins: [interactionPlugin, dayGridPlugin],
  });

  // Affichage
  calendar.render();



});



