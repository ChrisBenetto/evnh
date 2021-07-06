<?php
require('fpdf.php');
require('bsd.php');
$nom = $_GET['eleveNom'];
$prenom = $_GET['elevePrenom'];
$eleveCycle = $_GET['eleveCycle'];
$date = date("Y-m-d");

$query = $bdd->query("SELECT COUNT(*)AS TotalLangues FROM attentes_fondamentales WHERE Cours = 'Langues' AND Cycle = '$eleveCycle'");
$count = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalMaths FROM attentes_fondamentales WHERE Cours = 'Mathématiques et Sciences de la nature' AND Cycle = '$eleveCycle'");
$countMath = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalSciences FROM attentes_fondamentales WHERE Cours = 'Sciences humaines et sociales' AND Cycle = '$eleveCycle'");
$countScience = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalArts FROM attentes_fondamentales WHERE Cours = 'Arts' AND Cycle = '$eleveCycle'");
$countArts = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalCM FROM attentes_fondamentales WHERE Cours = 'Corps et mouvement' AND Cycle = '$eleveCycle'");
$countCM = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalMitic FROM attentes_fondamentales WHERE Cours = 'MITIC' AND Cycle = '$eleveCycle'");
$countMitic = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalSante FROM attentes_fondamentales WHERE Cours = 'Santé et bien-être' AND Cycle = '$eleveCycle'");
$countSante = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalChoix FROM attentes_fondamentales WHERE Cours = 'Choix et projets personnels' AND Cycle = '$eleveCycle'");
$countChoix = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalProjetCo FROM attentes_fondamentales WHERE Cours = 'Projets collectifs et Vie de la classe et de l’école' OR Cours = 'Vie de la classe et de l’école' OR Cours = 'Projets collectifs' AND Cycle = '$eleveCycle'");
$countProjetCo = $query->fetch(PDO::FETCH_ASSOC);

$query = $bdd->query("SELECT COUNT(*)AS TotalEnvi FROM attentes_fondamentales WHERE Cours = 'Environnement et Complexité et interdépendance' AND Cycle = '$eleveCycle'");
$countEnvi = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalID FROM attentes_fondamentales WHERE Cours = 'Identité' AND Cycle = '$eleveCycle'");
$countID = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalSocial FROM attentes_fondamentales WHERE Cours = 'Sociales' AND Cycle = '$eleveCycle'");
$countSocial = $query->fetch(PDO::FETCH_ASSOC);
$query = $bdd->query("SELECT COUNT(*)AS TotalIndiv FROM attentes_fondamentales WHERE Cours = 'Individuelles' AND Cycle = '$eleveCycle'");
$countIndiv = $query->fetch(PDO::FETCH_ASSOC);

$reponse2 = $bdd->query("SELECT * FROM progression WHERE eleveNom= '$nom' AND elevePrenom='$prenom'");
while ($donnees = $reponse2->fetch()){

$niveauLangues = array($donnees['niveauFrancais'],$donnees['niveauAnglais'],$donnees['niveauAllemand']);
$resultLangues = array_sum($niveauLangues);
$niveauMaths = array($donnees['niveauMathematiques'],$donnees['niveauScienceNature']);
$resultMaths= array_sum($niveauMaths);
$niveauScience = array($donnees['niveauHistoire'],$donnees['niveauGeographie'],$donnees['niveauCitoyennete']);
$resultScience = array_sum($niveauScience);
$niveauArts = array($donnees['niveauActivitescrea'],$donnees['niveauArtsVisu'],$donnees['niveauMusique']);
$resultArts = array_sum($niveauArts);
$niveauCM = array($donnees['niveauEducPhysique'],$donnees['niveauEducNutri']);
$resultCM= array_sum($niveauCM);


class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('img/logoevvnh.jpg',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);
    // Titre
    $this->Cell(0,20,utf8_decode ('Bilan de l\'élève'),1,1,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',18);
$pdf->Cell(0,10, utf8_decode ("Elève  : "). $nom . ' ' . $prenom . " " . " Cycle : " . $eleveCycle , 0,1 , "L");
$pdf->Cell(40,30, "Date du bilan : ". $date , 0,1 , "L");
$pdf->Cell(0,10,utf8_decode ('Progression de l\'élève'),0,1,"C");
$pdf->Cell(0,10,utf8_decode ('Nombre d\'attentes validées conformes au PER'),0,1,"C");
//Domaines Disciplinaires
$pdf->Cell(0,30,'DOMAINES DISCIPLINAIRES',0,1,"C");

$pdf->Cell(30,10,"Langues : ". $resultLangues . ' / '. $count['TotalLangues'],0,1,"L");
$pdf->Cell(60,10,'Maths et sciences : '. $resultMaths . ' / ' . $countMath['TotalMaths'],0,1,"L");
$pdf->Cell(50,10,'Sciences humaines et sociales : '. $resultScience . ' / ' . $countScience['TotalSciences'],0,1,"L");
$pdf->Cell(30,10,'Arts : '. $resultArts . ' / ' . $countArts['TotalArts'],0,1,"L");
$pdf->Cell(30,10,'Education physique et nutritionelle : '. $resultCM . ' / ' . $countCM['TotalCM'],0,1,"L");
//Formation générale
$pdf->Cell(0,30,'FORMATION GENERALE',0,1,"C");
$pdf->Cell(30,10,'MITIC : ' . $donnees['niveauMitic'] . ' / '. $countMitic['TotalMitic'],0,1,"L");
$pdf->Cell(60,10,utf8_decode ('Santé et bien-être : '). $donnees['niveauSante'] . ' / '. $countSante['TotalSante'],0,1,"L");
$pdf->Cell(50,10,'Choix et projets personnels : '. $donnees['niveauChoix'] . ' / '. $countChoix['TotalChoix'],0,1,"L");
$pdf->Cell(30,10,utf8_decode ('Projets collectifs et vie de la classe et de l\'école : '). $donnees['niveauProjetco'] . ' / '. $countProjetCo['TotalProjetCo'],0,1,"L");
$pdf->Cell(30,10,utf8_decode ('Environnement et Complexite et interdépendance : '). $donnees['niveauEnvi'] . ' / '. $countEnvi['TotalEnvi'],0,1,"L");
$pdf->Cell(50,10,utf8_decode ('Identité : '). $donnees['niveauIden'] . ' / '. $countID['TotalID'],0,1,"L");
$pdf->Cell(0,30,'CAPACITES TRANSVERSALES',0,1,"C");
$pdf->Cell(30,10,'Sociales : '. $donnees['niveauSocial'] . ' / '. $countSocial['TotalSocial'],0,1,"L");
$pdf->Cell(60,10,'Individuelles : '. $donnees['niveauIndi'] . ' / '. $countIndiv['TotalIndiv'],0,1,"L");
$pdf->Cell(0,10, utf8_decode ('Observations de l\'équipe encadrante'),0,1,"C");
$pdf->Cell(0,100,' ',1,1,'C');
$pdf->Cell(0,40,'Signature',0,1,"R");
$pdf->Output();
}
$reponse2->closeCursor();
?>