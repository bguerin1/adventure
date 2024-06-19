<div class="col">
	<img class="auCentre" src="img/LogoAventure.jpg"/>
	<h2>Déjà inscrit !</h2>
	<form action="jeu.php" method="post" id="formConnexion">
		<div class="form-group row" >
			<div class="col">
				<input id="form1Login" placeholder="Adresse mail" class="form-control" name="mail">
				<div id="form1LoginError"></div>
			</div>
		</div>
		<div class="form-group row" >
			<div class="col"><input type="password" id="form1Mdp" placeholder="Mot de passe" class="form-control" name="mdp">
				<div id="form1MdpError" ></div>
			</div>
		</div>
		<input type="submit" id="btnConnecter" value="Se Connecter" />  
	</form>
</div>