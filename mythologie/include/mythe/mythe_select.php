<?php


function select_liste_mythes($pdo) {
  // construction de la requête
  $sql = 'select id_mythe, titre, desc_mythe from mythe order by titre;';
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

function select_mythe($pdo,$id_mythe) {
    $sql = 'select mythe.id_cat, id_mythe, titre, desc_mythe, illu_mythe, epoque, nom_cat from mythe join categorie on mythe.id_cat=categorie.id_cat where id_mythe=:id_mythe;';
    $query = $pdo->prepare($sql);
    // liaison des valeurs de paramètres
    $query->bindValue(':id_mythe',$id_mythe,PDO::PARAM_STR);
    $query->execute();
    if($query->errorCode() == '00000') {
        $ligne = $query->fetch(PDO::FETCH_ASSOC);
      }
      else {
        echo '<p>Erreur dans la requête</p>';
        echo '<p>'.$query->errorInfo()[2].'</p>';
        $tableau = null;
      }
      return $ligne;
    // récupération de la première ligne (unique)   
  }

  function select_lieux_mythe($pdo,$id_mythe) {
    $sql = 'select lieu.id_lieu, nom_lieu from lieu join lieu_mythe on lieu.id_lieu=lieu_mythe.id_lieu where id_mythe=:id_mythe';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id_mythe',$id_mythe,PDO::PARAM_STR);
    $query->execute();
    if($query->errorCode() == '00000') {
        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
      }
    else {
    echo '<p>Erreur dans la requête</p>';
    echo '<p>'.$query->errorInfo()[2].'</p>';
    $tableau = null;
    }
    return $tableau;
}

function select_persos_mythe($pdo,$id_mythe) {
  $sql = 'select personnage.id_perso, nom_perso from personnage join perso_mythe on personnage.id_perso=perso_mythe.id_perso where id_mythe=:id_mythe';
  $query = $pdo->prepare($sql);
  $query->bindValue(':id_mythe',$id_mythe,PDO::PARAM_STR);
  $query->execute();
  if($query->errorCode() == '00000') {
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    }
  else {
  echo '<p>Erreur dans la requête</p>';
  echo '<p>'.$query->errorInfo()[2].'</p>';
  $tableau = null;
  }
  return $tableau;
}

  

?>