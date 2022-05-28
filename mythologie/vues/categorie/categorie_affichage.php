<?php

function affiche_liste_categorie($categories){

    echo "<h2>Liste des catégories</h2>";

    foreach ($categories as $categorie){
        echo '<h3><a href="./index.php?action=page_detail_categorie&id_cat='.$categorie['id_cat'].
        '"> '.$categorie['nom_cat'].'</a></h3>';
        //A limiter le nombre de caractère pour le mythe
        $resume = resume($categorie['desc_cat'],300);
        echo '<p>'.$resume.'</p>';
        
        //echo '<p>'.$categorie['desc_cat'].'</p>';
    }

    // Bouton ajouter une catégorie
    echo '<h2>Ajouter une catégorie :</h2>';
    echo '<a href="./index.php?action=page_categorie/add">Ajouter une catégorie ?</a>';
}

function affiche_categorie($categorie, $mythes) {
    echo    "<h1>".$categorie['nom_cat']."</h1>";

    if($categorie['illu_cat']!=''){
        echo "<img src='images/upload/".$categorie['illu_cat']."'alt='photo'></br></br>";
    }

    echo "<p>".$categorie['desc_cat']."</p>";

    echo '<h2>En savoir plus :</h2>';
    if (empty($mythes)){
        echo '<p>Il n\'y a aucun mythe dans cette catégorie</p>';
        // Bouton supprimer
        echo  "<a href='./index.php?action=page_detail_categorie/delete&id_cat=".$categorie['id_cat']."'>Voulez-vous la supprimer ?</a></br>";
    }
    else{
        echo '<p>Personnages de cette race : </p>';
        echo'<ul>';
        foreach ($mythes as $mythe){
    
            echo '<li><a href="./index.php?action=page_detail_mythe&id_mythe='.$mythe['id_mythe'].
            '">'.$mythe['titre'].'</a></li>';
            echo '</ul>';
        }
    }
            // Bouton supprimer et modifier

    echo '<h3>Que voulez-vous faire avec cette catégorie ?</h3>';
    
    echo "<a href='./index.php?action=page_detail_categorie/update&id_cat=".$categorie['id_cat']."'>Modifier ?</a>";

}

function select_form_categories($categories){
    echo '<br><br><select name="id_cat" size=1 >';
    echo '<option value="NULL">Aucune catégorie sélectionnée</option>';
    foreach ($categories as $categorie){
        echo '<option value='.$categorie['id_cat'].'>'.$categorie['nom_cat'].'</option>';
    }
    echo '</select>';
 }

 function select_form_update_cat($categories, $cat){
    echo '<select name="id_cat" size=1 >';
    echo '  <option value="'.$cat['id_cat'].'">'.$cat['nom_cat'].'</option>
            <option value="NULL">Aucune catégorie sélectionnée</option>';
    foreach ($categories as $categorie){
        echo '<option value='.$categorie['id_cat'].'>'.$categorie['nom_cat'].'</option>';
    }
    echo '</select>';
 }

?>