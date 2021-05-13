<?php
include 'bsd.php';
if (isset($_GET['matiere']))
{
    $sql = "SELECT DISTINCT Thematiques FROM attentes_fondamentales WHERE matieresID = ? ORDER BY Thematiques ASC";
    $req8 = $bdd->prepare($sql);
    $req8->execute(array($_GET['matiere']));
 
    $options8='';
    while($donnees = $req8->fetch())
    {
        $options8 .='<option value="'.htmlspecialchars($donnees["Thematiques"]).'">'.htmlspecialchars($donnees["Thematiques"]).'</option>';
    }
$req8->closeCursor();
echo $options8;
}

?>