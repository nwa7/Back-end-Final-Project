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
                    <a href="index.php?action=page_mytho" >Choisisser par mythologie</a>
                    <a href="index.php?action=page_lieu" >Choisisser par lieu</a>
                    <a href="index.php?action=page_perso" >Choisisser par personnage</a>
                    <a href="index.php?action=page_race" >Choisisser par race</a>
                    <a href="index.php?action=page_mythe" >Choisisser par mythe</a>
                </div>
                
                <?php
                
                include('include/connexion.php');
                include('include/get_post.php');
                include('include/perso_select.php');
                include('include/perso_delete.php');
                include('vues/perso_affichage.php');

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