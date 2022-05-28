<?php
    function formulaire_update_lieu($pdo, $lieu) {
        echo '<h2> Modification du lieu </h2>
        <form action="index.php?action=page_lieu/modifier&id_lieu='.$lieu['id_lieu'].'" method="post" enctype="multipart/form-data">        
            <fieldset>
                <legend>Modifiez les caractéristiques du lieu :</legend><br/>
                <label> Nom : </label><input type="text" name="nom_lieu" value="'.$lieu['nom_lieu'].'" required>
                <br/>
                <label> Description : </label>
                <br/> 
                <textarea name="desc_lieu" rows="5" cols="30">'.$lieu['desc_lieu'].'</textarea>
                <br/>
                <label> Illustration : </label>
                    <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                    <input type="file" name="illu"/>
                <br/>
            <fieldset>';

            echo '</br>
            <label> Mythe(s) : </label>
            </br>';
            /* $mythes = select_liste_mythes($pdo);
            select_checkbox_mythes($mythes); */
            
                
            echo '</fieldset>
                <input type="submit">
            </fieldset>
        </form>';

        formulaire_insert_lieux_mythe();
    };