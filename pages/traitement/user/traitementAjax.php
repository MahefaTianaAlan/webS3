<?php
include("../../../inc/fonction.php");
session_start();

// Vérifie si des données ont été envoyées
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupère les données du formulaire
    $date = $_POST['date'];
    $cueilleur = $_POST['cueilleur']; // Corrected variable name
    $parcelle = $_POST['parcelle'];
    $poid = $_POST['poid'];

    // Exemple de traitement des données
    // Vous pouvez effectuer ici toute opération de traitement, validation, enregistrement en base de données, etc.

    // Répond avec un message de confirmation
    $response = "";
    if(CheckParcelle($parcelle,$poid,$date,$bdd)){
        Ceuillir($cueilleur,$date,$parcelle,$poid,$bdd);
    } else {
        $response = ("Quantiter cueilli superieur a la quantiter restante continuer? ") ? "oui" : "non"; // Corrected variable name and added assignment operator
        echo $response;
    }
    // Envoie la réponse au format JSON
    echo json_encode($response);
} else {
    // Répond avec un message d'erreur si la requête n'est pas une requête POST
    $response = "Erreur: Cette page ne peut être accédée directement";
    echo json_encode($response);
}
?>
