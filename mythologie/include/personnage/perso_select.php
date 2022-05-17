<?php

function select_liste_persos($pdo) {
  // construction de la requête
  $sql = 'SELECT id_perso, nom_perso, fct_perso, desc_perso FROM personnage ORDER BY nom_perso;';

  // exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  /* Vérif */
  if($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  }
  else {
    echo '<p>Erreur dans la requête</p>';
    echo '<p>'.$query->errorInfo()[2].'</p>';

    // on retourne un tableau vide en cas d'erreur
    $tableau = null;
  }

  // retourne les résultats
  return $tableau;
}

function select_perso($pdo,$id_perso) {
    $sql = 'SELECT id_perso, nom_perso, fct_perso, sexe, desc_perso, illu_perso, id_parent1, id_parent2, personnage.id_race FROM personnage JOIN race ON personnage.id_race=race.id_race WHERE id_perso=:id_perso;';
    $query = $pdo->prepare($sql);

    // liaison des valeurs de paramètres
    $query->bindValue(':id_perso',$id_perso,PDO::PARAM_STR);
    $query->execute();


    /* Vérif */
    if($query->errorCode() == '00000') {
        $ligne = $query->fetch(PDO::FETCH_ASSOC);
    }
    else {
      echo '<p>Erreur dans la requête</p>';
      echo '<p>'.$query->errorInfo()[2].'</p>';
      $tableau = null;
    }

    // récupération de la première ligne (unique)  
    return $ligne;
}
