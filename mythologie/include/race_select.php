<?php


function select_liste_races($pdo) {
  // construction de la requête
  $sql = 'SELECT id_race, nom_race, desc_race FROM mythe ORDER BY nom_race';
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

    function select_race($pdo,$id_race) {
        $sql = 'SELECT id_race, nom_race, desc_race, illu_race FROM race WHERE id_race=:id_race';
        $query = $pdo->prepare($sql);
        $query->bindValue(':id_race',$id_race,PDO::PARAM_STR);
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
    }
  
    function select_persos_race($pdo,$id_race) {
        $sql = 'SELECT personnage.nom_perso FROM race JOIN perso ON personnage.id_race=race.id_race WHERE id_race=:id_race';
        $query = $pdo->prepare($sql);
        $query->bindValue(':id_race',$id_race,PDO::PARAM_STR);
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