<?php 
    include("../../../inc/fonction.php");
    $dateDebut = changeDate($_POST['dd']);
    $dateFin = changeDate($_POST['df']);


    $poidTT = restePoid($dateDebut, $dateFin, $bdd);
    $reviens = CoutRevient($bdd,$dateDebut,$dateFin);
?>
<html>
    <tr>
        <td>Poid Total cueillette</td>
        <td>Poids restante</td>
        <td>Cout de reviens</td>
    </tr>
    <tr>
        <td><?php echo $poidTT['Poids_Total']; ?></td>
        <td><?php echo $poidTT['Reste']; ?></td>
        <td><?php echo $reviens; ?></td>
    </tr>
</html>