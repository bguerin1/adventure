<?php

// Caractéristiques du personnage
$for = 15;
$dex = 12;
$agi = 8;
$con = 9;

// Bonus/malus des caractéristiques
$bmFor = $for - 10;
$bmDex = $dex - 10;
$bmAgi = $agi - 10;
$bmCon = $con - 10;

// Points de vie du personnage (entre 20 et 30 points aléatoires)
$pointsDeVie = rand(20, 30) +$bmCon;

// Armure de base
$armurePersonnage = 10 + $bmAgi;

// Monstre
$nomMonstre = "Élémentaire mineur";
$pointsDeVieMonstre = 25;
$resistanceMonstre = 3;
$bonusToucherMonstre = 5;
$armureMonstre = 10;

// Combat
$round = 1;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
    <style>
    </style>
    <title>Fiche de Personnage</title>
</head>
<body>

<div class="character-sheet">
    <h2>Fiche de Personnage</h2>

    <div class="attribute"><span>Force:</span><span><?= $for ?></span></div>
	<div class="attribute"><span>Dextérité:</span><span><?= $dex ?></span></div>
    <div class="attribute"><span>Agilité:</span><span><?= $agi ?></span></div>
    <div class="attribute"><span>Constitution:</span><span><?= $con ?></span></div>

    <div class="attribute"><span>Points de Vie:</span><span><?= $pointsDeVie ?></span></div>

    <!-- Comnbat -->

    <div class="combat-log">
        <h3>Combat</h3>
        <?php
			while ($pointsDeVie > 0 && $pointsDeVieMonstre > 0) {
				// Jet de toucher pour le personnage
				$jetDeToucherPersonnage = rand(1, 20) + $bmDex;
				
				// Si le personnage touche le monstre
				if ($jetDeToucherPersonnage > $armureMonstre) {
					// Calcul des dégâts
					$degatsPersonnage = rand(1,6) + $bmFor;
					$degatsPersonnage -= $resistanceMonstre;

					if ($degatsPersonnage<1){
						echo "<p>Tour $round - L'attaque du personnage ne passe pas la résistance du monstre.</p>";
					} else {
						// Affichage des dégâts infligés
						echo "<div class='combat-ligne'>Tour $round - Personnage frappe :<br>";
						echo "<span>Action :</span> Dégâts<br>";
						echo "<span>Montant :</span> $degatsPersonnage<br>";
						echo "<span>PV restants du monstre :</span> " . max(0, $pointsDeVieMonstre - $degatsPersonnage) . "</div>";

						// Mise à jour des points de vie du monstre
						$pointsDeVieMonstre -= $degatsPersonnage;						
					}
				} else {
					// Si le personnage ne touche pas
					echo "<p>Tour $round - Personnage rate son attaque.</p>";
				}

				// Si le monstre est toujours en vie
				if ($pointsDeVieMonstre > 0) {
					// Jet de toucher pour le monstre
					$jetDeToucherMonstre = rand(1, 20) + $bonusToucherMonstre;

					// Si le monstre touche le personnage
					if ($jetDeToucherMonstre > ($armurePersonnage + $bmAgi)) {
						// Calcul des dégâts
						$degatsMonstre = rand(1, 6) + 2;

						// Affichage des dégâts infligés
						echo "<div class='combat-ligne'>Tour $round - Monstre frappe :<br>";
						echo "<span>Action :</span> Dégâts<br>";
						echo "<span>Montant :</span> $degatsMonstre<br>";
						echo "<span>PV restants du personnage :</span> " . max(0, $pointsDeVie - $degatsMonstre) . "</div>";

						// Mise à jour des points de vie du personnage
						$pointsDeVie -= $degatsMonstre;
					} else {
						// Si le monstre ne touche pas
						echo "<p>Tour $round - Monstre rate son attaque.</p>";
					}
				}

				// Passage au tour suivant
				$round++;
			}

			// Affichage du résultat du combat
			if ($pointsDeVie <= 0) {
				echo "<p><strong>Le personnage est mort.</strong></p>";
			} else {
				echo "<p><strong>Le monstre a été vaincu !</strong></p>";
			}
		?>
    </div>
</div>

</body>
</html>
