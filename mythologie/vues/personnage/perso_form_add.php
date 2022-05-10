<html>
    <h2>Nouveau personnage</h2>
    <form target="_self" method="POST">
        <label> Nom : </label><input type="text" name="nom_perso" placeholder="Entrez son nom" required>
        <br/>
        <label>Sexe : </label>
        <input type="radio" name="sexe" value="H" /> M
        <input type="radio" name="sexe" value="F" /> F
        <input type="radio" name="sexe" value="NR" checked/> NR
        <br/>
        <label> Fonction : </label> <input type="text" name="fonc_perso" placeholder="Entrez sa fonction" />
        <br/>
        <label> Description : </label>
        <br/> 
        <textarea name="desc_perso" rows="5" cols="30">Entrez sa description</textarea>
        <br/>
        <label> Illustration : </label>
        <br/>
        <label> Parent 1 : </label><input type="text" name="parent1" />
        <br/>
        <label> Parent 2 : </label><input type="text" name="parent2" />
        <br/>
        <label> Race : </label><input type="text" name="race" />
        <p><input type="submit" value="OK"></p>
    </form>
</html>
