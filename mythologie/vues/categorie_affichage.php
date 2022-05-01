<?php

function affiche_liste_categorie($categories){

    foreach ($categories as $categorie){
        echo '<h3 class="mythologie"><a href="./index.php?action=page_detail_categorie&id_cat='.$categorie['id_cat'].
        '"> '.$categorie['nom_cat'].'</a></h3>';
        //A limiter le nombre de caractère pour le mythe
        echo '<p>'.$categorie['desc_cat'].'</p>';
    }

}

function affiche_categorie($categorie) {

    echo    "<h3 class='nom'>".$categorie['nom_cat']."</h3>
            <p class='desc'>".$categorie['desc_cat']."</p>
            <img src='images/upload".$categorie['illu_cat']."'alt='photo'>".

            // Bouton supprimer

            "<a href='./index.php?action=page_detail_categorie&id_categorie=".$categorie['id_categorie']."/delete'>Supprimer ?</a>";
}

?>