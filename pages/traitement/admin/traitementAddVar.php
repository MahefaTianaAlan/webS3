<?php 
    include("../../../inc/fonction.php");
    if($_GET['id'] == 0){
        InsertVariet($_GET['nom'],$_GET['occupation'],$_GET['rendement'],$_GET['prix'],$bdd);
    }else{
        UpdateVariety($_GET['id'],$_GET['nom'],$_GET['occupation'],$_GET['rendement'],$_GET['prix'],$bdd);
    }
    header("Location:../../gestion/gestionVarieteThe.php");

?>