<?php
include 'bsd.php';
if (isset($_GET['matiere']))
{
    $sql = 'SELECT DISTINCT Thematiques FROM attentes_fondamentales WHERE matieresID = ?  ORDER BY Thematiques ASC';
    $req2 = $bdd->prepare($sql);
    $req2->execute(array($_GET['matiere']));
 
    $options2='';
    while($donnees = $req2->fetch())
    {
        $options2 .='<option value="'.htmlspecialchars($donnees["Thematiques"]).'">'.htmlspecialchars($donnees["Thematiques"]).'</option>';
    }
$req2->closeCursor();
echo $options2;
}

?>