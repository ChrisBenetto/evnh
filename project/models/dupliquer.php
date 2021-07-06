<?php 

include "bsd.php";

$eleveID = $_GET['eleveID'];
$rep = $bdd->query("SELECT * FROM eleves WHERE eleveID = '$eleveID'");	
while ($don = $rep->fetch())
{
	$req = $bdd->prepare('INSERT INTO eleves(eleveNom, elevePrenom, eleveDatedeNaissance , eleveCycle) VALUES(:nom, :prenom, :datenaissance ,:eleveCycle)');
	$req->execute(array(
	'nom' => $don['eleveNom'],
	'prenom' => $don['elevePrenom'],
	'datenaissance' => $don['eleveDatedeNaissance'],
	'eleveCycle' => $don['eleveCycle'],
	));
	$req2 = $bdd->prepare('INSERT INTO progression(eleveNom, elevePrenom ,eleveCycle, niveauFrancais, niveauAnglais,niveauAllemand,niveauMathematiques,niveauScienceNature,niveauGeographie,niveauHistoire,niveauCitoyennete,niveauActivitescrea,niveauArtsVisu,niveauMusique,niveauEducPhysique,niveauEducNutri,niveauGeneral) VALUES(:nom , :prenom ,:cycle, :niveauFrancais, :niveauAnglais, :niveauAllemand, :niveauMathematiques, :niveauScienceNature, :niveauGeographie, :niveauHistoire, :niveauCitoyennete, :niveauActivitescrea, :niveauArtsVisu, :niveauMusique, :niveauEducPhysique, :niveauEducNutri, :niveauGeneral)');

$nom = $don['eleveNom'];
$prenom = $don['elevePrenom'];
$cycle = $don['eleveCycle'];  
$niveauFrancais = 0 ;
$niveauAnglais = 0 ;
$niveauAllemand = 0 ;
$niveauMathematiques = 0 ;
$niveauScienceNature = 0 ;
$niveauGeographie = 0 ;
$niveauHistoire = 0 ;
$niveauCitoyennete = 0 ;
$niveauActivitescrea = 0 ;
$niveauArtsVisu = 0 ;
$niveauMusique = 0 ;
$niveauEducPhysique = 0 ;
$niveauEducNutri = 0 ;
$niveauGeneral = 0 ;


$req2->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'cycle' => $cycle,
	'niveauFrancais' => $niveauFrancais,
	'niveauAnglais' => $niveauAnglais,
	'niveauAllemand' => $niveauAllemand,
	'niveauMathematiques' => $niveauMathematiques,
	'niveauScienceNature' => $niveauScienceNature,
	'niveauGeographie' => $niveauGeographie,
	'niveauHistoire' => $niveauHistoire,
	'niveauCitoyennete' => $niveauCitoyennete,
	'niveauActivitescrea' => $niveauActivitescrea,
	'niveauArtsVisu' => $niveauArtsVisu,
	'niveauMusique' => $niveauMusique,
	'niveauEducPhysique' =>$niveauEducPhysique,
	'niveauEducNutri' => $niveauEducNutri,
	'niveauGeneral' => $niveauGeneral,
	));


	header ('location: listing.php');

	};?>

	
