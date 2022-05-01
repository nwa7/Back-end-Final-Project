<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mythologie</title>
    <link rel="stylesheet" media="screen" href="./css/style.css">
</head>
<div class="bg">
    <div class="wrapper">

        <header>
            <h1>Mythologie</h1>
        </header>

        <body>
            
            <div class="conteneur">
                <div class="menu">
                    <a href="index.php" >Accueil</a>
                    <a href="index.php?action=page_mytho" >Choisir par mythologie</a>
                    <a href="index.php?action=page_lieu" >Choisir par lieu</a>
                    <a href="index.php?action=page_perso" >Choisir par personnage</a>
                    <a href="index.php?action=page_race" >Choisir par race</a>
                    <a href="index.php?action=page_mythe" >Choisir par mythe</a>
                </div>
                
                <?php
                
                include('include/connexion.php');
                include('include/get_post.php');

                // --- INCLUDES PERSONNAGES ---
                include('include/perso_select.php');
                include('include/perso_delete.php');
                include('vues/perso_affichage.php');

                // --- INCLUDES RACES ---
                include('include/race_select.php');
                include('vues/race_affichage.php');

                // --- INCLUDES LIEUX ---
                include('include/lieu_select.php');
                include('include/lieu_delete.php');
                include('vues/lieu_affichage.php');

                // --- INCLUDES CATEGORIES ---
                include('include/categorie_select.php');
                include('vues/categorie_affichage.php');

                $pdo = connexion();

                // récupération de la variable sur l'URL
                if (isset($_GET['action'])) 
                $action = $_GET['action']; 
                else $action = '';

                switch($action) {
                    case 'page_mythe' :

                        //créer une vue
                        echo '<h2>Liste des mythes</h2>';

                        $mythes = select_liste_mythes($pdo); 
                        affiche_liste_mythes($mythes);

                    break;
                    

                    case 'page_detail_mythe' :

                        //créer une vue
                        echo '<h2>Le mythe</h2>';

                        $id_mythe = get_integer('id_mythe');

                        $mythe = select_mythe($pdo, $id_mythe);
                        $lieux = select_lieux_mythe($pdo, $id_mythe);
                        $persos = select_persos_mythe($pdo, $id_mythe);
        
                        affiche_mythe($mythe, $lieux, $persos);
                         
                    break;

                    // - - - P E R S O N N A G E S - - - 
                    
                    case 'page_perso' :
                        
                        //créer une vue
                        echo '<h2>Liste des personnages</h2>';

                        $persos = select_liste_persos($pdo); 
                        affiche_liste_persos($persos);
              
                    break;

                    case 'page_detail_perso' :

                        //créer une vue
                        echo '<h2>Le personnage</h2>';

                        $id_perso = get_integer('id_perso');
                        $perso = select_perso($pdo, $id_perso);
                        $parent1 = select_perso($pdo, $perso['id_parent1']);
                        $parent2 = select_perso($pdo, $perso['id_parent2']);
                        affiche_perso($perso, $parent1, $parent2);
                    
                    break;

                    case 'page_perso/add' :

                        // Formulaire pour ajouter perso
                        require('vues/perso_form_add.php');

                        if(isset($_POST["nom_perso"])) {
                            $nom_perso = $_POST["nom_perso"];
                            $sexe = $_POST["sexe"];
                            $fct_perso = $_POST["fct_perso"];
                            $desc_perso = $_POST["desc_perso"];
                            $illu_perso = $_POST["illu_perso"];
                            $id_parent1 = $_POST["id_parent1"];
                            $id_parent2 = $_POST["id_parent2"];
                            $id_race = $_POST["id_race"];
                    
                            require "include/perso_add.php";
                            
                            add_perso($pdo,$nom_perso,$sexe,$fct_perso,$desc_perso,$illu_perso,$id_parent1,$id_parent2,$id_race);
                        }
                    
                    break;

                    case 'page_detail_perso&id_perso='.$perso['id_perso'].
                    '/delete' :
                        
                        // Efface perso
                        del_perso($pdo, $perso['id_perso']);
                    break;

                    // - - - R A C E S - - - 

                    case 'page_race':
                    echo '<h2>Liste des races</h2>';

                        $races = select_liste_races($pdo); 
                        affiche_liste_races($races);
                    break;
                    
                    case 'page_detail_race' :

                        echo '<h2>La race</h2>';

                        $races = select_liste_races($pdo); 
                        $lieux = select_lieux_races($pdo, $id_race);
                            $categos = select_categos_races($pdo, $id_race);
                        $persos = select_persos_races($pdo, $id_race);
                        affiche_liste_races($races, $lieux, $categos);
                    
                    break;

                    // - - - L I E U X - - - 

                    case 'page_lieu':
                        // Créer une vue
                        echo "<h2>Liste des lieux</h2>";
                        $lieux = select_liste_lieux($pdo);
                        affiche_liste_lieux($lieux);
                    break;

                    case 'page_detail_lieu':
                        // Créer une vue
                        echo "<h2>Le lieu</h2>";
                        $id_lieu = get_integer('id_lieu');
                        $lieu = select_lieu($pdo, $id_lieu);
                        affiche_lieu($id_lieu);
                    break;

                    case 'page_lieu/add':
                        // Formulairep our ajouter un lieu
                        require('vues/lieu_form_add.php');
                        if(isset($_POST['nom_lieu'])) {
                            $nom_lieu = $_POST['nom_lieu'];
                            $desc_lieu = $_POST['desc_lieu'];
                            $illu_lieu = $_POST['illu_lieu'];
                            require "include/lieu_add.php";
                            add_lieu($pdo, $nom_lieu, $desc_lieu, $illu_lieu);
                        }
                    break;

                    case 'page_detail_lieu$id_lieu='.$lieu['id_lieu'].'/delete';
                        // Efface lieu
                        del_lieu($pdo, $lieu['id_lieu']);
                    break;

                    // - - - C A T E G O R I E S - - - 

                    case 'page_categorie':
                        //Créer une vue
                        echo "<h2>Liste des catégories</h2>";
                        $categories = select_liste_categories($pdo);
                        affiche_liste_categorie($categories);
                    break;

                    case 'page_detail_categorie':
                        // Créer une vue;
                        echo '<h2>La catégorie</h2>';
                        $id_cat = get_integer('id_cat');
                        $categorie = select_categorie($pdo, $id_cat);
                        affiche_categorie($id_cat);
                    break;

                    // - - - - - - - - - - - - - - - - -

                    default :
                        //créer une vue
                        echo '<h2>Bienvenue</h2>';
                        echo '<p>Envie d\'en apprendre plus en mythologie ? C\'est ici !</p>';       
                }
                ?>

            </div>
        </body>

        <footer>
            <p>J'adore la mythologie ! </p>
        </footer>
        
    </div>
</div>

</html>