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
                    <a href="index.php?action=page_categorie" >Choisir par categorie</a>
                    <a href="index.php?action=page_lieu" >Choisir par lieu</a>
                    <a href="index.php?action=page_perso" >Choisir par personnage</a>
                    <a href="index.php?action=page_race" >Choisir par race</a>
                    <a href="index.php?action=page_mythe" >Choisir par mythe</a>
                </div>
                
                <?php
                
                include('include/connexion.php');
                include('include/get_post.php');

                // --- INCLUDES PERSONNAGES ---
                include('include/personnage/perso_select.php');
                include('include/personnage/perso_delete.php');
                include('vues/personnage/perso_affichage.php');

                // --- INCLUDES RACES ---
                include('include/race/race_select.php');
                include('vues/race/race_affichage.php');

                // --- INCLUDES LIEUX ---
                include('include/lieu/lieu_select.php');
                include('include/lieu/lieu_delete.php');
                include('vues/lieu/lieu_affichage.php');
                //include('vues/lieu/lieu_form_add.php');

                // --- INCLUDES CATEGORIES ---
                include('include/categorie/categorie_select.php');
                include('vues/categorie/categorie_affichage.php');

                 // --- INCLUDES MYTHES ---
                 include('include/mythe/mythe_select.php');
                 include('include/mythe/mythe_add.php');
                 include('include/mythe/mythe_delete.php');
                 include('include/mythe/mythe_update.php');
                 include('vues/mythe/mythe_affichage.php');
                 include('vues/mythe/mythe_form_add.php');
                 include('vues/mythe/mythe_form_update.php');


                $pdo = connexion();

                // récupération de la variable sur l'URL
                if (isset($_GET['action'])) 
                $action = $_GET['action']; 
                else $action = '';

                switch($action) {

                // - - - M Y T H E S - - - 

                    case 'page_mythe' :

                        echo '<h2>Liste des mythes</h2>';

                        $mythes = select_liste_mythes($pdo); 
                        affiche_liste_mythes($mythes);
                        echo '<a href="./index.php?action=page_mythe/add">Ajouter un mythe ?</a>';

                    break;
                    

                    case 'page_detail_mythe' :

                        echo '<h2>Le mythe</h2>';

                        $id_mythe = get_integer('id_mythe');

                        $mythe = select_mythe($pdo, $id_mythe);
                        $lieux = select_lieux_mythe($pdo, $id_mythe);
                        $persos = select_persos_mythe($pdo, $id_mythe);
        
                        affiche_mythe($mythe, $lieux, $persos);

                         
                    break;

                    case 'page_mythe/update':
                        $id_mythe = get_integer('id_mythe');
                        $mythe = select_mythe($pdo, $id_mythe);
                        formulaire_update_mythe($pdo,$mythe);
                    break;

                    case 'page_mythe/modifier':
                        
                        $id_mythe = get_integer('id_mythe');
                        $mythe = select_mythe($pdo, $id_mythe);
                        echo "Le mythe a été modifié";
                        $titre = post_string('titre');
                        $desc_mythe = post_string('desc_mythe');
                        $epoque = post_string('epoque');
                        $id_cat = post_integer('id_cat');

                        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                            $temp = $_FILES['image']['tmp_name'];
                            $name = $_FILES['image']['name'];
                            $size = $_FILES['image']['size'];
                            $type = $_FILES['image']['type'];
                           
                           
                            // déplacement du fichier reçu
                            move_uploaded_file($temp, 'images/upload/'.$name);
                          }
                          else {
                            $name=$mythe['illu_mythe'];
                            //print("Aucune image reçue !");
                          
                          }
                          echo '<h2>Réception d\'un nouveau mythe</h2>';
                          echo '<p>Titre: '.$titre.'</p>';
                          echo '<p>Description : '.$desc_mythe.'</p>';
                          echo '<p>Epoque : '.$epoque.'</p>';

                          modifier_mythe($pdo,$id_mythe, $titre, $name, $desc_mythe, $epoque, $id_cat);
                    break;


                    case 'page_mythe/delete':
                        $id_mythe = get_integer('id_mythe');
                        echo "Le mythe a été supprimé";
                        delete_mythe($pdo, $id_mythe);
                    break;

                    case 'page_mythe/add':
                        formulaire_insert_mythe();
                        formulaire_insert_lieux_mythe();
                        formulaire_insert_persos_mythe();
                    break;

                    case 'page_mythe/insert':

                        $titre = post_string('titre');
                        $desc_mythe = post_string('desc_mythe');
                        $epoque = post_string('epoque');
                        //var_dump($_FILES);

                        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                            $temp = $_FILES['image']['tmp_name'];
                            $name = $_FILES['image']['name'];
                            $size = $_FILES['image']['size'];
                            $type = $_FILES['image']['type'];
                           
                           
                            // déplacement du fichier reçu
                            move_uploaded_file($temp, 'images/upload/'.$name);
                          }
                          else {
                            print("Aucune image reçue !");
                            $name=NULL;
                          }

                        $id_cat = post_integer('id_cat');

                        echo '<h2>Réception d\'un nouveau mythe</h2>';
                        echo '<p>Titre: '.$titre.'</p>';
                        echo '<p>Description : '.$desc_mythe.'</p>';
                        echo '<p>Epoque : '.$epoque.'</p>';

                        insert_mythe($pdo, $titre, $name, $desc_mythe, $epoque, $id_cat);

                    break;

                    case 'page_lieux_mythe/insert':

                    break;

                    case 'page_persos_mythe/insert':

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
                        require('vues/personnage/perso_form_add.php');

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

                    /*case 'page_detail_perso&id_perso='.$perso['id_perso'].
                    '/delete' :
                        
                        // Efface perso
                        del_perso($pdo, $perso['id_perso']);
                    break;*/

                    // - - - R A C E S - - - 

                    case 'page_race':
                    echo '<h2>Liste des races</h2>';

                        $races = select_liste_races($pdo); 
                        affiche_liste_races($races);
                    break;
                    
                    case 'page_detail_race' :

                        echo '<h2>La race</h2>';
                        
                        $id_race = get_integer('id_race');
                        $race = select_race($pdo, $id_race); 
                        $persos = select_persos_race($pdo, $id_race);
                        affiche_race($race, $persos);
                    
                    break;

                    
                    case 'page_race/add':
                        require('vues/race/race_form_add.php');
                        if(isset($_POST['nom_race'])) {
                            $nom_race = $_POST['nom_race'];
                            $desc_race = $_POST['desc_race'];
                            require "include/race/race_add.php";
                            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                                $temp = $_FILES['image']['tmp_name'];
                                $name = $_FILES['image']['name'];
                                $size = $_FILES['image']['size'];
                                $type = $_FILES['image']['type'];
                               
                               
                                // déplacement du fichier reçu
                                move_uploaded_file($temp, 'images/upload/'.$name);
                              }
                              else {
                                print("Aucune image reçue !");
                                $name=NULL;
                              } 
                            add_race($pdo, $nom_race, $desc_race, $illu_race);
                        }
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
                        affiche_lieu($lieu);
                    break;

                    case 'page_lieu/add':
                        // Formulairep our ajouter un lieu
                        require('vues/lieu/lieu_form_add.php');
                        if(isset($_POST['nom_lieu'])) {
                            $nom_lieu = $_POST['nom_lieu'];
                            $desc_lieu = $_POST['desc_lieu'];
                            $illu_lieu = $_POST['illu_lieu'];
                            require "include/lieu/lieu_add.php";
                            add_lieu($pdo, $nom_lieu, $desc_lieu, $illu_lieu);
                        }
                    break;

                    /*case 'page_detail_lieu&id_lieu='.$lieu['id_lieu'].'/delete';
                        // Efface lieu
                        del_lieu($pdo, $lieu['id_lieu']);
                    break;*/


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
                        affiche_categorie($categorie);
                    break;

                    case 'page_categorie/add':
                        // Formulairep ou ajouter une catégorie
                        require('vues/categorie_form_add.php');
                        if(isset($_POST['nom_cat'])) {
                            $nom_cat = $_POST['nom_cat'];
                            $desc_cat = $_POST['desc_cat'];
                            $illu_cat = $_POST['illu_cat'];
                            require "include/categorie_add.php";
                            add_categorie($pdo, $nom_cat, $desc_cat, $illu_cat);
                        }
                    break;

                    case 'page_detail_cat&id_cat='.$categorie['id_cat'].'/delete';
                        // Efface categorie
                        del_categorie($pdo, $categorie['id_cat']);
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