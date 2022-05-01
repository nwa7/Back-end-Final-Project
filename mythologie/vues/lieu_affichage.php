<?php

function affiche_liste_lieux($lieux){
    foreach ($lieux as $lieu){
        echo    '<h3 class="lieu">
                    <a href="./index.php?action=page_detail_lieu&id_lieu='.$lieu['id_lieu'].'"> '.$lieu['nom_lieu'].'</a>
                </h3>'.

        //A limiter le nombre de caractère pour le lieu

                '<p>'.$lieu['nom_lieu'].'</p>
                <p>'.$lieu['desc_lieu'].'</p>';
    }

    // Bouton ajouter un lieu

    echo '<a href="./index.php?action=page_lieu/add">Ajouter un lieu ?</a>';
}

function affiche_lieu($lieu) {

    echo    "<h3 class='nom'>".$lieu['nom_lieu']."</h3>
            <p class='desc'>".$lieu['desc_lieu']."</p>
            <img src='images/upload".$lieu['illu_lieu']."'alt='photo'>".

            // Bouton supprimer

            "<a href='./index.php?action=page_detail_lieu&id_lieu=".$lieu['id_lieu']."/delete'>Supprimer ?</a>";
}

?>