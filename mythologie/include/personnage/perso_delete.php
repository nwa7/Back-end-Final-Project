<?php

    function delete_perso($pdo, $id_perso) {
        $sql ="DELETE FROM personnage WHERE id_perso=:valeur";
        $query = $pdo->prepare($sql);

        // Efface perso
        $query->bindValue(':valeur', $id_perso, PDO::PARAM_STR);
        $query->execute();

        /* Vérif */
        if($query->errorCode() == '00000') {
            // recherche le nombre de lignes supprimées
            $nb_lignes = $query->rowCount();
            if ($nb_lignes > 0) 
                echo '<p>'.$nb_lignes . ' ligne(s) supprimée(s)</p>';
            else
                echo '<p>Clé inexistante : aucune ligne supprimée</p>';
        }

        else {
            echo '<p>Erreur : '.$query->errorInfo()[2].'</p>';
        }
    }