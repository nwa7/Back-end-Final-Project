<?php
    function formulaire_update_categorie($pdo, $cat) {
        echo '<h2> Modification de la categorie </h2>
        <form action="index.php?action=page_categorie/modifier&id_cat='.$cat['id_cat'].'" method="post" enctype="multipart/form-data">        
            <fieldset>
                <legend>Modifiez les caractéristiques de la catégorie :</legend><br/>
                <label> Nom : </label><input type="text" name="nom_cat" value="'.$cat['nom_cat'].'" required>
                <br/>
                <label> Description : </label>
                <br/> 
                <textarea name="desc_cat" rows="5" cols="30">'.$cat['desc_cat'].'</textarea>
                <br/>
                <label> Illustration : </label>
                    <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                    <input type="file" name="illu"/>
                <br/>';
                
            echo '
                <input type="submit">
            </fieldset>
        </form>';
    };

?>