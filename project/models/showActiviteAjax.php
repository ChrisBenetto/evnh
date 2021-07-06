<?php
include 'bsd.php';
if (isset($_GET['activite']))
{
	
    $sql = "SELECT * FROM activite WHERE activiteNom = ? ";
    $req2 = $bdd->prepare($sql);
    $req2->execute(array($_GET['activite']));
 
    $options2='';
    while($donnees = $req2->fetch())
    {
        echo "<div id='acti1' class='badge badge-pill'>".substr($donnees['activiteAttente1'],0,150)."</div><button type='button' id='btnAttente1' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti2' class='badge badge-pill'>".substr($donnees['activiteAttente2'],0,150)."</div><button type='button' id='btnAttente2' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti3' class='badge badge-pill'>".substr($donnees['activiteAttente3'],0,150)."</div><button type='button' id='btnAttente3' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti4' class='badge badge-pill'>".substr($donnees['activiteAttente4'],0,150)."</div><button type='button' id='btnAttente4' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti5' class='badge badge-pill'>".substr($donnees['activiteAttente5'],0,150)."</div><button type='button' id='btnAttente5' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti6' class='badge badge-pill'>".substr($donnees['activiteAttente6'],0,150)."</div><button type='button' id='btnAttente6' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti7' class='badge badge-pill'>".substr($donnees['activiteAttente7'],0,150)."</div><button type='button' id='btnAttente7' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti8' class='badge badge-pill'>".substr($donnees['activiteAttente8'],0,150)."</div><button type='button' id='btnAttente8' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti9' class='badge badge-pill'>".substr($donnees['activiteAttente9'],0,150)."</div><button type='button' id='btnAttente9' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
        echo "<div id='acti10 class='badge badge-pill'>".substr($donnees['activiteAttente10'],0,150)."</div><button type='button' id='btnAttente10' class='btnAttente btn-info btn-sm'>Valider</button><br/>";
    }
$req2->closeCursor();
echo $options2;
}