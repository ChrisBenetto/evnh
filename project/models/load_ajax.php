<?php
include 'bsd.php';
if (isset($_GET['section']))
{
    $sql = 'SELECT DISTINCT Cours FROM attentes_fondamentales WHERE Section = ? ORDER BY Cours ASC';
    $req = $bdd->prepare($sql);
    $req->execute(array($_GET['section']));
    $options='';
    while($donnees = $req->fetch())
    	
    {
        $options .='<option value="'.htmlspecialchars($donnees["Cours"]).'">'.htmlspecialchars($donnees["Cours"]).'</option>';
    }
$req->closeCursor();
echo $options;
}

?>