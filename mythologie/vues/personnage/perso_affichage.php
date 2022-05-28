<?php

function affiche_liste_persos($persos){
    echo '<h2>Liste des personnages</h2>';

    foreach ($persos as $perso){
        echo '<h3><a href="./index.php?action=page_detail_perso&id_perso='.$perso['id_perso'].
        '"> '.$perso['nom_perso'].'</a></h3>';

        //A limiter le nombre de caractère pour le perso
        echo '<p>'.$perso['fct_perso'].'</p>';

        $resume = resume($perso['desc_perso'],300);
        echo '<p>'.$resume.'</p>';
        
    }
    echo '<h2>Ajouter un personnage :</h2>';
    echo '<a href="./index.php?action=page_perso/add">Ajouter un personnage ?</a>';
}

function affiche_perso($perso, $parent1, $parent2, $mythes) {


    echo '<h1>'.$perso['nom_perso'].'</h1>';
    echo '<p>Sexe :'.$perso['sexe'].'</p>';
    echo '<p>'.$perso['fct_perso'].'</p>';

    if($perso['illu_perso']!=''){
        echo "<img src='images/upload/".$perso['illu_perso']."'alt='photo'></br></br>";
    }

    echo '<p>'.$perso['desc_perso'].'</p>';
    
    echo '<p><b>Ses parents : </b></p>';
    echo '<p><a href="./index.php?action=page_detail_perso&id_perso='.$parent1['id_perso'].
        '">'.$parent1['nom_perso'].'</a></p>';

    echo '<p><a href="./index.php?action=page_detail_perso&id_perso='.$parent2['id_perso'].
        '">'.$parent2['nom_perso'].'</a></p>';


    echo '<p>Sa race : <a href="./index.php?action=page_detail_race&id_race='.$perso['id_race'].
    '">'.$perso['nom_race'].'</a></p>';

    echo '<h2>En savoir plus :</h2>';

    echo '<h3>Mythe(s) associé(s) à ce personnage :</h3>
    <ul>';
    
        foreach ($mythes as $mythe){
            echo '<li><a href="./index.php?action=page_detail_mythe&id_mythe='.$mythe['id_mythe'].
            '">'.$mythe['titre'].'</a></li>';
        }
    echo '</ul>
    </table>';

    echo '<h2>Que voulez-vous faire avec ce personnage ?</h2>';
    
    // Bouton supprimer
    echo '<a href="./index.php?action=page_perso/delete&id_perso='.$perso['id_perso'].'">Supprimer ?</a>';
    
    // Bouton modifier
    echo '</br>
    <a href="./index.php?action=page_perso/update&id_perso='.$perso['id_perso'].'">Modifier ?</a>';
}


function select_form_persos($persos){
    //echo '<select name="id_perso" size=1 >';
    echo '<option value="NULL">Aucun perso sélectionné</option>';
    foreach ($persos as $perso){
        echo '<option value='.$perso['id_perso'].'>'.$perso['nom_perso'].'</option>';
    }
    echo '</select>';
}

function select_form_update_persos($persos, $pers){
    //echo '<select name="id_perso" size=1 >';
    echo '<option value="'.$pers['id_perso'].'">'.$pers['nom_perso'].'</option>
          <option value="NULL">Aucun perso sélectionné</option>';
    foreach ($persos as $perso){
        echo '<option value='.$perso['id_perso'].'>'.$perso['nom_perso'].'</option>';
    }
    echo '</select>';
}



