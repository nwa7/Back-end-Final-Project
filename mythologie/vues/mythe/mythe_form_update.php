<?php

function formulaire_update_mythe($pdo, $mythe){
    echo '<form action="index.php?action=page_mythe/modifier&id_mythe='.$mythe['id_mythe'].'" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Ajouter un mythe</legend><br/>
                <input type="text" name="titre" value="'.$mythe['titre'].'"><br/>
                <input type="text" name="epoque" value="'.$mythe['epoque'].'"><br/>
                <textarea name="desc_mythe" cols="80" rows="10">'.$mythe['desc_mythe'].'</textarea><br/>
                <legend>Sélectionnez une image</legend>
                <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                <input type="file" name="image"/><br/><br/>';
                
                $pdo=connexion();
                $categories = select_liste_categories($pdo);
                $cat= select_categorie($pdo, $mythe['id_cat']);
                select_form_update_cat($categories, $cat);

                echo '<input type="submit">
            </fieldset>
        </form>';

}
?>