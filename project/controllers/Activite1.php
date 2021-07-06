<?php
include 'bsd.php';
include 'index.php';

$cycle = $_POST['cycle'];
$nom = $_POST['activiteNom'];
$activite1 = $_POST['domaine1'];

if(empty($_POST['domaine2']))
{
	$activite2="Aucune";
}
else
{
	$activite2 = $_POST['domaine2'];
}

if(empty($_POST['domaine3']))
{
	$activite3="Aucune";
}
else
{
	$activite3 = $_POST['domaine3'];
}
if(empty($_POST['domaine4']))
{
	$activite4="Aucune";
}
else
{
	$activite4 = $_POST['domaine4'];
}

if(empty($_POST['domaine5']))
{
	$activite5="Aucune";
}
else
{
	$activite5 = $_POST['domaine5'];
}
if(empty($_POST['domaine6']))
{
	$activite6="Aucune";
}
else
{
	$activite6 = $_POST['domaine6'];
}

if(empty($_POST['domaine7']))
{
	$activite7="Aucune";
}
else
{
	$activite7 = $_POST['domaine7'];
}
if(empty($_POST['domaine8']))
{
	$activite8="Aucune";
}
else
{
	$activite8 = $_POST['domaine8'];
}

if(empty($_POST['domaine9']))
{
	$activite9="Aucune";
}
else
{
	$activite9= $_POST['domaine9'];
}
if(empty($_POST['domaine10']))
{
	$activite10="Aucune";
}
else
{
	$activite10= $_POST['domaine10'];
}

$comments = $_POST['comments'];

 // Insertion dans la table eleves
$req = $bdd->prepare('INSERT INTO activite(activiteLevel , activiteNom, activiteAttente1, activiteAttente2,activiteAttente3, activiteAttente4, activiteAttente5,activiteAttente6, activiteAttente7, activiteAttente8,activiteAttente9,activiteAttente10,activiteComment ) VALUES(:niveau , :nom, :activite1, :activite2, :activite3 , :activite4, :activite5, :activite6 , :activite7, :activite8, :activite9 ,:activite10 ,:comments)');
$req->execute(array(
	'niveau' => $cycle,
	'nom' => $nom,
	'activite1' => $activite1,
	'activite2' => $activite2,
	'activite3' => $activite3,
	'activite4' => $activite4,
	'activite5' => $activite5,
	'activite6' => $activite6,
	'activite7' => $activite7,
	'activite8' => $activite8,
	'activite9' => $activite9,
	'activite10' => $activite10,
	'comments' => $comments,
	));
        echo '<script>alert("L\'\activité a bien été créée !");
        document.location.href="Activite2.php";
        </script>'; 

include 'footer.php';?>