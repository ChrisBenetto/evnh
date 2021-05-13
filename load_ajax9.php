<?php
include 'bsd.php';
if (isset($_GET['matiere'])) 
{
	$cycle = $_GET['cycle'];
    $sql = "SELECT DISTINCT attentesNom , Cycle FROM attentes_fondamentales WHERE matieresID= ? AND Cycle = '$cycle' ORDER BY attentesNom ASC";
    $req9 = $bdd->prepare($sql);
    $req9->execute(array($_GET['matiere']));
 
    $options9='';
    while($donnees = $req9->fetch())
    {
        $options9 .='<option value="'.htmlspecialchars($donnees["attentesNom"]).'">'.htmlspecialchars($donnees["attentesNom"]).'</option>';
    }
$req9->closeCursor();
echo $options9;
}

?>