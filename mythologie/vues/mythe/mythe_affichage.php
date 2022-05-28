<?php

function affiche_liste_mythes($mythes){

    echo '<h2>Liste des mythes</h2>';

    foreach ($mythes as $mythe){
        echo '<h3 class="mythe"><a href="./index.php?action=page_detail_mythe&id_mythe='.$mythe['id_mythe'].
        '"> '.$mythe['titre'].'</a></h3>';

        $resume = resume($mythe['desc_mythe'],300);
        echo '<p>'.$resume.'</p>';

    }

    echo '<h2>Ajouter un mythe :</h2>';
    echo '<a href="./index.php?action=page_mythe/add">Ajouter un mythe ? un lieu ou un perso à un mythe ?</a>';
}

function affiche_mythe($mythe, $lieux, $persos){
    echo '<h1>'.$mythe['titre'].'</h1>';
    echo '<p> Epoque :'.$mythe['epoque'].'</p>';

    if($mythe['illu_mythe']!=''){
        print '<img src="images/upload/'.$mythe['illu_mythe'].'"alt="photo">';
    }

    
    echo '<p>'.$mythe['desc_mythe'].'</p>';
    
    
    echo '<h2>En savoir plus :</h2>';

    echo '</p class="myth"><a href="index.php?action=page_detail_categorie&id_cat='.$mythe['id_cat'].'">'.$mythe['nom_cat'].'</a></p>';
   
    echo '<h3>Lieu(x) où se déroule le mythe :</h3>';
    echo '<ul>';
    foreach ($lieux as $lieu){
        echo '<li><a href="./index.php?action=page_detail_lieu&id_lieu='.$lieu['id_lieu'].
        '">'.$lieu['nom_lieu'].'</a><a class="sup" href="./index.php?action=page_lieu_mythe/delete&id_mythe='.$mythe['id_mythe'].'&id_lieu='.$lieu['id_lieu'].'">Supprimer ?</a></br></br></li>';
        
    }
    echo '</ul>';

    echo '<h3>Personnages(s) dans le mythe</h3>';
    echo '<ul>';
    foreach ($persos as $personnage){
        echo '<li><a href="./index.php?action=page_detail_perso&id_perso='.$personnage['id_perso'].'">'.$personnage['nom_perso'].'</a><a class="sup" href="./index.php?action=page_perso_mythe/delete&id_mythe='.$mythe['id_mythe'].'&id_perso='.$personnage['id_perso'].'">Supprimer ?</a></li>';
        
    }
    echo '</ul>';
    echo '</table>';

    echo '<h2>Que voulez-vous faire avec ce mythe ?</h2>';
    echo "<a href='./index.php?action=page_mythe/delete&id_mythe=".$mythe['id_mythe']."'>Supprimer ?</a></br></br>";
    echo "<a href='./index.php?action=page_mythe/update&id_mythe=".$mythe['id_mythe']."'>Modifier ?</a>";

}

function select_form_mythes($mythes){
    echo '<select name="id_mythe" size=1 >';
    echo '<option value="NULL">Aucun mythe sélectionné</option>';
    foreach ($mythes as $mythe){
        echo '<option value='.$mythe['id_mythe'].'>'.$mythe['titre'].'</option>';
    }
    echo '</select>';
 }
?> 