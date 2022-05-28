<h2> Nouvelle catégorie </h2>
<form target="_self" method="POST" enctype="multipart/form-data">
    <label>Nom : </label><input type="text" name="nom_cat" placeholder="Entrez son nom" required><br>
    <label>Description : </label><textarea name="desc_cat" rows="5" cols="30" placeholder="Entrez sa description"></textarea><br>
    <label> Illustration : </label>
                <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
                <input type="file" name="image"/>
    <input type="submit" value="OK"></p>
</form>