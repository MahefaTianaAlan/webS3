<?php
include("../../inc/fonction.php");
session_start();
$email = $_POST['login'];
$mdp = $_POST['password'];

if(CheckLogin($email,$mdp,$bdd)){
    $_SESSION['user'] = $email;
    if(isAdmin($email,$bdd)){
        header('Location:../gestion/gestionVarieteThe.php');
    }
    else if(isUser($email,$bdd)){
        header('Location:../add/user/addCueillette.html');
    }
}else{
    header('Location:../../index.html');
}


?>