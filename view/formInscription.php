<div class="col">
					<h2>Nouveau Joueur ?<br/>Créer votre avatar</h2>
					<form  action="inscription.php" method="post" id="formInscription">
						<div class="form-group row" >
							<div class="col">
								<input id="form2AvatarNom" size="40" placeholder="Nom de l'avatar" class="form-control" name="pseudonyme">
								<div id="form2AvatarNomError"></div>
							</div>
						</div>
						<div class="form-group row" >
							<div class=" col">
								<select id="form2Difficulte" class="form-control" name="difficulte">
									<option value="0" selected hidden>Difficulté...</option>
									<option value="1">Facile</option>
									<option value="2">Normale</option>
									<option value="3">Challenge</option>
									<option value="4">Impossible</option>
								</select>
							</div>
							<div id="form2DifficulteError"></div>
						</div>
						<!-- Force	-->
						<div class="form-group row" >
							<div class="col-3">
								<label for="form2force" class="col-form-label">Force</label></div>
							<div class="col-5">
								<div class="input-group">
							        <div class="input-group-prepend">
										<div class="input-group-text" id="inputGroupPrepend1"><div onclick="modifCar('force',-1);" style="cursor:pointer;"><img src="../img/arrow_left.png" alt="" title="Moins" /></div></div>
									</div>
									<input id="form2force"  placeholder="Force" class="form-control" value=10 name="force">
									<div class="input-group-append">
										<div class="input-group-text" id="inputGroupAppend1"><div onclick="modifCar('force',1);" style="cursor:pointer;"><img src="../img/arrow_right.png" alt="" title="Plus" /></div></div>	
									</div>
								</div>
							</div>
							<div class="col-4">
								<input id="form2forceBM" class="form-control" value=0 disabled>
							</div>
						</div>
						<!-- Agilité -->
						<div class="form-group row" >
							<div class="col-3">
								<label for="form2agilite" class="col-form-label">Agilité</label></div>
							<div class="col-5">
								<div class="input-group">
							        <div class="input-group-prepend">
										<div class="input-group-text" id="inputGroupPrepend2"><div onclick="modifCar('agilite',-1);" style="cursor:pointer;"><img src="../img/arrow_left.png" alt="" title="Moins" /></div></div>
									</div>
									<input id="form2agilite"  placeholder="Agilité" class="form-control" value=10 name="agilite">
									<div class="input-group-append">
										<div class="input-group-text" id="inputGroupAppend2"><div onclick="modifCar('agilite',1);" style="cursor:pointer;"><img src="../img/arrow_right.png" alt="" title="Plus" /></div></div>	
									</div>
								</div>
							</div>
							<div class="col-4">
								<input id="form2agiliteBM" class="form-control" value=0 disabled>
							</div>
						</div>
						<!-- Dextérité -->
						<div class="form-group row" >
							<div class="col-3">
								<label for="form2dexterite" class="col-form-label">Dextérité</label></div>
							<div class="col-5">
								<div class="input-group">
							        <div class="input-group-prepend">
										<div class="input-group-text" id="inputGroupPrepend3"><div onclick="modifCar('dexterite',-1);" style="cursor:pointer;"><img src="../img/arrow_left.png" alt="" title="Moins" /></div></div>
									</div>
									<input id="form2dexterite"  placeholder="Dextérité" class="form-control" value=10 name="dexterite">
									<div class="input-group-append">
										<div class="input-group-text" id="inputGroupAppend3"><div onclick="modifCar('dexterite',1);" style="cursor:pointer;"><img src="../img/arrow_right.png" alt="" title="Plus" /></div></div>	
									</div>
								</div>
							</div>
							<div class="col-4">
								<input id="form2dexteriteBM" class="form-control" value=0 disabled>
							</div>
						</div>
						<!-- Constitution -->
						<div class="form-group row" >
							<div class="col-3">
								<label for="form2constitution" class="col-form-label">Constitution</label></div>
							<div class="col-5">
								<div class="input-group">
							        <div class="input-group-prepend">
										<div class="input-group-text" id="inputGroupPrepend4"><div onclick="modifCar('constitution',-1);" style="cursor:pointer;"><img src="../img/arrow_left.png" alt="" title="Moins" /></div></div>
									</div>
									<input id="form2constitution"  placeholder="Constitution" class="form-control" value=10 name="constitution">
									<div class="input-group-append">
										<div class="input-group-text" id="inputGroupAppend4"><div onclick="modifCar('constitution',1);" style="cursor:pointer;"><img src="../img/arrow_right.png" alt="" title="Plus" /></div></div>	
									</div>
								</div>
							</div>
							<div class="col-4">
								<input id="form2constitutionBM" class="form-control" value=0 disabled>
							</div>
						</div>
						<div id="form2CaracError"></div>
						
						<!-- Login Mot de passe -->

							<div class="form-group row" >
								<div class="col">
									<input id="form2Login" placeholder="Adresse mail" class="form-control" name="login">
									<div id="form2LoginError"></div>
								</div>
							</div>
							<div class="form-group row" >
								<div class="col"><input type="password" id="form2Mdp" placeholder="Mot de passe" class="form-control" name="password">
									<div id="form2MdpError" ></div>
								</div>
							</div>
						<input type="submit" id="btnInscrire"> 
					</form>
				</div>
			</div>
		</div>