<?php
include 'bsd.php';
$eleveID = $_GET["eleveID"] ;
$eleveNom = $_GET["eleveNom"];
$bdd->exec("DELETE FROM eleves WHERE eleveID = '$eleveID'");
$bdd->exec("DELETE FROM progression WHERE eleveNom = '$eleveNom'");
$bdd->exec("DELETE FROM attenteswork WHERE eleveNom = '$eleveNom'");
$bdd->exec("DELETE FROM attentessucess WHERE eleveNom = '$eleveNom'");
        echo '<script>alert("L\'\élève a bien été supprimé !");
        document.location.href="listing.php";
        </script>';
?>
