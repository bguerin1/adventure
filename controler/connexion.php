<?php
if (!isset($_POST["mail"]) || !isset($_POST["mdp"])) {
    header("Location: index.php");
}
else{
    $mail=htmlspecialchars($_POST["mail"]);
    $mdp=htmlspecialchars($_POST["mdp"]);
    if($mail=="")
    {
        echo "L'adresse mail est vide";
    }
    else if($mdp=="")
    {
        echo "Le mot de passe est vide";
    }
    else{
        require("model/connexionBDD.php");
    }
    }
?>
