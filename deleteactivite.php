<?php
include 'bsd.php';
$activiteID = $_GET['activiteID'];
$bdd->exec("DELETE FROM activite WHERE activiteID = '$activiteID'");
        echo '<script>alert("L\'\activité a bien été supprimée !");
        document.location.href="Activite2.php";
        </script>';
?>
?>
