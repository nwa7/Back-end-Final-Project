<?php
function update_lieu($pdo, $id_lieu, $nom_lieu, $illu_lieu, $desc_lieu)
{
    // construction et préparation de la requête
    $sql = 'UPDATE lieu SET nom_lieu = :nom_lieu , illu_lieu = :illu_lieu, desc_lieu = :desc_lieu WHERE id_lieu = :id_lieu;';

    //echo '<p>Requête : ' . $sql . '</p>';
    
    $query = $pdo->prepare($sql);
    
    // assignation des valeurs à partir du tableau $auteur
    $query->bindValue(':id_lieu', $id_lieu, PDO::PARAM_INT);
    $query->bindValue(':nom_lieu', $nom_lieu, PDO::PARAM_STR);
    $query->bindValue(':illu_lieu', $illu_lieu, PDO::PARAM_STR);
    $query->bindValue(':desc_lieu', $desc_lieu, PDO::PARAM_STR);
    
    // exécution de la requête
    $query->execute(); 
}
?>