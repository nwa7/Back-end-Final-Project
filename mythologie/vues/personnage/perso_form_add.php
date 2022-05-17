<html>
    <h2>Nouveau personnage</h2>
    <form action="index.php?action=page_perso/insert" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label> Nom : </label><input type="text" name="nom_perso" placeholder="Entrez son nom" required>
            <br/>
            <label>Sexe : </label>
            <input type="radio" name="sexe" value="H" /> M
            <input type="radio" name="sexe" value="F" /> F
            <input type="radio" name="sexe" value="NR" checked/> NR
            <br/>
            <label> Fonction : </label> <input type="text" name="fct_perso" placeholder="Entrez sa fonction" />
            <br/>
            <label> Description : </label>
            <br/> 
            <textarea name="desc_perso" rows="5" cols="30">Entrez sa description</textarea>
            <br/>
            <label> Illustration : </label>
                <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                <input type="file" name="illu"/>
            <br/>

            <?php

                $pdo=connexion();
                $persos = select_liste_persos($pdo);
                
                echo '<label> Parent 1 : </label> 
                <select name="id_parent1" size=1>';
                select_form_persos($persos);

                echo '<label> Parent 2 : </label>
                <select name="id_parent2" size=1>';
                select_form_persos($persos);

                echo '<label> Race : </label>';
                $races = select_liste_races($pdo);
                select_form_races($races);

            ?>

            <input type="submit">
        </fieldset>
    </form>
</html>
