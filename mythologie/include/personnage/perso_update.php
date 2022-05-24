<?php
function update_perso($pdo,$id_perso, $nom_perso, $sexe, $fct_perso, $illu_perso, $desc_perso, $id_parent1, $id_parent2, $id_race)
{
    // construction et préparation de la requête
    $sql = 'UPDATE personnage SET nom_perso = :nom_perso , sexe = :sexe, fct_perso = :fct_perso, illu_perso = :illu_perso, desc_perso = :desc_perso, id_parent1 = :id_parent1, id_parent2 = :id_parent2, id_race = :id_race WHERE id_perso = :id_perso;';

    //echo '<p>Requête : ' . $sql . '</p>';
    
    $query = $pdo->prepare($sql);
    
    // assignation des valeurs à partir du tableau $auteur
    $query->bindValue(':id_perso', $id_perso, PDO::PARAM_INT);
    $query->bindValue(':nom_perso', $nom_perso, PDO::PARAM_STR);
    $query->bindValue(':sexe', $sexe, PDO::PARAM_STR);
    $query->bindValue(':fct_perso', $fct_perso, PDO::PARAM_STR);
    $query->bindValue(':illu_perso', $illu_perso, PDO::PARAM_STR);
    $query->bindValue(':desc_perso', $desc_perso, PDO::PARAM_STR);
    $query->bindValue(':id_parent1', $id_parent1, PDO::PARAM_STR);
    $query->bindValue(':id_parent2', $id_parent2, PDO::PARAM_STR);
    $query->bindValue(':id_race', $id_race, PDO::PARAM_INT);
    
    // exécution de la requête
    $query->execute(); 
}
?>