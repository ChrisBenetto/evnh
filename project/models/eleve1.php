<?php
include 'bsd.php';
?>
<?php include 'index.php';?>
<?php 

$nom = $_POST['nom'];
$prenom = $_POST['prenom'] ;
$dateNaissance = $_POST['date_de_naissance'];
$anneeJour = date('Y');
$date_explosee = explode("-", $dateNaissance);

$annee = $date_explosee[0];
$mois = $date_explosee[1];
$jour = $date_explosee[2];
$age = $anneeJour - $annee;

if ($age < 8) {
	$eleveCycle = 1;
}else{
	$eleveCycle = 2;
}


?>

<?php // Insertion dans la table eleves
$req = $bdd->prepare('INSERT INTO eleves(eleveNom, elevePrenom, eleveDatedeNaissance , eleveCycle) VALUES(:nom, :prenom, :datenaissance ,:eleveCycle)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'datenaissance' => $dateNaissance,
	'eleveCycle' => $eleveCycle,
	));

// Initiation de la progression de l'Eleve

$req2 = $bdd->prepare('INSERT INTO progression(eleveNom, elevePrenom ,eleveCycle, niveauFrancais, niveauAnglais,niveauAllemand,niveauMathematiques,niveauScienceNature,niveauGeographie,niveauHistoire,niveauCitoyennete,niveauActivitescrea,niveauArtsVisu,niveauMusique,niveauEducPhysique,niveauEducNutri, niveauMitic , niveauSante , niveauChoix , niveauProjetco ,  niveauEnvi , niveauIden  , niveauSocial ,  niveauIndi , niveauGeneral) VALUES(:nom , :prenom ,:cycle, :niveauFrancais, :niveauAnglais, :niveauAllemand, :niveauMathematiques, :niveauScienceNature, :niveauGeographie, :niveauHistoire, :niveauCitoyennete, :niveauActivitescrea, :niveauArtsVisu, :niveauMusique, :niveauEducPhysique, :niveauEducNutri, :niveauMitic , :niveauSante , :niveauChoix , :niveauProjetco ,  :niveauEnvi , :niveauIden  , :niveauSocial ,  :niveauIndi , :niveauGeneral)');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'] ;
$cycle = $eleveCycle ;  
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
$niveauMitic = 0 ;
$niveauSante = 0 ;
$niveauChoix = 0 ;
$niveauProjetco  = 0 ;
$niveauEnvi = 0 ;
$niveauIden = 0 ;
$niveauSocial = 0 ;
$niveauIndi = 0 ;


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
	'niveauMitic' => $niveauMitic,
	'niveauSante' => $niveauSante,
	'niveauChoix' => $niveauChoix,
	'niveauProjetco' => $niveauProjetco,
	'niveauEnvi' => $niveauEnvi,
	'niveauIden' => $niveauIden,
	'niveauSocial' => $niveauSocial,
	'niveauIndi' => $niveauIndi,
	));

        echo '<script>alert("L\'\élève a bien été créé !");
        document.location.href="listing.php";
        </script>';

include 'footer.php';
?>