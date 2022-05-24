<?php

function affiche_liste_races($races){

    foreach ($races as $race){
        echo '<h3 class="race"><a href="./index.php?action=page_detail_race&id_race='.$race['id_race'].
        '"> '.$race['nom_race'].'</a></h3>';
        echo '<p>'.$race['desc_race'].'</p>';
    }
    echo '<a href="./index.php?action=page_race/add">Ajouter une race ?</a>';
}

function affiche_race($race, $persos){
    echo '<h3 class="nom_race">'.$race['nom_race'].'</h3>';
    print '<img src="images/upload/'.$race['illu_race'].'"alt="illustration">';
    echo '<p class="description">'.$race['desc_race'].'</p>';
    
    echo 'En savoir plus sur :';

    echo '<p>Personnages de cette race : </p>';
    echo'<ul>';
    foreach ($persos as $perso){

        echo '<a href="./index.php?action=page_detail_perso&id_perso='.$perso['id_perso'].
        '">'.$perso['nom_perso'].'</a>';
    echo '</ul>';
    }

    if (empty($persos)){
        echo 'Il n y a aucun personnage de cette race renseigné';
        // Bouton supprimer
        echo '<p><a href="./index.php?action=page_race/delete&id_race='.$race['id_race'].'">Voulez vous la supprimer ?</a></p>';
    }

    // update
    echo '</br>
    <a href="./index.php?action=page_race/update&id_race='.$race['id_race'].'">Modifier ?</a>';
    
    echo '</table>';
    
}

?> 