<?php

    function add_race($pdo, $nom_race, $desc_race, $illu_race) {
        $sql ="INSERT INTO `race` (nom_race, desc_race, illu_race) VALUES (\"$nom_race\", \"$desc_race\", \"$illu_race\")";

        $query = $pdo->prepare($sql);
    

        $query->execute();

        if($query->errorCode() == '00000') {
            //$ligne = $query->fetch(PDO::FETCH_ASSOC);
            echo '<p> La nouvelle race a bien été ajoutée ! </p>';
        }

        else {
            echo '<p>Erreur dans la requête</p>';
            echo '<p>'.$query->errorInfo()[2].'</p>';
            //$tableau = null;
        }
        //return $ligne;
    }