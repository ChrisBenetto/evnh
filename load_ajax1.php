<?php
include 'bsd.php';
if (isset($_GET['cours']))
{
    $sql = 'SELECT DISTINCT matieresID FROM attentes_fondamentales WHERE Cours = ?  ORDER BY matieresID ASC';
    $req1 = $bdd->prepare($sql);
    $req1->execute(array($_GET['cours']));
 
    $options1='';
    while($donnees = $req1->fetch())
    {
        $options1 .='<option value="'.htmlspecialchars($donnees["matieresID"]).'">'.htmlspecialchars($donnees["matieresID"]).'</option>';
    }
$req1->closeCursor();
echo $options1;
}

?>