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

function insertRequete($bdd,$sql) //EXECUTE COMMANDES
{
    $resultat = mysqli_query($bdd, $sql);
    if ($resultat == false) {
        return false;
    }
    return true;
}

function getData($bdd,$req)
{
    $new = NULL;
    $resultat = mysqli_query($bdd,$req);
    if(mysqli_num_rows($resultat) != 0)
    {
        while ($data = mysqli_fetch_assoc($resultat)) {
            $new[] = $data;
        }
        mysqli_free_result($resultat);
    }
    return $new; //ato daholo ny info rehetra
                //bouclena fotsiny ary
}

//select all 
function GetAllCeuilleurs($bdd)
{
    $sql="select * from The_ceuilleurs";
    return getData($bdd,$sql);
}
function GetAllVarietyTea($bdd)
{
    $sql="select * from The_varietyTea";
    return getData($bdd,$sql);
}
function GetAllParcelles($bdd)
{
    $sql="select * from The_parcelles";
    return getData($bdd,$sql);
}
function GetAllCatDepense($bdd)
{
    $sql="select * from The_catDepense";
    return getData($bdd,$sql);
}
function GetAllCeuillir($bdd)
{
    $sql="select * from The_ceuillir";
    return getData($bdd,$sql);
}
function GetAllDepenses($bdd)
{
    $sql="select * from The_depenser";
    return getData($bdd,$sql);
}

//Ceuilleur
function InsertCeuilleur($nom,$sexe,$dtn,$bdd)// idUser 1 par defaut
{
    $sql="INSERT INTO The_ceuilleurs (nom,sexe,dtn)
    VALUES ('%s', '%s','%s')";
    $sql=sprintf($sql,$nom,$sexe,$dtn);

    return insertRequete($bdd,$sql);
}

function GetCeuilleurById($id,$bdd){
    $sql="select * from The_ceuilleurs where idCeuil=%d ";
    $sql=sprintf($sql,$id);
    return getData($bdd,$sql);
}

function UpdateCeuilleur($id,$Newnom,$Newsexe,$Newdtn,$bdd)
{
    $sql="update The_ceuilleurs set nom='%s',sexe='%s', dtn='%s' where idCeuil=%d";
    $sql=sprintf($sql,$Newnom,$Newsexe,$Newdtn,$id);
    return insertRequete($bdd,$sql);
}

function RemoveCeuilleur($id,$bdd)
{
    $sql="delete from The_ceuilleurs where idCeuil=%d ";
    $sql=sprintf($sql,$id);
    return insertRequete($bdd,$sql);
}







?>
