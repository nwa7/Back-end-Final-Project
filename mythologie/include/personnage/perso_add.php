<?php

    function add_perso($pdo,$nom_perso,$sexe,$fct_perso,$desc_perso,$illu_perso,$id_parent1,$id_parent2,$id_race) {
        $sql ="INSERT INTO personnage (id_perso,nom_perso,sexe,fct_perso,desc_perso,illu_perso,id_parent1,id_parent2,id_race) VALUES (DEFAULT,\"$nom_perso\",\"$sexe\",\"$fct_perso\",\"$desc_perso\",\"$illu_perso\",\"$id_parent1\",\"$id_parent2\",\"$id_race\")";
        
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