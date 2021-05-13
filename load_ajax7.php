<?php
include 'bsd.php';
if (isset($_GET['thematique'])) 
{
	$cycle = $_GET['cycle'];
    $sql = "SELECT DISTINCT attentesNom , Cycle FROM attentes_fondamentales WHERE Thematiques = ? AND Cycle = '$cycle' ORDER BY attentesNom ASC";
    $req7 = $bdd->prepare($sql);
    $req7->execute(array($_GET['thematique']));
 
    $options7='';
    while($donnees = $req7->fetch())
    {
        $options7 .='<option value="'.htmlspecialchars($donnees["attentesNom"]).'">'.htmlspecialchars($donnees["attentesNom"]).'</option>';
    }
$req7->closeCursor();
echo $options7;
}

?>