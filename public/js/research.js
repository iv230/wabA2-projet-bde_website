console.log('Starting script');

let baseUrl = 'http://localhost:3000/';
let apiUrl = baseUrl + 'api/';

let element = document.getElementById("events");

element.addEventListener('keyup', function(event) {
    console.log('Bar updated');

    let name = element.value;

    fetch(apiUrl + 'events/' + name)
        .then(res => res.json())
        .then(data => {
            console.log(data);
            /*
             data contient tous les noms correspondant à la recherche.
             Il faut donc maintenant placer tous ces noms dans la barre
             déroulante.
             */
        });
});


