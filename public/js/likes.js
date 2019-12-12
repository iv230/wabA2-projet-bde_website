let pageUrl = document.documentURI;
let id = pageUrl.split('/')[4];
let baseUrl = 'http://localhost:3000/';
let apiUrl = baseUrl + 'api/';
let element = document.getElementById("likeCount");
let error = document.getElementById("error");

function updateLikes() {
    element.innerText = "Like (Chargement...)";

    fetch(apiUrl + 'like/' + id)
        .then(res => res.json())
        .then(data => {
            element.innerText = "Like (" + data + ")";
        });
}

element.addEventListener('click', function(event){
  fetch(baseUrl + 'likeEvent/' + id)
    .then(res => res.json())
    .then(data => {
        let message= "";

        switch (data) {
            case '200':
                message = "Evènement liké !";
                break;
            case '403':
                message = "Evènement déjà liké !";
                break;
            case '401':
                message = "Il faut être connecté pour liker un évènement !";
                break;
            default:
                message = "Erreur inconnue (" + data + ")";
        }
        
        error.innerText = message;
    });

  updateLikes();
});

updateLikes();
