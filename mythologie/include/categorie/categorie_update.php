<?php
function update_categorie($pdo, $id_cat, $nom_cat, $illu_cat, $desc_cat)
{
    // construction et préparation de la requête
    $sql = 'UPDATE categorie SET nom_cat = :nom_cat , illu_cat = :illu_cat, desc_cat = :desc_cat WHERE id_cat = :id_cat;';

    //echo '<p>Requête : ' . $sql . '</p>';
    
    $query = $pdo->prepare($sql);
    
    // assignation des valeurs à partir du tableau $auteur
    $query->bindValue(':id_cat', $id_cat, PDO::PARAM_INT);
    $query->bindValue(':nom_cat', $nom_cat, PDO::PARAM_STR);
    $query->bindValue(':illu_cat', $illu_cat, PDO::PARAM_STR);
    $query->bindValue(':desc_cat', $desc_cat, PDO::PARAM_STR);
    
    // exécution de la requête
    $query->execute(); 
}
?>