# Exemples appel AJAX avec Axios

```javascript
// Faire une requête GET vers une API
axios.get('https://jsonplaceholder.typicode.com/posts/1')
  .then((response) => {
    console.log('Réponse de la requête GET :', response.data);
  })
  .catch((error) => {
    console.error('Erreur lors de la requête GET :', error);
  });

```


```javascript
// Faire une requête GET vers une API
axios.get('https://jsonplaceholder.typicode.com/posts/1')
  .then((response) => {
    console.log('Réponse de la requête GET :', response.data);
  })
  .catch((error) => {
    console.error('Erreur lors de la requête GET :', error);
  });

```



```javascript
// Données à envoyer avec la requête POST
const postData = {
  title: 'Mon post',
  body: 'Contenu de mon post',
  userId: 1,
};
// Faire une requête POST vers une API
axios.post('https://jsonplaceholder.typicode.com/posts', postData)
  .then((response) => {
    console.log('Réponse de la requête POST :', response.data);
  })
  .catch((error) => {
    console.error('Erreur lors de la requête POST :', error);
  });
```

```javascript
const axios = require('axios');

// Faire une requête GET vers une ressource inexistante pour déclencher une erreur
axios.get('https://jsonplaceholder.typicode.com/nonexistent')
  .then((response) => {
    console.log('Réponse de la requête GET :', response.data);
  })
  .catch((error) => {
    if (error.response) {
      // La requête a été effectuée, mais le serveur a répondu avec un code d'erreur (4xx, 5xx)
      console.error('Erreur de réponse du serveur :', error.response.status, error.response.statusText);
    } else if (error.request) {
      // La requête n'a pas pu être effectuée (pas de réponse du serveur)
      console.error('Erreur de la requête :', error.request);
    } else {
      // Une erreur s'est produite lors de la configuration de la requête
      console.error('Erreur lors de la configuration de la requête :', error.message);
    }
  });
```





```javascript
// On créera normalement le FormData à partir d'un formulaire du DOM:
const formData = new FormData(document.getElementById ("formUser"));

// On peut rajouter d'autres champs ...
formData.append('username', 'john_doe');
formData.append('avatar', avatarFile); // avatarFile est un objet File provenant d'un champ de fichier HTML


// Faites une requête POST avec FormData
axios.post('https://example.com/upload', formData, {
  headers: {
    'Content-Type': 'multipart/form-data', // Spécifiez le type de contenu en tant que multipart/form-data
  },
})
  .then((response) => {
    console.log('Réponse de la requête POST :', response.data);
  })
  .catch((error) => {
    console.error('Erreur lors de la requête POST :', error);
  });

```