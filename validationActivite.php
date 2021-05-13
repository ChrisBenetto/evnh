<?php
    if (!empty($_POST))
    {
        
         
        include 'bsd.php';
        include 'index.php';
        $date = $_POST['date'];
        $activiteComment = " ";
        $encadrant = $_SESSION['Prenom'];
        $activite = $_POST['activite'];
        $eleve = $_POST['elevesValidatActi'];
        $req = $bdd->prepare('INSERT INTO activitedone(activiteNom , datework , eleveNom) VALUES(:activiteNom , :datework , :eleveNom)');

        $req->execute(array(
                'activiteNom' => $activite,
                'datework'=> $date,
                'eleveNom' => $eleve

    ));


        
        $requete = "SELECT activiteAttente1,activiteAttente2,activiteAttente3,activiteAttente4,activiteAttente5,activiteAttente6,activiteAttente7,activiteAttente8,activiteAttente9,activiteAttente10 FROM activite WHERE activiteNom = :activite";
        $stmt = $bdd ->prepare($requete);
        $stmt->bindValue('activite',$_POST['activite']);
        $stmt->execute();
        $dataActiviteAttente = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        

        $stmt = $bdd->prepare('INSERT INTO attenteswork(eleveNom, attentesNom, essai, datework , comments , encadrant , activiteID) VALUES(:eleves, :attentes,:essai ,:datework ,:comments ,:encadrant ,:activiteID)');
         
        //Maintenant on boucle sur les résultats:
        foreach ($dataActiviteAttente AS $activiteAttente)
        {
            $essai = " ";
            $req = $bdd->prepare('SELECT MAX(essai) FROM attenteswork WHERE attentesNom = ? AND eleveNom = ?');
            $req->execute(array($activiteAttente, $eleve));
            $donnees = $req->fetch();
            $essai = $donnees['essai'];
            ++$essai;

            
            $req->closeCursor();

            $stmt->execute(array(
                'eleves' => $_POST['elevesValidatActi'],
                'attentes' => $activiteAttente,
                'essai' => $essai,
                'datework' => $date,
                'comments' =>  $activiteComment,
                'encadrant' => $encadrant,
                'activiteID' => $_POST['activite'],
                ));
            if ($stmt->rowCount() != 1) 
            {
                echo 'Erreur insertion : '.$_POST['elevesValidatActi'].' / '.$activiteAttente.' / '.$date;
            }
        }
        
        include 'footer.php';
        echo '<script>alert("L\'\activité a bien été validée !");
        document.location.href="validation2.php";
        </script>';

    } 

    else {
        echo 'Formulaire vide';
    }