<?php

function affiche_liste_persos($persos){

    foreach ($persos as $perso){
        echo '<h3 class="perso"><a href="./index.php?action=page_detail_perso&id_perso='.$perso['id_perso'].
        '"> '.$perso['nom_perso'].'</a></h3>';

        //A limiter le nombre de caractère pour le perso
        echo '<p>'.$perso['fct_perso'].'</p>';
        echo '<p>'.$perso['desc_perso'].'</p>';
    }

    echo '<a href="./index.php?action=page_perso/add">Ajouter un personnage ?</a>';
}

function affiche_perso($perso, $parent1, $parent2, $mythes) {
    echo '<h3 class="nom">'.$perso['nom_perso'].'</h3>';
    echo '<p class="sexe">'.$perso['sexe'].'</p>';
    echo '<p class="fct">'.$perso['fct_perso'].'</p>';
    print '<img src="images/upload/'.$perso['illu_perso'].'"alt="photo">';
    echo '<p class="desc">'.$perso['desc_perso'].'</p>';
    
    if ($perso['id_parent1']!=NULL) {
        echo '<p class="p1"><a href="./index.php?action=page_detail_perso&id_perso='.$parent1['id_perso'].
        '">'.$parent1['nom_perso'].'</a></p>';
    }
    if ($perso['id_parent2']!=NULL) {
        echo '<p class="p2"><a href="./index.php?action=page_detail_perso&id_perso='.$parent2['id_perso'].
        '">'.$parent2['nom_perso'].'</a></p>';
    }
    echo '<p class="race">'.$perso['nom_race'].'</p>';

    echo '<p>Mythe(s) associé(s) à ce personnage :</p>';
    foreach ($mythes as $mythe){
        echo '<a href="./index.php?action=page_detail_mythe&id_mythe='.$mythe['id_mythe'].
        '">'.$mythe['titre'].'</a>';
    }
    echo '</table>';
    
    // Bouton supprimer
    echo '<a href="./index.php?action=page_perso/delete&id_perso='.$perso['id_perso'].'">Supprimer ?</a>';
    
    // Bouton modifier
    echo '</br>
    <a href="./index.php?action=page_perso/update&id_perso='.$perso['id_perso'].'">Modifier ?</a>';
}


function select_form_persos($persos){
    //echo '<select name="id_perso" size=1 >';
    echo '<option value="NULL">Aucun</option>';
    foreach ($persos as $perso){
        echo '<option value='.$perso['id_perso'].'>'.$perso['nom_perso'].'</option>';
    }
    echo '</select>';
}

function select_form_update_persos($persos, $pers){
    //echo '<select name="id_perso" size=1 >';
    echo '<option value="'.$pers['id_perso'].'">'.$pers['nom_perso'].'</option>
          <option value="NULL">Aucun</option>';
    foreach ($persos as $perso){
        echo '<option value='.$perso['id_perso'].'>'.$perso['nom_perso'].'</option>';
    }
    echo '</select>';
}



