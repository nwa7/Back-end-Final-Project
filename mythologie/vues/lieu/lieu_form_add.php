<h2> Nouveau lieu </h2>
<form target="_self" method="POST">
    <label>Nom : </label><input type="text" name="nom_lieu" placeholder="Entrez son nom" required><br>
    <label>Description : </label><textarea name="desc_lieu" rows="5" cols="30">Entrez sa description</textarea><br>
    <legend>Sélectionnez une image</legend>
        <input type="hidden" name="MAX_FILES_SIZE" value="204800"/>
        <input type="file" name="image"/>
    <input type="submit" value="OK"></p>
</form>


<form method="post" action="index.php?action=page_mythe_lieu/insert">
    <fieldset>
        <legend>Ajouter un lieu à un mythe</legend>
            <?php $pdo=connexion();

            $lieux =select_liste_lieux($pdo);
            select_form_lieux($lieux);

            $mythes =select_liste_mythes($pdo);
            select_form_mythes($mythes); ?>           
        <input type="submit">
    </fieldset>
</form>