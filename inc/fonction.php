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
//varietyTea
function InsertVariety($nomVar,$occupation,$rendement,$prix,$bdd)// idUser 1 par defaut
{
    $sql="INSERT INTO The_varietyTea (nomVar, occupation, rendement, prixKg) 
    VALUES ('%s',%f,%f,%f)";
    $sql=sprintf($sql,$nomVar,$occupation,$rendement,$prix);

    return insertRequete($bdd,$sql);
}
function GetVarietyById($id,$bdd){
    $sql="select * from The_varietyTea where idVar=%d ";
    $sql=sprintf($sql,$id);
    return getData($bdd,$sql);
}
function UpdateVariety($id,$nomVar,$occupation,$rendement,$prix,$bdd)
{
    $sql="update The_varietyTea set nomVar='%s',occupation=%f,rendement=%f,prixKg=%f where idVar=%d";
    $sql=sprintf($sql,$nomVar,$occupation,$rendement,$prix,$id);
    return insertRequete($bdd,$sql);
}
function UpdateAllVariety($prixU,$bdd)
{
    $vars = GetAllVarietyTea($bdd);
    for($i = 1 ; $i < count($vars)+1 ; $i++){
        $sql="update The_varietyTea set prixKg=%f where idVar=%d";
        $sql=sprintf($sql,$prixU,$i);
        insertRequete($bdd,$sql);    
    }
    return 0;
}
function RemoveVariety($id,$bdd)
{
    $sql="delete from The_varietyTea where idVar=%d ";
    $sql=sprintf($sql,$id);
    return insertRequete($bdd,$sql);
}
//parcelle
// INSERT INTO The_parcelles (surfaceH, idVar) 
// VALUES 
// (15.75, 1),

function InsertParcelle($surfaceH,$idVar,$bdd)// idUser 1 par defaut
{
    $sql="INSERT INTO The_parcelles (surfaceH, idVar) 
    VALUES (%f,%d)";
    $sql=sprintf($sql,$surfaceH,$idVar);
    return insertRequete($bdd,$sql);
}
function GetParcelleById($id,$bdd){
    $sql="select * from The_parcelles where numero=%d ";
    $sql=sprintf($sql,$id);
    return getData($bdd,$sql);
}
function UpdateParcelle($id,$surfaceH,$idVar,$bdd)
{
    $sql="update The_parcelles set surfaceH=%f,idVar=%d where numero=%d";
    $sql=sprintf($sql,$surfaceH,$idVar,$id);
    return insertRequete($bdd,$sql);
}
function RemoveParcelle($id,$bdd)
{
    $sql="delete from The_parcelles where numero=%d ";
    $sql=sprintf($sql,$id);
    return insertRequete($bdd,$sql);
}
//catDepense
// INSERT INTO The_catDepense (descriptif) 
// VALUES 
// ('Achat de matériel agricole'),
function InsertCatDepense($desc,$bdd)// idUser 1 par defaut
{
    $sql="INSERT INTO The_catDepense (descriptif) 
    VALUES ('%s')";
    $sql=sprintf($sql,$desc);
    return insertRequete($bdd,$sql);
}
function GetCatDepenseById($id,$bdd){
    $sql="select * from The_catDepense where idCatDep=%d ";
    $sql=sprintf($sql,$id);
    return getData($bdd,$sql);
}
function UpdateCatDepense($id,$desc,$bdd)
{
    $sql="update The_catDepense set descriptif='%s' where idCatDep=%d";
    $sql=sprintf($sql,$desc,$id);
    return insertRequete($bdd,$sql);
}
function RemoveCatDepense($id,$bdd)
{
    $sql="delete from The_catDepense where idCatDep=%d ";
    $sql=sprintf($sql,$id);
    return insertRequete($bdd,$sql);
}

// insert into The_ceuillir(idCeuil,idUser,daty,idParc,poids) 
//values (2,"2004-12-03",1,21.2);

// insert into The_depenser (idCatDep,montant,daty)
// values(1,100.9,"2023-12-09");

//ici


function GetIdVarParcelle($idParc,$bdd)
{
    $sql="select idVar from The_parcelles where numero=%d";
    $sql=sprintf($sql,$idParc);
    $resultat = mysqli_query($bdd,$sql);
    if(mysqli_num_rows($resultat) != 0)
    {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar=$val["idVar"];
    return $idVar;
}
function GetSurfaceHParcelle($idParc,$bdd)
{
    $sql="select surfaceH from The_parcelles where numero=%d";
    $sql=sprintf($sql,$idParc);
    $resultat = mysqli_query($bdd,$sql);
    if(mysqli_num_rows($resultat) != 0)
    {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar=$val["surfaceH"];
    return $idVar;
}
function GetRendementParcelle($idParc, $bdd)
{
    $idVar = GetIdVarParcelle($idParc, $bdd);
    $surface = GetSurfaceHParcelle($idParc, $bdd);
    $val = $surface * 1000; // en m2
    $sql = "SELECT rendement * (%f / occupation) AS rand FROM The_varietyTea WHERE idVar = %d";
    $sql = sprintf($sql, $val, $idVar);
    $resultat = mysqli_query($bdd, $sql);
    if (mysqli_num_rows($resultat) != 0) {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar = $val["rand"]; // kg debut de mois par pacelle
    return $idVar;
}

function GetReste($idParc,$poidNalaina,$bdd)
{ //totalAo-totalNalaina
    $total=GetRendementParcelle($idParc,$bdd);
    return $total-$poidNalaina;
}
function GetPrixParcelle($idParc,$bdd)
{
    $idVar=GetIdVarParcelle($idParc,$bdd);
    $sql="select prixKg from The_varietyTea where idVar=%d";
    $sql=sprintf($sql,$idVar);
    $resultat = mysqli_query($bdd,$sql);
    if(mysqli_num_rows($resultat) != 0)
    {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar=$val["prixKg"]; //kg debut de mois par pacelle
    return $idVar;
}                                                     
function GetTotalDepense($bdd)
{
    $sql="select sum(montant) as depense_total from The_depenser";
    // WHERE daty BETWEEN '%s' AND '%s' 
    $resultat = mysqli_query($bdd,$sql);
    if(mysqli_num_rows($resultat) != 0)
    {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar=$val["depense_total"]; //kg debut de mois par pacelle
    return $idVar;
}
function CoutRevient($bdd,$debut,$fin) //3
{
    $sql1="create or replace view v_karamaParCeuilleur as 
    Select SUM(c.poids * v.prixKg) AS TotalKarama
    FROM The_ceuillir c
    JOIN The_varietyTea v ON c.idParc = v.idVar
    WHERE c.daty BETWEEN '%s' AND '%s'
    group by idCeuil";
    $sql1=sprintf($sql1,$debut,$fin);
    $nety=insertRequete($bdd,$sql1);

    $sql="select sum(TotalKarama) as somme from v_karamaParCeuilleur";
    $resultat = mysqli_query($bdd,$sql);
    if(mysqli_num_rows($resultat) != 0)
    {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar=$val["somme"]; 
    return $idVar + GetTotalDepense($bdd) ; //sans considere date pour depense
}

function SumCeuillete($bdd){ //not needed
    $sql="select sum(poids) from The_Ceuillir ";
    return getData($bdd,$sql);
}
function changeDate($date){
$fnDate = explode("/",$date);
$fn = "".$fnDate[2]."-".$fnDate[1]."-".$fnDate[0];
return $fn;
}
function restePoid($debut, $fin, $bdd) //2
{
    // Initialize an empty array to store the results
    $results = array();

    // Fetch data from the database
    $sql = "SELECT 
                idParc AS Parcelle,
                MONTH(daty) AS Mois,
                YEAR(daty) AS Annee,
                SUM(poids) AS Poids_Total
            FROM 
                The_ceuillir
            WHERE 
                daty BETWEEN '%s' AND '%s' 
            GROUP BY 
                idParc, MONTH(daty), YEAR(daty)
            ORDER BY 
                Annee, Mois, Parcelle";

    $sql = sprintf($sql, $debut, $fin);
    $result = mysqli_query($bdd, $sql);

    if ($result) {
        // Iterate through the results and calculate Reste for each row
        while ($row = mysqli_fetch_assoc($result)) {
            $idParc = $row['Parcelle'];
            $poidsTotal = $row['Poids_Total'];
            $reste = GetReste($idParc, $poidsTotal, $bdd);

            // Store the values in an associative array
            $entry = array(
                'Parcelle' => $idParc,
                'Mois' => $row['Mois'],
                'Annee' => $row['Annee'],
                'Poids_Total' => $poidsTotal,
                'Reste' => $reste
            );

            // Add the entry to the results array
            $results[] = $entry;
        }

        mysqli_free_result($result);
        return $results; // Return the array of results
    } else {
        // Handle error
        return false;
    }
}
//modifier ajout colonne idUser
function Depenser($idCatDep,$montant,$daty,$bdd)
{
    $sql="INSERT INTO The_depenser (idCatDep,montant,daty)
    VALUES (%d, %f,'%s')";
    $sql=sprintf($sql,$idCatDep,$montant,$daty);
    return insertRequete($bdd,$sql);
}

function Ceuillir($idCeuil,$daty,$idParc,$poids,$bdd)
{
    $sql="INSERT INTO The_ceuillir (idCeuil,daty,idParc,poids) 
    VALUES (%d,%d,%f,%f)";
    $sql=sprintf($sql,$idCeuil,$daty,$idParc,$poids);
    return insertRequete($bdd,$sql);
}
function PoidTaken($idParc,$daty,$bdd)
{
    $sql="SELECT 
            SUM(poids) AS TotalPoids
        FROM 
            The_ceuillir
        WHERE 
            MONTH(daty) = MONTH('%s') 
            AND YEAR(daty) = YEAR('%s')
            AND DAY(daty) <= DAY('%s')";
    
    $sql=sprintf($sql,$daty,$daty,$daty);
    // echo($sql);
    $resultat = mysqli_query($bdd,$sql);
    if(mysqli_num_rows($resultat) != 0)
    {
        $val = mysqli_fetch_assoc($resultat);
        mysqli_free_result($resultat);
    }
    $idVar=$val["TotalPoids"];
    return $idVar;
}
function CheckParcelle($idParc,$poidTake,$daty,$bdd)
{
    $poidNalaina=PoidTaken($idParc,$daty,$bdd);
    $reste=GetReste($idParc,$poidNalaina,$bdd);
    if($poidTake>$reste){
        return false;
    }
    return true;
}



?>








