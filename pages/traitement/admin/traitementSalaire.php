<?php 
include("../../../inc/fonction.php");


$a = UpdateAllVariety($_GET['prixU'],$bdd);
header("Location:../../gestion/salaire.php");


?>