<?php

    function del_lieu($pdo, $id_lieu) {
        $sql ="DELETE FROM `lieu` WHERE id_lieu = $id_lieu";
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