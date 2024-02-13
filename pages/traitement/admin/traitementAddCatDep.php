<?php 
    include("../../../inc/fonction.php");
    if($_GET['id'] == 0){
        InsertCatDepense($_GET['descriptif'],$bdd);
    }else{
        UpdateCatDepense($_GET['id'],$_GET['descriptif'],$bdd);
    }
    header("Location:../../gestion/gestionCategorieDepThe.php");

?>