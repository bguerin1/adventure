<?php
    require("model/infoBDD.php"); 
    try{
        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
        $requete=$conn ->prepare("SELECT IDJOUEUR,ADRJOUEUR,MDPJOUEUR FROM JOUEUR WHERE ADRJOUEUR = :mail AND MDPJOUEUR=PASSWORD(:mdp);");
        // On lie la variable $email définie au-dessus au paramètre :mail de la requête préparée
        $requete->bindValue(':mail',$mail , PDO::PARAM_STR);
        $requete->bindValue(':mdp',$mdp , PDO::PARAM_STR);
        //On exécute la requête
        $requete->execute();
        // On récupère le résultat
        if ($requete->fetch()) {
            echo 'Joueur Connecté';
            $_SESSION["mail"] = $mail;
        } else {
            echo 'Joueur Inconnu ou mot de passe incorrect <br>';
        }
            
        //Fermeture de la connexion
        $conn=null;
    }
    catch(PDOException $e){
        echo "Erreur :" . $e ->getMessage();
        echo "Le numéro de l'erreur est : " . $e ->getCode();
        die;
    }
?>