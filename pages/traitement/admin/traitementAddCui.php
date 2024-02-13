<?php 
    include("../../../inc/fonction.php");
$date = $_GET['dtn'];
$fnDate = explode("/",$date);
$fn = "".$fnDate[2]."-".$fnDate[1]."-".$fnDate[0];

    if($_GET['id'] == 0){
        InsertCeuilleur($_GET['nom'],$_GET['sexe'],$fn,$bdd);
    }else{
        UpdateCeuilleur($_GET['id'],$_GET['nom'],$_GET['sexe'],$fn,$bdd);
    }
    header("Location:../../gestion/gestionCueilleursThe.php");

?>