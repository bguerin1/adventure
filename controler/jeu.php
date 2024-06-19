<?php
require("view/header.php");
session_start();
require("connexion.php");
  // Lecture d'une valeur du tableau de session 
if (isset($_SESSION['mail']))
{
    $conn=new PDO("mysql:host=$servername;dbname=$dbname", $username,$pwd);
    $requete2 = $conn -> prepare("SELECT NOMPERSONNAGE,FORCEP,AGILITEP,DEXTERITEP,CONSTITUTIONP FROM PERSONNAGE JOIN JOUEUR ON JOUEUR.IDJOUEUR= PERSONNAGE.IDJOUEUR WHERE ADRJOUEUR=:mail");
    $requete2-> bindValue(":mail",$_SESSION["mail"], PDO::PARAM_STR);
    $requete2->execute();
    $data = $requete2 -> fetchALL(PDO::FETCH_ASSOC);
    foreach($data as $donnee)
    {
        echo "<br>";
        echo "<br>";
        echo $donnee["NOMPERSONNAGE"] . "<br>";
        echo $donnee["FORCEP"] . "<br>";
        echo $donnee["AGILITEP"] . "<br>";
        echo $donnee["DEXTERITEP"] . "<br>";
        echo $donnee["CONSTITUTIONP"] . "<br>";
    }
}
else{
    echo "retourne chez maman !";
}
?>
</body>
</html>