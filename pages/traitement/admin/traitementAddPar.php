<?php 
    include("../../../inc/fonction.php");
    if($_GET['id'] == 0){
        InsertParcelle($_GET['surface'],$_GET['idVar'],$bdd);
    }else{
        UpdateParcelle($_GET['id'],$_GET['surface'],$_GET['idVar'],$bdd);
    }
    header("Location:../../gestion/gestionParcelleThe.php");

?>