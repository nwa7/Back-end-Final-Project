<?php

function delete_mythe($pdo, $id_mythe) {
        // construction et préparation de la requête
    $sql = 'DELETE FROM mythe WHERE id_mythe = :valeur';
    $query = $pdo->prepare($sql);
    
    // on utilise $isbn pour fixer la valeur de la clé
    $query->bindValue(':valeur', $id_mythe, PDO::PARAM_STR);
    
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

function delete_lieu_mythe($pdo, $id_lieu, $id_mythe) {
    // construction et préparation de la requête
    $sql = 'DELETE FROM lieu_mythe WHERE id_lieu = :id_lieu AND id_mythe = :id_mythe';


    $query = $pdo->prepare($sql);

    // on utilise $isbn pour fixer la valeur de la clé
    $query->bindValue(':id_lieu', $id_lieu, PDO::PARAM_STR);
    $query->bindValue(':id_mythe', $id_mythe, PDO::PARAM_STR);

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

function delete_perso_mythe($pdo, $id_perso, $id_mythe) {
    // construction et préparation de la requête
    $sql = 'DELETE FROM perso_mythe WHERE id_perso = :id_perso AND id_mythe = :id_mythe';


    $query = $pdo->prepare($sql);

    // on utilise $isbn pour fixer la valeur de la clé
    $query->bindValue(':id_perso', $id_perso, PDO::PARAM_STR);
    $query->bindValue(':id_mythe', $id_mythe, PDO::PARAM_STR);

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