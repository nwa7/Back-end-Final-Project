<?php

    function add_race($pdo, $nom_race, $desc_race, $illu_race) {
        $sql ="INSERT INTO `race` (id_race, nom_race, desc_race, illu_race) VALUES (DEFAULT, \"$nom_race\", \"$desc_race\", \"$illu_race\")";
        $query = $pdo->prepare($sql);
        
        
        
        $query->bindValue(':nom_race',$nom_race,PDO::PARAM_STR);
        $query->bindValue(':desc_race',$desc_race,PDO::PARAM_STR);
        $query->bindValue(':illu_race',$illu_race,PDO::PARAM_STR);
        $query->execute();

        if($query->errorCode() == '00000') {
            $ligne = $query->fetch(PDO::FETCH_ASSOC);
        }

        else {
            echo '<p>Erreur dans la requête</p>';
            echo '<p>'.$query->errorInfo()[2].'</p>';
            $tableau = null;
        }
        return $ligne;
    }