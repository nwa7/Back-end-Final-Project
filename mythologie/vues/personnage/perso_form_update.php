<?php
    function formulaire_update_perso($pdo, $perso) {
        echo '<h2> Modification du personnage </h2>
        <form action="index.php?action=page_perso/modifier&id_perso='.$perso['id_perso'].'" method="post" enctype="multipart/form-data">        
            <fieldset>
                <legend>Modifiez les caractéristiques du personnage :</legend><br/>
                <label> Nom : </label><input type="text" name="nom_perso" value="'.$perso['nom_perso'].'" required>
                <br/>
                <label>Sexe : </label>
                <input type="radio" name="sexe" value="H" /> M
                <input type="radio" name="sexe" value="F" /> F
                <input type="radio" name="sexe" value="NR" checked/> NR
                <br/>
                <label> Fonction : </label> <input type="text" name="fct_perso" value="'.$perso['fct_perso'].'">
                <br/>
                <label> Description : </label>
                <br/> 
                <textarea name="desc_perso" rows="5" cols="30">'.$perso['desc_perso'].'</textarea>
                <br/>
                <label> Illustration : </label>
                    <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                    <input type="file" name="illu"/>
                <br/>
            <fieldset>';
                
            $pdo=connexion();
            $persos = select_liste_persos($pdo);
            
            echo '<label> Parent 1 : </label> 
            <select name="id_parent1" size=1>';
            $parent1= select_perso($pdo, $perso['id_parent1']);
            select_form_update_persos($persos, $parent1);

            echo '</br>
            <label> Parent 2 : </label>
            <select name="id_parent2" size=1>';
            $parent2= select_perso($pdo,$perso['id_parent2']);
            select_form_update_persos($persos, $parent2);

            echo '</br>
            <label> Race : </label>';
            $races = select_liste_races($pdo);
            $rac= select_perso($pdo,$perso['id_race']);
            select_form_update_races($races, $rac);

            echo '</br>
            <label> Mythe(s) : </label>
            </br>';
            /* $mythes = select_liste_mythes($pdo);
            select_checkbox_mythes($mythes); */
            formulaire_insert_persos_mythe();
                
            echo '</fieldset>
                <input type="submit">
            </fieldset>
        </form>';
    };