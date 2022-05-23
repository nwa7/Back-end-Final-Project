<?php

function affiche_liste_mythes($mythes){

    foreach ($mythes as $mythe){
        echo '<h3 class="mythe"><a href="./index.php?action=page_detail_mythe&id_mythe='.$mythe['id_mythe'].
        '"> '.$mythe['titre'].'</a></h3>';
        //A limiter le nombre de caractère pour le mythe
        echo '<p>'.$mythe['desc_mythe'].'</p>';

    }

}

function affiche_mythe($mythe, $lieux, $persos){
    echo '<h3 class="titre">'.$mythe['titre'].'</h3>';
    print '<img src="images/upload/'.$mythe['illu_mythe'].'"alt="photo">';
    echo '<p class="description">'.$mythe['desc_mythe'].'</p>';
    echo '<p class="epoque">'.$mythe['epoque'].'</p>';
    
    echo 'En savoir plus sur :';

   
    echo '<p>Lieu(x) où se déroule le mythe</p>';
    echo '<ul>';
    foreach ($lieux as $lieu){
        echo '<li><a href="./index.php?action=page_detail_lieu&id_lieu='.$lieu['id_lieu'].
        '">'.$lieu['nom_lieu'].'</a></li>';
        echo "<a href='./index.php?action=page_lieu_mythe/delete&id_mythe=".$mythe['id_mythe']."&id_lieu=".$lieu['id_lieu']."'>Supprimer ?</a></br></br>";
    }
    echo '</ul>';

    echo '<p>Personnages(s) dans le mythe</p>';
    foreach ($persos as $personnage){
        echo '<a href="./index.php?action=page_detail_perso&id_perso='.$personnage['id_perso'].
        '">'.$personnage['nom_perso'].'</a>';
        echo "<a href='./index.php?action=page_perso_mythe/delete&id_mythe=".$mythe['id_mythe']."&id_perso=".$personnage['id_perso']."'>Supprimer ?</a></br></br>";
    }
    echo '</table>';

    echo '</p class="myth"><a href="index.php?action=page_detail_categorie&id_cat='.$mythe['id_cat'].'">'.$mythe['nom_cat'].'</a></p>';

    echo "<a href='./index.php?action=page_mythe/delete&id_mythe=".$mythe['id_mythe']."'>Supprimer ?</a></br></br>";
    echo "<a href='./index.php?action=page_mythe/update&id_mythe=".$mythe['id_mythe']."'>Modifier ?</a>";

}

function select_form_mythes($mythes){
    echo '<select name="id_mythe" size=1 >';
    echo '<option value="NULL">Aucun</option>';
    foreach ($mythes as $mythe){
        echo '<option value='.$mythe['id_mythe'].'>'.$mythe['titre'].'</option>';
    }
    echo '</select>';
 }

 function select_checkbox_mythes($mythes){
    foreach ($mythes as $mythe){
        echo '<input type="checkbox" name="mythe" value='.$mythe['id_mythe'].'>'.$mythe['titre'].'</br>';
    }
    //echo '<input type="submit" name="valid_mythe" value="Valider">';
 }




?> 