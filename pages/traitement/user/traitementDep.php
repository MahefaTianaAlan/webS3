<?php 
include("../../../inc/fonction.php");
session_start();
$date = $_POST['date'];
$catDep = $_POST['catDep'];
$montant = $_POST['montant'];

$fnDate = explode("/",$date);
$fn = "".$fnDate[2]."-".$fnDate[1]."-".$fnDate[0];


$ato = Depenser($catDep,$montant,$fn,$bdd);

?>