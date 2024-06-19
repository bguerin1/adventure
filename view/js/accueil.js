// Fonction permettant de vérifier si l'adresse email est correcte
// La règle utilisée ici dans l'expression régulière est normée
// Paramètre : emailAVerifier chaine de caractères contenant l'adresse email à valider
// Sortie : la fonction renvoie vraie si l'adresse est correctre, faux sinon
function validationEmail(emailAVerifier) {
	let reponse=false;
	let expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
	if (expressionReguliere.test(emailAVerifier))
	{ 
		reponse=true;
	}
	return(reponse);
}

function validationMotDePasse(mdpAVerifier)
{
	let reponse=false;	
	if (mdpAVerifier.match( /[0-9]/g) &&                // Il y a un chiffre
			mdpAVerifier.match( /[A-Z]/g) &&            // Il y a une majuscule
			mdpAVerifier.match(/[a-z]/g) &&             // il y a une minuscule 
			mdpAVerifier.match( /[^a-zA-Z\d]/g))        // il y a un caractère spécial
	{
		reponse=true;
	}
	return(reponse);
}

// Ecouteur permettant de valider complètement le formulaire d'inscription au moment du submit
// Si au moins un des champs n'est pas correctement renseigné, le formulaire n'est pas soumis
document.addEventListener('DOMContentLoaded', function() {
	const POINT_TOTAL=40;
	// Récuparation de l'objet formulaire
	let formInsc  = document.getElementById('formInscription');
	// Ajout d'une écoute sur la fonction submit du formulaire
	// La fonction sera interrompue et la fonction de vérification sera jouée 
	formInsc.addEventListener("submit", function (event) {
		let inscriptionValide = true;
		// On efface les messages d'erreurs
		document.getElementById("form2AvatarNomError").className="";		
		document.getElementById("form2DifficulteError").className="";
		document.getElementById("form2CaracError").className="";
		document.getElementById("form2LoginError").className="";
		document.getElementById("form2MdpError").className = "";
		document.getElementById("form2AvatarNomError").innerHTML="";
		document.getElementById("form2DifficulteError").innerHTML="";		
		document.getElementById("form2CaracError").innerHTML="";
		document.getElementById("form2LoginError").innerHTML="";
		document.getElementById("form2MdpError").innerHTML = "";

		// On vérifie qu'un nom a été saisi
		if (document.getElementById("form2AvatarNom").value=="")
		{
			errorHTML="Vous devez choisir un nom pour votre avatar !";
			document.getElementById("form2AvatarNomError").innerHTML = errorHTML	
			document.getElementById("form2AvatarNomError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// On vérifie qu'une difficulté a été sélectionnée
		if (document.getElementById("form2Difficulte").value=="0")
		{
			errorHTML="Vous devez sélectionner une difficulté !";
			document.getElementById("form2DifficulteError").innerHTML = errorHTML	
			document.getElementById("form2DifficulteError").className="formErrorMsg";
			inscriptionValide=false;
		}

		// On vérifie que le total des caractéristiques fait bien POINT_TOTAL
	    let force = Number(document.getElementById("form2force").value);
		let agilite = Number(document.getElementById("form2agilite").value);
		let dexterite = Number(document.getElementById("form2dexterite").value);
		let constitution = Number(document.getElementById("form2constitution").value);
		let totalCarac = force + agilite + dexterite + constitution;
		if (totalCarac!=40)
		{
			errorHTML=" Le montant total des caracteristiques doit être de "+POINT_TOTAL+" !";
			document.getElementById("form2CaracError").innerHTML = errorHTML	
			document.getElementById("form2CaracError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// On vérifie que le login est valide en appelant la fonction ValidationEmail
	  	if (!validationEmail(document.getElementById("form2Login").value))
		{
			errorHTML=" L'adresse email n'est pas valide !";
			document.getElementById("form2LoginError").innerHTML = errorHTML
			document.getElementById("form2LoginError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// On vérifie que le mot de passe est conforme
		if(!validationMotDePasse(document.getElementById("form2Mdp").value))
		{
			errorHTML=" Le mot de passe doit contenir :<br> Une majuscule, une minuscule, un chiffre, un caractère spécial!";
			document.getElementById("form2MdpError").innerHTML = errorHTML;
			document.getElementById("form2MdpError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// Si un des champs n'est pas valide on prévient la soumission du formulaire
		// On reste sur la page d'accueil
		if (!inscriptionValide) {
			event.preventDefault();
		}
	}, false);
});

// Ecouteur permettant de valider complètement le formulaire de connexion au moment du submit
// Si au moins un des champs n'est pas correctement renseigné, le formulaire n'est pas soumis

document.addEventListener('DOMContentLoaded', function() {
	let formInsc  = document.getElementById('formConnexion');
	// on ajoute une écoute sur l'évennement submit du formulaire
	formInsc.addEventListener("submit", function (event) {
		let inscriptionValide = true;
		// On vide les messages d'erreurs
		document.getElementById("form1LoginError").className="";
		document.getElementById("form1MdpError").className = "";
		document.getElementById("form1LoginError").innerHTML="";
		document.getElementById("form1MdpError").innerHTML = "";

		// On vérifie l'adresse email avec la fonction validationEmail
	  	if (!validationEmail(document.getElementById("form1Login").value))
		{
			errorHTML=" L'adresse email n'est pas valide !";
			document.getElementById("form1LoginError").innerHTML = errorHTML
			document.getElementById("form1LoginError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// A On vérifie si un mot de passe est saisi
		if (document.getElementById("form1Mdp").value=="")
		{
			errorHTML="Vous devez saisir un mot de passe !";
			document.getElementById("form1MdpError").innerHTML = errorHTML
			document.getElementById("form1MdpError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// Si un des champs n'est pas valide on prévient la soumission du formulaire
		// On reste sur la page d'accueil
		if (!inscriptionValide) {
			event.preventDefault();
		}
	}, false);
});

