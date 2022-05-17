<html>

<form action="index.php?action=page_race/add" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Ajouter une race</legend><br/>
                <input type="text" name="nom_race" placeholder="Nom"><br/>
                <textarea name="desc_race" placeholder="Description" cols="80" rows="10"></textarea><br/>
                <legend>Sélectionner une image</legend>
                <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                <input type="file" name="image"/>
                <input type="submit">
            </fieldset>
        </form>

</html>