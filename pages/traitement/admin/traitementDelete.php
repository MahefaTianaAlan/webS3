<?php 
include("../../../inc/fonction.php");
    switch ($_GET['nom']) {
        case 'ceuille':
            RemoveCeuilleur($_GET['id'],$bdd);
            header('Location:../../gestion/gestionCueilleursThe.php');
            break;
        case 'catDep':
            RemoveCatDepense($_GET['id'],$bdd);
            header('Location:../../gestion/gestionCategorieDepThe.php');
            break;
        case 'parce': 
            RemoveParcelle($_GET['id'],$bdd);
            header('Location:../../gestion/gestionParcelleThe.php');
            break;
        case 'variete':
            RemoveVariety($_GET['id'],$bdd);
            header('Location:../../gestion/gestionVarieteThe.php');
            break;
        default:
            # code...
            break;
    }


?>