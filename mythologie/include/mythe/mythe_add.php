<?php

function insert_mythe($pdo, $titre, $illu_mythe, $desc_mythe, $epoque, $id_cat){

    // préparation de la requête INSERT
    $query = $pdo->prepare('insert into mythe (titre, illu_mythe, desc_mythe, epoque, id_cat)
    values (:titre,:illu_mythe, :desc_mythe, :epoque, :id_cat);');
    
    // liaison des paramètres avec leurs valeurs reçues
    $query->bindValue(':titre',$titre,PDO::PARAM_STR);
    $query->bindValue(':illu_mythe',$illu_mythe,PDO::PARAM_STR);
    $query->bindValue(':desc_mythe',$desc_mythe,PDO::PARAM_STR);
    $query->bindValue(':epoque',$epoque,PDO::PARAM_STR);
    $query->bindValue(':id_cat',$id_cat,PDO::PARAM_STR);
    
    // exécution de la requête
    $query->execute();
    
    // teste si tout c'est bien passé
    if($query->errorCode() == '00000') {
        // l'auteur est bien ajouté dans la base de données
        echo '<p>Le mythe a été ajouté</p>';
    
    // facultatif : récupérer le numéro automatique généré par la base de données
        $cle = $pdo->lastInsertId();
        //echo '<p>Clé du mythe ajouté : '.$cle.'</p>';
    }
    
    else {
        // si une erreur a eu lieu, la fonction erreur info retourne le message d'erreur
        echo '<p>Erreur : '.$query->errorInfo()[2].'</p>';
    }

}

function insert_lieu_mythe($pdo, $id_lieu, $id_mythe){

    // préparation de la requête INSERT
    $query = $pdo->prepare('insert into lieu_mythe (id_lieu, id_mythe)
    values (:id_lieu, :id_mythe);');
    
    // liaison des paramètres avec leurs valeurs reçues
    $query->bindValue(':id_lieu',$id_lieu,PDO::PARAM_STR);
    $query->bindValue(':id_mythe',$id_mythe,PDO::PARAM_STR);
    
    // exécution de la requête
    $query->execute();
    
    // teste si tout c'est bien passé
    if($query->errorCode() == '00000') {
    // l'auteur est bien ajouté dans la base de données
    echo '<h2>Insertion réussie d\'un nouveau lieu dans un mythe</h2>';
    
    // facultatif : récupérer le numéro automatique généré par la base de données
    $cle = $pdo->lastInsertId();
    echo '<p>Clé du mythe ajouté : '.$id_mythe.'</p>';
    echo '<p>Clé du lieu ajouté : '.$id_lieu.'</p>';
    }
    else {
    // si une erreur a eu lieu, la fonction erreur info retourne le message d'erreur
    echo '<p>Erreur : '.$query->errorInfo()[2].'</p>';
    }
}

function insert_perso_mythe($pdo, $id_perso, $id_mythe){

    // préparation de la requête INSERT
    $query = $pdo->prepare('insert into perso_mythe (id_perso, id_mythe)
    values (:id_perso, :id_mythe);');
    
    // liaison des paramètres avec leurs valeurs reçues
    $query->bindValue(':id_perso',$id_perso,PDO::PARAM_STR);
    $query->bindValue(':id_mythe',$id_mythe,PDO::PARAM_STR);
    
    // exécution de la requête
    $query->execute();
    
    // teste si tout c'est bien passé
    if($query->errorCode() == '00000') {
    // l'auteur est bien ajouté dans la base de données
    echo '<h2>Insertion réussie d\'un nouveau perso dans un mythe</h2>';
    
    // facultatif : récupérer le numéro automatique généré par la base de données
    $cle = $pdo->lastInsertId();
    echo '<p>Clé du mythe ajouté : '.$id_mythe.'</p>';
    echo '<p>Clé du personnage ajouté : '.$id_perso.'</p>';
    }
    else {
    // si une erreur a eu lieu, la fonction erreur info retourne le message d'erreur
    echo '<p>Erreur : '.$query->errorInfo()[2].'</p>';
    }
}

?>