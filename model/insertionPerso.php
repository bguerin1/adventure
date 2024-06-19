<?php
    try{
        $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
        $requete=$conn ->prepare("INSERT INTO JOUEUR(ADRJOUEUR,MDPJOUEUR) VALUES(:adrjoueur,PASSWORD(:mdpjoueur));");
        $requete->bindValue(':adrjoueur',$mail , PDO::PARAM_STR);
        $requete->bindValue(':mdpjoueur',$password , PDO::PARAM_STR);
        //On exécute la requête
        $requete->execute();

        $idJoueur = $conn ->lastInsertId();

        $requete2=$conn ->prepare("INSERT INTO PERSONNAGE(IDJOUEUR,IDDIFFICULTE,NOMPERSONNAGE,FORCEP,AGILITEP,DEXTERITEP,CONSTITUTIONP) VALUES(:idJoueur,:idDifficulte,:nomPersonnage,:forceP,:agiliteP,:dexteriteP,:constitutionP);");
        $requete2->bindValue(':idJoueur',$idJoueur , PDO::PARAM_STR);
        $requete2->bindValue(':idDifficulte',$difficulte , PDO::PARAM_STR);
        $requete2->bindValue(':nomPersonnage',$pseudonyme , PDO::PARAM_STR);
        $requete2->bindValue(':forceP',$force , PDO::PARAM_STR);
        $requete2->bindValue(':agiliteP',$agilite , PDO::PARAM_STR);
        $requete2->bindValue(':dexteriteP',$dexterite , PDO::PARAM_STR);
        $requete2->bindValue(':constitutionP',$constitution , PDO::PARAM_STR);
        //On exécute la requête
        $requete2->execute();
        //Fermeture de la connexion
        $conn=null;
    }
    catch(PDOException $e){
        echo "Erreur :" . $e ->getMessage();
        echo "Le numéro de l'erreur est : " . $e ->getCode();
        die;
    }
?>