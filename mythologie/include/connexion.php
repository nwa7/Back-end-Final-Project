<?php

    function connexion() {
                //$pdo = new PDO("mysql:host=sqletud.u-pem.fr;dbname=charline.le-pape_db", "charline.le-pape" , "123");
                $pdo = new PDO('mysql:host=localhost;dbname=testmythologie;charset=utf8', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            
                if ($pdo) {
                    // echo '<p>Connexion réussie</p>';
                    return $pdo;
                }
                else {
                    echo '<p>Erreur de connexion</p>';
                    exit;
                }
            }
