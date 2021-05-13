<?php
include 'bsd.php';
if (isset($_GET['thematique'])) 
{
    $cycle = $_GET['cycle'];
    $sql = "SELECT DISTINCT Cible, Cycle FROM attentes_fondamentales WHERE Thematiques = ? AND Cycle = '$cycle' ORDER BY Cible ASC";
    $req3 = $bdd->prepare($sql);
    $req3->execute(array($_GET['thematique']));
 
    $options3='';
    while($donnees = $req3->fetch())
    {
        $options3 .='<option value="'.htmlspecialchars($donnees["Cible"]).'">'.htmlspecialchars($donnees["Cible"]).'</option>';
    }

$req3->closeCursor();
echo $options3;	
}

?>