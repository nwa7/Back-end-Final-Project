<?php

function modifier_mythe($pdo,$id_mythe, $titre, $illu_mythe, $desc_mythe, $epoque, $id_cat)
{
    // construction et préparation de la requête
    $sql = 'update mythe set titre = :titre , illu_mythe = :illu_mythe, desc_mythe = :desc_mythe, epoque = :epoque, id_cat = :id_cat WHERE id_mythe = :id_mythe;';

    //echo '<p>Requête : ' . $sql . '</p>';
    
    $query = $pdo->prepare($sql);
    
    // assignation des valeurs à partir du tableau $auteur
    $query->bindValue(':id_mythe', $id_mythe, PDO::PARAM_INT);
    $query->bindValue(':titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':illu_mythe', $illu_mythe, PDO::PARAM_STR);
    $query->bindValue(':desc_mythe', $desc_mythe, PDO::PARAM_STR);
    $query->bindValue(':epoque', $epoque, PDO::PARAM_STR);
    $query->bindValue(':id_cat', $id_cat, PDO::PARAM_INT);
    
    // exécution de la requête
    $query->execute();
    
}
?>