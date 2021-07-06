<?php
include 'bsd.php';
if (isset($_GET['activite'])) 
{

$activite = $_GET['activite'];
$req = $bdd->query("SELECT * FROM activite WHERE activiteAttente1 = '$activite' OR activiteAttente2 = '$activite' OR activiteAttente3 = '$activite'");
$options="";
		while($donnees = $req->fetch())
		{
    			$options.='<option value="' . $donnees["activiteNom"] .'">'.  $donnees["activiteNom"].'</option>';
    	}
header('Content-Type: application/json;charset=utf-8');
echo json_encode($options);
$req->closeCursor();
}
?>