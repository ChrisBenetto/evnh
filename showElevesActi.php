<?php
include 'bsd.php';
if (isset($_GET['eleves']))
{
	//Recherche du Cycle par rapport au nom de l'élève
    $sql1 = 'SELECT * FROM eleves WHERE eleveNom = ?';
    $req1 = $bdd->prepare($sql1);
    $req1->execute([$_GET['eleves']]);
    $cycle = $req1->fetchColumn(4);
    //Requete préparée pour trouver une activité du niveau de l'eleve
    $sql2 = 'SELECT * FROM activite WHERE activiteLevel = ?';
    $req2 = $bdd->prepare($sql2);
    $req2->execute(array($cycle));
    $result='';
    //Boucle pour menu Select
    while($data = $req2->fetch())
    {
        $result .='<option value="'.htmlspecialchars($data["activiteNom"]).'">'.htmlspecialchars($data["activiteNom"]).'</option>';
    }
    $req2->closeCursor();
    echo $result;
}
?>