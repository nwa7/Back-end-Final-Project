<?php

    function add_lieu($pdo, $nom_lieu, $desc_lieu, $illu_lieu) {
        $sql ="INSERT INTO `lieu` (id_lieu, nom_lieu, desc_lieu, illu_lieu) VALUES (DEFAULT, \"$nom_lieu\", \"$desc_lieu\", \"$illu_lieu\")";
        
        $query = $pdo->prepare($sql);
        $query->execute();

        if($query->errorCode() == '00000') {
            $ligne = $query->fetch(PDO::FETCH_ASSOC);
        }

        else {
            echo '<p>Erreur dans la requête</p>';
            echo '<p>'.$query->errorInfo()[2].'</p>';
            $tableau = null;
        }

        // récupération de la première ligne (unique)  
        return $ligne;
    }