<?php
require('fpdf.php');
require('bsd.php');
$vartest = "0";
$query = $bdd->query("SELECT COUNT(*)AS eleves FROM eleves");
$count = $query->fetch(PDO::FETCH_ASSOC);

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
    $this->Cell(0,20,'Bilan de l\'ecole',1,1,'C');
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
$pdf->SetFont('Times','',18);
$pdf->Cell(40,10,'Nombre d\'eleves : '.$count['eleves'],0,1,'L');
$pdf->Cell(40,10,'Nombre d\'eleves Cycle 1 : '.$count['eleves'],0,1,'L');
$pdf->Cell(40,10,'Nombre d\'eleves Cycle 2 : 0 ',0,1,'L');

$pdf->Cell(0,20,'Statistiques des attentes travaillees',1,1,'C');
$pdf->Cell(0,20,'Langues',0,1,'C');
$pdf->Cell(50,10,'Francais :',0,0,'L');
$pdf->Cell(50,10,'Anglais :',0,0,'L');
$pdf->Cell(50,10,'Allemand :',0,1,'L');
$pdf->Cell(50,10, $vartest.'%',0,0,'L');
$pdf->Cell(50,10, $vartest.'%',0,0,'L');
$pdf->Cell(50,10, $vartest.'%',0,1,'L');
$pdf->Cell(0,20,'Maths et Sciences de la nature',0,1,'C');
$pdf->Cell(80,10,'Mathematiques :',0,0,'C');
$pdf->Cell(80,10,'sciences de la nature:',0,1,'C');
$pdf->Cell(80,10, $vartest.'%',0,0,'C');
$pdf->Cell(80,10, $vartest.'%',0,1,'C');

$pdf->Cell(50,20,'Francais :',0,0,'L');
$pdf->Cell(50,20,'Anglais :',0,0,'L');
$pdf->Cell(50,20,'Allemand :',0,1,'L');
$pdf->Cell(50,20, $vartest.'%',0,0,'L');
$pdf->Cell(50,20, $vartest.'%',0,0,'L');
$pdf->Cell(50,20, $vartest.'%',0,1,'L');
$pdf->Output();
?>