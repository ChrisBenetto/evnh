<?php
include 'bsd.php';
if (isset($_GET['attentes']))
{
    $attentes = $_GET['attentes'];
    $sql = "SELECT * FROM attentes_fondamentales WHERE attentesNom = ?";
    $req = $bdd->prepare($sql);
    $req->execute(array($attentes));
    $detail = '';
    while($donnees = $req->fetch()){
        $detail = $donnees["Section"] . " - " . $donnees["Cours"] . " - "  . $donnees["matieresID"] . " - " . $donnees["Thematiques"];
    }
$req->closeCursor();
echo $detail;
}
?>