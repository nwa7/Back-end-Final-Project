<?php

function formulaire_insert_mythe(){
    echo '<form action="index.php?action=page_mythe/insert" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Ajouter un mythe</legend><br/>
                <input type="text" name="titre" placeholder="Nom"><br/>
                <input type="text" name="epoque" placeholder="Epoque"><br/>
                <textarea name="desc_mythe" placeholder="Description" cols="80" rows="10"></textarea><br/>
                <legend>Sélectionnez une image</legend>
                <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                <input type="file" name="image"/>';
                
                $pdo=connexion();
                $categories = select_liste_categories($pdo);
                select_form_categories($categories);

                echo '<input type="submit">
            </fieldset>
        </form>';



    }

    function formulaire_insert_lieux_mythe(){
        echo '<form method="post" action="index.php?action=page_mythe_lieu/insert">
            <fieldset>
                <legend>Ajouter un lieu à un mythe</legend>';
                $pdo=connexion();

                $lieux =select_liste_lieux($pdo);
                select_form_lieux($lieux);

                $mythes =select_liste_mythes($pdo);
                select_form_mythes($mythes);
                echo '           
                <input type="submit">
            </fieldset>
        </form>';
    }

    function formulaire_insert_persos_mythe(){
        echo '<form method="post" action="index.php?action=page_mythe_perso/insert">
            <fieldset>
                <legend>Ajouter un perso à un mythe</legend>';
                $pdo=connexion();

                $persos =select_liste_persos($pdo);
                select_form_persos($persos);

                $mythes =select_liste_mythes($pdo);
                select_form_mythes($mythes);

                echo '<input type="submit">
            </fieldset>
        </form>';

    }

?>