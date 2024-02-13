<?php
include("connection.php");
$bdd=dbconnect();

function isUser($email,$bdd)
{
    $sql="select idUser from The_user where email='%s'";
    $sql=sprintf($sql,$email);

    if(mysqli_num_rows(mysqli_query($bdd,$sql))==0) // tsy mety
    {
        return false;
    }
    return true;
}

function isAdmin($email,$bdd)
{
    $sql="select idUser from The_user where email='%s' and isAdmin=1 ";
    $sql=sprintf($sql,$email);

    if(mysqli_num_rows(mysqli_query($bdd,$sql))==0) // tsy mety
    {
        return false;
    }
    return true;
}

function CheckLogin($email,$mdp,$bdd) //VERIFIER EMAIL+MDP
{
    $sql="select idUser from The_user where email='%s' and mdp ='%s' ";
    $sql=sprintf($sql,$email,$mdp);

    if(mysqli_num_rows(mysqli_query($bdd,$sql))==0) 
    {
        return false;
    }
    return true;
}

?>
