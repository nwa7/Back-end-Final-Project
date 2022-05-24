<?php

    function delete_race($pdo, $id_race) {
        $sql ="DELETE FROM race WHERE id_race=:valeur";
        $query = $pdo->prepare($sql);

        // Efface
        $query->bindValue(':valeur', $id_race, PDO::PARAM_STR);
        $query->execute();

        /* Vérif */
        if($query->errorCode() == '00000') {
            // recherche le nombre de lignes supprimées
            $nb_lignes = $query->rowCount();
            if ($nb_lignes > 0) {
            //    echo '<p>'.$nb_lignes . ' ligne(s) supprimée(s)</p>';
            }
            else {
                echo '<p>Clé inexistante : aucune ligne supprimée</p>';
            }
        }
        else {
            echo '<p>Erreur : '.$query->errorInfo()[2].'</p>';
        }
    }