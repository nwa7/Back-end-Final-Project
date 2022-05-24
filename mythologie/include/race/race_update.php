<?php

function update_race($pdo,$id_race, $nom_race, $desc_race, $illu_race)
{
    // construction et préparation de la requête
    $sql = 'UPDATE race SET nom_race = :nom_race ,desc_race = :desc_race, illu_race = :illu_race;';


    $query = $pdo->prepare($sql);
    
    // assignation des valeurs à partir du tableau $auteur
    $query->bindValue(':id_race', $id_race, PDO::PARAM_INT);
    $query->bindValue(':nom_race', $nom_race, PDO::PARAM_STR);
    $query->bindValue(':desc_race', $desc_race, PDO::PARAM_STR);
    $query->bindValue(':illu_race', $illu_race, PDO::PARAM_STR);
    
    // exécution de la requête
    $query->execute();
    
}
?>