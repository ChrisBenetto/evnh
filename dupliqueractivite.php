<?php 

include "bsd.php";

$activiteID = $_GET['activiteID'];
$rep = $bdd->query("SELECT * FROM activite WHERE activiteID = '$activiteID'");	
while ($don = $rep->fetch())
{
	$req = $bdd->prepare('INSERT INTO activite(activiteNom, activiteAttente1, activiteAttente2 , activiteAttente3 , activiteAttente4, activiteAttente5 , activiteAttente6 , activiteAttente7, activiteAttente8 , activiteAttente9 , activiteAttente10 , activiteComment , activiteLevel) VALUES(:activiteNom, :activiteAttente1, :activiteAttente2 ,:activiteAttente3, :activiteAttente4, :activiteAttente5 ,:activiteAttente6, :activiteAttente7, :activiteAttente8 ,:activiteAttente9 ,:activiteAttente10 ,:activiteComment ,:activiteLevel)');
	$req->execute(array(
	'activiteNom' => $don['activiteNom'],
	'activiteAttente1' => $don['activiteAttente1'],
	'activiteAttente2' => $don['activiteAttente2'],
	'activiteAttente3' => $don['activiteAttente3'],
	'activiteAttente4' => $don['activiteAttente4'],
	'activiteAttente5' => $don['activiteAttente5'],
	'activiteAttente6' => $don['activiteAttente6'],
	'activiteAttente7' => $don['activiteAttente7'],
	'activiteAttente8' => $don['activiteAttente8'],
	'activiteAttente9' => $don['activiteAttente9'],
	'activiteAttente10' => $don['activiteAttente10'],
	'activiteComment' => $don['activiteComment'],
	'activiteLevel' =>$don['activiteLevel']
	));

}
header ('location: Activite2.php');