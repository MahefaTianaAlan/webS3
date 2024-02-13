function sendRequest(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    //POST si envoie de formulaire
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log('La requête a réussi avec succès:', xhr.responseText);
            // Ou utilisez alert pour afficher un message d'alerte
            // alert('La requête a réussi avec succès: ' + xhr.responseText);
        } else {
            console.error('La requête a échoué avec un statut ' + xhr.status);
            // Ou utilisez alert pour afficher un message d'alerte
            // alert('La requête a échoué avec un statut ' + xhr.status);
        }
    };

    xhr.onerror = function () {
        console.error('Erreur réseau lors de la requête');
        // Ou utilisez alert pour afficher un message d'alerte
        // alert('Erreur réseau lors de la requête');
    };

    xhr.send();
}
    ///Formulaire
    function sendData() {
        var formData = new FormData(document.getElementById('myForm'));
        var xhr = new XMLHttpRequest();
        
        xhr.open('POST', '../../traitement/user/traitementAjax.php', true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log('La requête a réussi avec succès:', xhr.responseText);
                // Faire quelque chose avec la réponse
            } else {
                console.error('La requête a échoué avec un statut ' + xhr.status);
                // Gérer les erreurs
            }
        };

        xhr.onerror = function () {
            console.error('Erreur réseau lors de la requête');
            // Gérer les erreurs
        };

        xhr.send(formData);
    }
    //getData
    function getData(callback) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'data.php', true);
    
        xhr.onload = function () { 
            if (xhr.status >= 200 && xhr.status < 300) {
                 var responseData = xhr.responseText;
                console.log('Données récupérées avec succès:', responseData);
                // Faites quelque chose avec les données récupérées, par exemple les placer dans une variable
                var myData = responseData;
                console.log('Données dans la variable myData:', myData);
                // Appeler la fonction de rappel avec les données récupérées
                callback(myData);
            } else {
                console.error('La requête a échoué avec un statut ' + xhr.status);
                // Gérer les erreurs
            }
        };
    
        xhr.onerror = function () {
            console.error('Erreur réseau lors de la requête');
            // Gérer les erreurs
        };
    
        xhr.send();
    }
    
    // Utilisation de getData avec une fonction de rappel
    getData(function(myData) {
        console.log('Données récupérées:', myData);
        // Faire quelque chose avec myData ici
    });
    
    
    
    
