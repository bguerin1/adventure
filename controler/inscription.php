
<?php 

	define("MAX_CARAC",20);
	define("MIN_CARAC",1);
		

	function isStrongPassword($password) {
		$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/";
		return preg_match($pattern, $password);
	}

	function verifCarac($caracNom) {
		$verif=true;
		global $msg_error;
		if(!isset($_POST[$caracNom])) {
			$verif = false;
			$msg_error .= "La statistique ".$caracNom." n'as pas été renseignée.<br>";
		}
		else if (empty($_POST[$caracNom])) {
			$verif = false;
			$msg_error .= "La statistique ".$caracNom." est vide.<br>";
		}			
		if (!ctype_digit($_POST[$caracNom])) {
			$verif=false;
			$msg_error .= "La statistique ". $caracNom ." doit être un entier.<br>";
		}
		else if ($_POST[$caracNom] < MIN_CARAC || $_POST[$caracNom] > MAX_CARAC) {
			$verif=false;
			$msg_error .= "La statistique ". $caracNom ." n'est pas comprise entre ".MIN_CARAC." et ".MAX_CARAC.".<br>";
		}

		return $verif;
	}

    $verif = true;
    $msg_error = "ERREUR :<br>";
    if(!isset($_POST['pseudonyme'])) {
        $verif = false;
        $msg_error .= "Aucun pseudonyme n'est renseigné.<br>";
    }
    if(!isset($_POST['difficulte'])) {
        $verif = false;
        $msg_error .= "Aucune difficulté n'est renseignée.<br>";
    }
    else if($_POST['difficulte'] > 4 || $_POST['difficulte'] < 1) {
        $verif = false;
        $msg_error .= "La difficulté n'est pas valide !.<br>";
    }
    $verif = verifCarac("force") && verifCarac("agilite") && verifCarac("dexterite") && verifCarac("constitution");
    if ($verif) { 
		if($_POST['force'] + $_POST['agilite'] + $_POST['dexterite'] + $_POST['constitution'] != 40) {
        $verif = false;
        $msg_error .= "La somme des statistiques ne fait pas 40.<br>";
		}
    }
    if(!isset($_POST['login'])) {
        $verif = false;
        $msg_error .= "Aucune adresse mail n'as été renseignée.";
    }
    else if(!filter_var(urldecode($_POST['login']), FILTER_VALIDATE_EMAIL)) {
        $verif = false;
        $msg_error .= "L'adresse mail n'est pas valide.";
    }
    if(!isset($_POST['password'])) {
        $verif = false;
        $msg_error .= "Aucun mot de passe n'as été saisi.";
	}
	else if (!isStrongPassword($_POST['password'])) {
        $verif = false;
        $msg_error .= "Le mot de passe n'est pas conforme.";
    }
    else{
        $pseudonyme = htmlspecialchars($_POST["pseudonyme"]);
        $difficulte = htmlspecialchars($_POST["difficulte"]);
        $force = htmlspecialchars($_POST["force"]);
        $agilite = htmlspecialchars($_POST["agilite"]);
        $dexterite = htmlspecialchars($_POST["dexterite"]);
        $constitution = htmlspecialchars($_POST["constitution"]);
        $mail = htmlspecialchars($_POST["login"]);
        $password = htmlspecialchars($_POST["password"]);
        
        require("../model/infoBDD.php");
        require("../model/insertionPerso.php");
    }
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/png" href="img/epee.png" />
				
		<link href="css/stylePrincipal.css" rel="stylesheet"> 
		<title>
            <?php
                if($verif) { echo "Inscription réussie"; }
                else { echo "Inscription refusée"; }
            ?>
        </title>
    </head>
    <body>
        <?php
            if($verif) { 
                $msg_validation = "L'inscription a été réalisée avec succès, voici un récaputulatif :<br>";
                $msg_validation .= "Pseudonyme : ".$_POST['pseudonyme']."<br>";
                $msg_validation .= "Difficulté : ";
                switch ($_POST['difficulte']) {
                    case 1:
                        echo "Facile<br>";
                        break;
                    case 2:
                        echo "Normale<br>";
                        break;
                    case 3:
                        echo "Challenge<br>";
                        break;
                    case 4:
                        echo "Impossible<br>";
                        break;
                }
                $msg_validation .= "Force : ".$_POST['force']."<br>";
                $msg_validation .= "Agilité : ".$_POST['agilite']."<br>";
                $msg_validation .= "Dextérité : ".$_POST['dexterite']."<br>";
                $msg_validation .= "Constitution : ".$_POST['constitution']."<br>";
                $msg_validation .= "Login : ".$_POST['login']."<br>";
                $msg_validation .= "Mot de passe : ".$_POST['password']."<br>";
				echo $msg_validation;
            }
            else { echo $msg_error; }
        ?>

    </body>
</html>