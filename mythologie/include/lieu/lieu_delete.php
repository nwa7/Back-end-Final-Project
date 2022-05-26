<?php


function del_lieu($pdo, $id_lieu) {

    
    // construction et préparation de la requête
    $sql = 'DELETE FROM lieu_mythe WHERE id_lieu = :valeur';
    $query = $pdo->prepare($sql);

    // on utilise $isbn pour fixer la valeur de la clé
    $query->bindValue(':valeur', $id_lieu, PDO::PARAM_STR);

    // exécution de la requête
    $query->execute();

    // contrôle des erreurs
    if ($query->errorCode() == '00000') {
        // si la requête a réussi

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

    // construction et préparation de la requête
    $sql2 = 'DELETE FROM lieu WHERE id_lieu = :valeur';
    $query = $pdo->prepare($sql2);

    // on utilise $isbn pour fixer la valeur de la clé
    $query->bindValue(':valeur', $id_lieu, PDO::PARAM_STR);

    // exécution de la requête
    $query->execute();

    // contrôle des erreurs
    if ($query->errorCode() == '00000') {
        // si la requête a réussi

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

?>