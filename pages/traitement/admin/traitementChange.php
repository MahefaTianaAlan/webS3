<?php 
include("../../../inc/fonction.php");
    switch ($_GET['nom']) {
        case 'ceuille':
            RemoveCeuilleur($_GET['id'],$bdd);
            header('Location:../../gestion/gestionCueilleursThe.php');
            break;
        
        default:
            # code...
            break;
    }


?>