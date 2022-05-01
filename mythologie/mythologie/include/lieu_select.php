<?php

function select_liste_lieux($pdo) {
  // construction de la requête
  $sql = 'SELECT id_lieu, nom_lieu, desc_lieu FROM lieu ORDER BY nom_lieu;';

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

function select_lieu($pdo, $id_lieu) {
    $sql = 'SELECT * FROM lieu WHERE id_lieu=:id_lieu;';
    $query = $pdo->prepare($sql);

    // liaison des valeurs de paramètres
    $query->bindValue(':id_lieu', $id_lieu, PDO::PARAM_STR);
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
