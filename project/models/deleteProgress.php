<?php
include 'bsd.php';
$attentesNom = $_GET['attentesNom'];
$eleveNom = $_GET['eleveNom'];
$bdd->exec("DELETE FROM attenteswork WHERE eleveNom = '$eleveNom' AND attentesNom = '$attentesNom'");
        echo '<script>alert("L\'\attente travaillée a bien été supprimée !");
        document.location.href="listing.php";
        </script>';
?>