<?php
include 'bsd.php';
if (isset($_GET['objectif'])) 
{
    $sql = 'SELECT DISTINCT attentesNom FROM attentes_fondamentales WHERE Objectifs = ?  ORDER BY attentesNom ASC';
    $req5 = $bdd->prepare($sql);
    $req5->execute(array($_GET['objectif']));
 
    $options5='';
    while($donnees = $req5->fetch())
    {
        $options5 .='<option value="'.htmlspecialchars($donnees["attentesNom"]).'">'.htmlspecialchars($donnees["attentesNom"]).'</option>';
    }
$req5->closeCursor();
echo $options5;
}

?>