<?php

function affiche_liste_races($races){
    echo '<h2>Liste des races</h2>';
    foreach ($races as $race){
        echo '<h3 class="race"><a href="./index.php?action=page_detail_race&id_race='.$race['id_race'].
        '"> '.$race['nom_race'].'</a></h3>';
        $resume = resume($race['desc_race'],300);
        echo '<p>'.$resume.'</p>';
    }
    echo '<h2>Ajouter une race :</h2>';
    echo '<a href="./index.php?action=page_race/add">Ajouter une race ?</a>';
}

function affiche_race($race, $persos){
    echo '<h1 class="nom_race">'.$race['nom_race'].'</h1>';

    if($race['illu_race']!=''){
        print '<img src="images/upload/'.$race['illu_race'].'"alt="photo">';
    }
    echo '<p class="description">'.$race['desc_race'].'</p>';
    
    echo '<h2>En savoir plus :</h2>';

    if (empty($persos)){
        echo 'Il n\'y a aucun personnage de cette race renseigné';
        // Bouton supprimer
        echo '<p><a href="./index.php?action=page_race/delete&id_race='.$race['id_race'].'">Voulez vous la supprimer ?</a></p>';
    }
    else{
        echo '<p>Personnages de cette race : </p>';
        echo'<ul>';
        foreach ($persos as $perso){
    
            echo '<li><a href="./index.php?action=page_detail_perso&id_perso='.$perso['id_perso'].
            '">'.$perso['nom_perso'].'</a></li>';
            
        }
        echo '</ul>';
    }
    echo '<h3>Que voulez-vous faire avec cette race ?</h3>';

    // update
    echo '</br>
    <a href="./index.php?action=page_race/update&id_race='.$race['id_race'].'">Modifier ?</a>';
    
    echo '</table>';
    
}

?> 