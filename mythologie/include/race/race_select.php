<?php

  function select_liste_races($pdo) {
    // construction de la requête
    $sql = 'SELECT id_race, nom_race, desc_race FROM race ORDER BY nom_race';

    // exécution de la requête
    $query = $pdo->prepare($sql);
    $query->execute();

    if($query->errorCode() == '00000') {
      // récupération des données dans un tableau
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $tableau;
  }
  
    function select_persos_race($pdo,$id_race) {
        $sql = 'SELECT personnage.nom_perso, personnage.id_perso FROM race JOIN personnage ON personnage.id_race=race.id_race WHERE personnage.id_race=:id_race';
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
  

  function select_form_races($races){
    echo '<select name="id_race" size=1 >';
    echo '<option value="NULL">Aucun</option>';
    foreach ($races as $race){
        echo '<option value='.$race['id_race'].'>'.$race['nom_race'].'</option>';
    }
    echo '</select>';
  }
  
?>