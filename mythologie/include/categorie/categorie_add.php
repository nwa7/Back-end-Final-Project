<?php

    function add_categorie($pdo, $nom_cat, $desc_cat, $illu_cat) {
        $sql ="INSERT INTO `categorie` (nom_cat, desc_cat, illu_cat) VALUES ( \"$nom_cat\", \"$desc_cat\", \"$illu_cat\")";
        
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
        // return $ligne;
    }