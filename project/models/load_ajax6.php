<?php
include 'bsd.php';
if (isset($_GET['cours'])) 
{
	$cycle = $_GET['cycle'];
    $sql = "SELECT DISTINCT attentesNom , Cycle FROM attentes_fondamentales WHERE Cours= ? AND Cycle = '$cycle' ORDER BY attentesNom ASC";
    $req6 = $bdd->prepare($sql);
    $req6->execute(array($_GET['cours']));
 
    $options6='';
    while($donnees = $req6->fetch())
    {
        $options6 .='<option value="'.htmlspecialchars($donnees["attentesNom"]).'">'.htmlspecialchars($donnees["attentesNom"]).'</option>';
    }
$req6->closeCursor();
echo $options6;
}

?>