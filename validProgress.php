<?php 
include 'index.php';
include 'bsd.php';
$matieres = '';
$eleveNom = $_GET['eleveNom'];
$elevePrenom = $_GET['elevePrenom'];
$eleveCycle = $_GET['eleveCycle'];
$attentesNom = $_GET['attentesNom'];
$datejour = date("Y-m-d");
$query = $bdd->query("SELECT matieresID FROM attentes_fondamentales WHERE attentesNom = '$attentesNom'");
$matieres = $query->fetch();
$matieres = $matieres['matieresID'];

switch ($matieres) {
	case 'Français':
		$bdd->exec("UPDATE progression
SET niveauFrancais = niveauFrancais+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Allemand':
		$bdd->exec("UPDATE progression
SET niveauAllemand = niveauAllemand+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");		# code...
		break;

	case 'Anglais':
		$bdd->exec("UPDATE progression
SET niveauAnglais = niveauAnglais+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");		# code...
		break;

	case 'Mathématiques':
		$bdd->exec("UPDATE progression
SET niveauMathematiques = niveauMathematiques+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Sciences de la nature':
		$bdd->exec("UPDATE progression
SET niveauScienceNature = niveauScienceNature+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Géographie':
		$bdd->exec("UPDATE progression
SET niveauGeographie = niveauGeographie+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Histoire':
		$bdd->exec("UPDATE progression
SET niveauHistoire= niveauHistoire+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Citoyennete':
		$bdd->exec("UPDATE progression
SET niveauCitoyennete = niveauCitoyennete+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Activités créatrices et manuelles':
		$bdd->exec("UPDATE progression
SET niveauActivitescrea = niveauActivitescrea+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Arts Visuels':
		$bdd->exec("UPDATE progression
SET niveauArtsVisu = niveauArtsVisu+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Musique':
		$bdd->exec("UPDATE progression
SET niveauMusique = niveauMusique+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Education physique':
		$bdd->exec("UPDATE progression
SET niveauEducPhysique = niveauEducPhysique+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;

	case 'Education nutritionnelle':
		$bdd->exec("UPDATE progression
SET niveauEducNutri = niveauEducNutri+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break; 





		case 'MITIC':
		$bdd->exec("UPDATE progression
SET niveauMitic= niveauMitic+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Santé et bien-être':
		$bdd->exec("UPDATE progression
SET niveauSante = niveauSante+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Choix et projets personnels':
		$bdd->exec("UPDATE progression
SET niveauChoix = niveauChoix +'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Projets collectifs et Vie de la classe et de l’école':
		$bdd->exec("UPDATE progression
SET niveauProjetco = niveauEProjetco+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Environnement et Complexité et interdépendance':
		$bdd->exec("UPDATE progression
SET niveauEnvi = niveauEnvi+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Identité':
		$bdd->exec("UPDATE progression
SET niveauIden = niveauIden+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Sociales':
		$bdd->exec("UPDATE progression
SET niveauSocial = niveauSocial+'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
			case 'Individuelles':
		$bdd->exec("UPDATE progression
SET niveauIndiv = niveauIndiv +'1'
WHERE eleveNom = '$eleveNom'");
		$bdd->exec("UPDATE progression
SET niveauGeneral = niveauGeneral+'1'
WHERE eleveNom = '$eleveNom'");
		break;
}

$req = $bdd->prepare('INSERT INTO attentessucess(attentesNom , dateSucess , eleveNom , attentesID ) VALUES ( :attentesNom , :datejour , :eleveNom , :matieres )');
$req->execute(array(
	'attentesNom' => $attentesNom,
	'datejour' => $datejour,
	'eleveNom'=> $eleveNom,
	'matieres' => $matieres

	));

$bdd->exec("DELETE FROM attenteswork WHERE attentesNom = '$attentesNom' AND eleveNom = '$eleveNom'");

   echo '<script>alert("L\'\attente a bien été validée , félicitations ! ");
        document.location.href="Progress.php?elevePrenom='.$elevePrenom."&"."eleveNom=".$eleveNom."&"."eleveCycle=".$eleveCycle.'";
        </script>';


?>