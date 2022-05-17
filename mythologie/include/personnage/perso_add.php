<?php

    function add_perso($pdo,$nom_perso,$sexe,$fct_perso,$desc_perso,$illu_perso,$id_parent1,$id_parent2,$id_race) {
        $sql ="INSERT INTO personnage (id_perso,nom_perso,sexe,fct_perso,desc_perso,illu_perso,id_parent1,id_parent2,id_race) VALUES (DEFAULT,\"$nom_perso\",\"$sexe\",\"$fct_perso\",\"$desc_perso\",\"$illu_perso\",\"$id_parent1\",\"$id_parent2\",\"$id_race\")";
        $query = $pdo->prepare($sql);

        // liaison des paramètres avec leurs valeurs reçues
        $query->bindValue(':nom_perso',$nom_perso,PDO::PARAM_STR);
        $query->bindValue(':sexe',$sexe,PDO::PARAM_STR);
        $query->bindValue(':fct_perso',$fct_perso,PDO::PARAM_STR);
        $query->bindValue(':desc_perso',$desc_perso,PDO::PARAM_STR);
        $query->bindValue(':illu_perso',$illu_perso,PDO::PARAM_STR);
        $query->bindValue(':id_parent1',$id_parent1,PDO::PARAM_STR);
        $query->bindValue(':id_parent2',$id_parent2,PDO::PARAM_STR);
        $query->bindValue(':id_race',$id_race,PDO::PARAM_STR);

        // Exécution
        $query->execute();

        if($query->errorCode() == '00000') {
            echo '<p>Ajout réussi</p>';
        }

        else {
            echo '<p>Erreur dans la requête</p>';
            echo '<p>'.$query->errorInfo()[2].'</p>';
        }
    }