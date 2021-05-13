<?php
include 'bsd.php';
if (isset($_GET['cible']))
{
    $cycle = $_GET['cycle'];
    $sql = "SELECT DISTINCT Objectifs , Cycle FROM attentes_fondamentales WHERE Cible = ? AND Cycle = '$cycle' ORDER BY Objectifs ASC ";
    $req4 = $bdd->prepare($sql);
    $req4->execute(array($_GET['cible']));
 
    $options4='';
    while($donnees = $req4->fetch())
    {
        $options4 .='<option value="'.htmlspecialchars($donnees["Objectifs"]).'">'.htmlspecialchars($donnees["Objectifs"]).'</option>';
    }
$req4->closeCursor();
echo $options4;
}

?>