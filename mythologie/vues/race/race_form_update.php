<?php

function form_update_race($pdo, $race){
    echo '<form action="index.php?action=page_race/updatebis&id_race='.$race['id_race'].'" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Modifier la race</legend><br/>
                <input type="text" name="nom_race" value="'.$race['nom_race'].'"><br/>
                <textarea name="desc_race" cols="80" rows="10">'.$race['desc_race'].'</textarea><br/>
                <legend>Sélectionner une image</legend>
                <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                <input type="file" name="image"/><br/><br/>';
                
                echo '<input type="submit">
            </fieldset>
        </form>';
}
?>