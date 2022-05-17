<?php

    function del_categorie($pdo, $id_cat) {
        $sql ="DELETE FROM `categorie` WHERE id_cat = $id_cat";
        $query = $pdo->prepare($sql);

        // Efface perso
        $query->execute();

        /* Vérif */
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