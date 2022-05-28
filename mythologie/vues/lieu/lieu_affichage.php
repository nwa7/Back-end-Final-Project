<?php

function affiche_liste_lieux($lieux){

    echo "<h2>Liste des lieux</h2>";

    foreach ($lieux as $lieu){
        echo    '<h3>
                    <a href="./index.php?action=page_detail_lieu&id_lieu='.$lieu['id_lieu'].'"> '.$lieu['nom_lieu'].'</a>
                </h3>';

        $resume = resume($lieu['desc_lieu'],300);
        echo '<p>'.$resume.'</p>';
    }

    // Bouton ajouter un lieu
    echo '<h2>Ajouter un lieu :</h2>';
    echo '<a href="./index.php?action=page_lieu/add">Ajouter un lieu ?</a>';
}

function affiche_lieu($lieu) {

    echo    "<h1>".$lieu['nom_lieu']."</h1>";

    if($lieu['illu_lieu']!=''){
        echo "<img src='images/upload/".$lieu['illu_lieu']."'alt='photo'></br></br>";
    }

    echo "<p>".$lieu['desc_lieu']."</p>";

            // Bouton supprimer
    echo '<h3>Que voulez-vous faire avec ce lieu ?</h3>';

    echo "<a href='./index.php?action=page_detail_lieu/delete&id_lieu=".$lieu['id_lieu']."'>Supprimer ?</a><br>
            <a href='./index.php?action=page_lieu/update&id_lieu=".$lieu['id_lieu']."'>Modifier ?</a>";
}

function select_form_lieux($lieux){
    echo '<select name="id_lieu" size=1 >';
    echo '<option value="NULL">Aucun lieu sélectionné</option>';
    foreach ($lieux as $lieu){
        echo '<option value='.$lieu['id_lieu'].'>'.$lieu['nom_lieu'].'</option>';
    }
    echo '</select>';
 }

?>