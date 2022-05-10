<?php

function select_liste_categories($pdo) {
  // construction de la requête
  $sql = 'select id_cat, nom_cat, desc_cat, illu_cat from categorie order by nom_cat;';
//   echo '<p>Requête à exécuter : '.$sql.'</p>';
  // exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();
  if($query->errorCode() == '00000') {
    // echo '<p>Requête bien exécutée</p>';
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

function select_categorie($pdo, $id_cat) {
    $sql = 'SELECT * FROM categorie WHERE id_cat=:id_cat;';
    $query = $pdo->prepare($sql);

    // liaison des valeurs de paramètres
    $query->bindValue(':id_cat', $id_cat, PDO::PARAM_STR);
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


?>