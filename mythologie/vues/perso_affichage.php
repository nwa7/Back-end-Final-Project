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

function affiche_perso($perso, $parent1, $parent2) {
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
    echo '<p class="race">'.$perso['id_race'].'</p>';
    
    // Bouton supprimer
    echo '<a href="./index.php?action=page_detail_perso&id_perso='.$perso['id_perso'].'/delete">Supprimer ?</a>';
}
