/*******************************************************************/
/***************************pagination******************************/
/*******************************************************************/

//Une pagination simple pour la gestion des commandes, 
$(".pagination a").live('click', function(){
	//il clique on recup le numéro de la page
	pagination = $(this).attr('class');
	split = pagination.split('-');
	split = split[1].split(' ');
	pagination = split[0];
	$.ajax({
		//via du ajax on crée la page correspondante et on lui injecte
		url: ROOT_URL+'?act=pagination&xml=1&page='+pagination,
		dataType:"xml",
		success:function(xml){
			$('#result-content').html($(xml).find('result').text());
		}
	});
});

$(".pagination li a").button();

$(".pagination li a").livequery(function() {
	$(this).button();
}
);

/*******************************************************************/
/*********************reservation-form.html************************/
/*******************************************************************/

//Bouton '+'
$("#bloc_reservation .billet .bottom .plus").live('click', function(){
	var nbbillet = $( "#nbbillet" );
	//le nombre de billet +1
	var nb = parseInt(nbbillet.val())+1; 
	var prixbase = $("#prixbase").val();
	//le prix sans reduc
	var prixbarre = nb*parseInt(prixbase);
	if(nb%2 == 0){
		//dans le cas où le nombre de billet est paire le prix correspond à 75% du prix sans reduc
		var prix = prixbase * (nb*0.75);
	}else{
		//dans le cas où le nombre de billet est impaire le prix correspond à 75% du prix sans reduc + un plein tarif
		var prix = prixbase * (((nb-1)*0.75)+1);
	}
	if(nbbillet.val()==1){
		//si on avait un seul billet, la class est différente, on change de style pour ajouter le prix barré
		//et on ajoute les nouveaux tarifs
		$( "#bloc_reservation .total .bottom .unbillet" )
			.replaceWith('<p class="plusieursbillets"><span>'+prixbarre+'€ TTC</span><br />'+prix+'€ TTC</p>');
	}
	else{
		//on ajoute les nouveaux tarifs
		$( "#bloc_reservation .total .bottom .plusieursbillets" )
		.replaceWith('<p class="plusieursbillets"><span>'+prixbarre+'€ TTC</span><br />'+prix+'€ TTC</p>');
	}
	//on ajoute le nouveau nombre de billet dans le champ
	$("#nbbillet").replaceWith('<input type="text" name="nbbillet" id="nbbillet" size="4" value="'+nb+'" />');
	//on ajoute le nombre de billet dans l'input hidden pour le récupérer avec l'envoie du formulaire
	$("#nb_billet").replaceWith('<input type="hidden" value="'+nb+'" id="nb_billet" name="nb_billet" />');
});

//Bouton '-'
$("#bloc_reservation .billet .bottom .moins").live('click', function(){
	var nbbillet = $( "#nbbillet" );
	//le nombre de billet -1
	var nb = parseInt(nbbillet.val())-1;
	var prixbase = $("#prixbase").val();
	//le prix sans reduc
	var prixbarre = nb*parseInt(prixbase);
	if(nb%2 == 0){
		//dans le cas où le nombre de billet est paire le prix correspond à 75% du prix sans reduc
		var prix = prixbase * (nb*0.75);
	}else{
		//dans le cas où le nombre de billet est impaire le prix correspond à 75% du prix sans reduc + un plein tarif
		var prix = prixbase * (((nb-1)*0.75)+1);
	}
	if(nbbillet.val()==2){
		//si on avait deux billets, la class est différente, on change de style pour enlever le prix barré qui devient useless
		//et on ajoute les nouveaux tarifs
		$( "#bloc_reservation .total .bottom .plusieursbillets" )
			.replaceWith('<p class="unbillet">'+prixbase+'€ TTC</p>');
	}
	else{
		//si on avait un seul billet, la classe est différente et il ne remplace rien donc pas de pb
		//on ajoute les nouveaux tarifs
		$( "#bloc_reservation .total .bottom .plusieursbillets" )
		.replaceWith('<p class="plusieursbillets"><span>'+prixbarre+'€ TTC</span><br />'+prix+'€ TTC</p>');
	}
	if(nb>0){
		//si le nombre de billet est plus grand ou égal à 1
		//on ajoute le nouveau nombre de billet dans le champ
		$("#nbbillet").replaceWith('<input type="text" name="nbbillet" id="nbbillet" size="4" value="'+nb+'" />');
		//on ajoute le nombre de billet dans l'input hidden pour le récupérer avec l'envoie du formulaire
		$("#nb_billet").replaceWith('<input type="hidden" value="'+nb+'" id="nb_billet" name="nb_billet" />');
	}
});

$( "#pro" ).change(function(){
	//on ajoute l'info dans l'input hidden pour le récupérer avec l'envoie du formulaire
	$("#part_pro").replaceWith('<input type="hidden" value="professionnel" id="part_pro" name="part_pro" />');
});

$( "#part" ).change(function(){
	//on ajoute l'info dans l'input hidden pour le récupérer avec l'envoie du formulaire
	$("#part_pro").replaceWith('<input type="hidden" value="particulier" id="part_pro" name="part_pro" />');
});


//======mise en forme des boutons avec jquery ui
$( "#bottom-recap button" ).button();

$( "#bloc_reservation .billet .bottom .plus").button();

$( "#bloc_reservation .billet .bottom .moins").button();

$( "#form_reservation button" ).button();
//===========

/**bouton de confirmation du formulaire**/
$("#form_reservation button").live('click', function(){
	//=====Récupération des variables
	var nom = $( "#nom" ),
	email = $( "#email" ),
	prenom = $( "#prenom" ),
	cp = $( "#cp" ),
	adresse = $( "#adresse1" ),
	ville = $( "#ville" ),
	confirmemail = $( "#confirmemail" ),
	civilite = $( "#civilite" ),
	msgmail = $ ( "#bloc_formulaire .body .right span" );
	//==========
	
	/*
	 * Fonction de vérification de la longueur de la chaine
	 * @params o chaine a vérifier
	 * 		   n nom de la chaine
	 * 		   min taille minimum de la chaine
	 * 		   maw taille maximum de la chaine
	 * @return boolean
	 */
	function checkLength( o, n, min, max ) {
		if ( o.val().length > max || o.val().length < min ) {
			//si c'est trop petit ou trop grand on ajoute une classe d'erreur jquery ui et on retourne faux
			o.addClass( "ui-state-error" );
			return false;
		}
		else{
			//sinon on vire la classe si elle existe et on retourne vrai
			o.removeClass( "ui-state-error");
			return true;
		}
	}

	/*
	 * Fonction de teste de la correspondance entre une chaine de caractère et une regex
	 * @params o chaine a vérifier
	 * 		   regexp regex 
	 * 		   n nom de la chaine
	 * @return boolean
	 */
	function checkRegexp( o, regexp, n ) {
		if ( !( regexp.test( o.val() ) ) ) {
			//si ça ne correspond pas on ajoute une classe d'erreur jquery ui et on retourne faux
			o.addClass( "ui-state-error" );
			return false;
		}
		else{
			//sinon on vire la classe si elle existe et on retourne vrai
			o.removeClass( "ui-state-error");
			return true;
		}
	}
	
	//on crée une variable valid qui est vrai
	var valid = true;
	
	if(civilite.val()==""){
		//si la civilite n'est pas renseignée on la met en rouge et on met valid a false
		civilite.css("color","red");
		valid = false;
	}
	else{
		//sinon on la laisse en noir (ou on la remet en noir) et on met valid a vrai
		civilite.css("color","black");
		valid = true;
	}
	
	//===== Teste les variables, longueur et regex
	valid = valid && checkLength( nom, "nom", 3, 16 );
	valid = valid && checkRegexp( nom, /^[a-zA-Z]+[ \-']?[[a-zA-Z]+[ \-']?]*[a-zA-Z]+$/);
	valid = valid && checkLength( prenom, "prenom", 3, 16 );
	valid = valid && checkRegexp( prenom, /^[a-zA-Zéèêëçäà]+[ \-']?[[a-zA-Zéèêëçäà]+[ \-']?]*[a-zA-Zéèêëçäà]+$/);
	valid = valid && checkLength( adresse, "adresse", 6, 80 );
	valid = valid && checkLength( cp, "cp", 4, 6 );
	valid = valid && checkRegexp( cp, /^[0-9]+$/i);
	valid = valid && checkLength( ville, "ville", 2, 16 );
	valid = valid && checkRegexp( ville, /^[a-zA-Zéèêëçäà]+[ \-']?[[a-zA-Zéèêëçäà]+[ \-']?]*[a-zA-Zéèêëçäà]+$/);
	valid = valid && checkLength( email, "email", 6, 80 );
	valid = valid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
	//==========
	
	if(email.val()!=confirmemail.val() && valid){
		//Si le mail et le mail de confirmation ne correspondent pas on ajoute une classe d'erreur sur le mail de confirmation
		confirmemail.addClass( "ui-state-error" );
		//on rend visible le message informant le client de son erreur
		msgmail.css("visibility", "visible");
		valid = valid && false;
	}
	else if(email.val()==confirmemail.val()){
		//si ça correspond on ajoute vrai et on supprime la classe d'erreur
		valid = valid && true;
		confirmemail.removeClass( "ui-state-error" );
		//on rend invisible le message informant le client de son erreur
		msgmail.css("visibility", "hidden");
	}
	
	if(valid){
		//si tout est ok valid sera true, on envoie
		$("form").submit();
	}
});



/*******************************************************************/
/*********************reservation-recap.html************************/
/*******************************************************************/

//Bouton modifier
$( "#bottom-recap .modif" ).click(function(){
	//on reviens en arrière
	javascript:history.back();
});

//Bouton valider
$( "#bottom-recap .valid" ).click(function(){
	//recup le checkbox cgv
	var cgv = $( "#cgv:checked" );
	
	//il faut que le client coche 
	if (cgv.val()=="on"){
		
		$.ajax({
			//action d'ajout dans la base de donnée des infos du client + envoie mail/generation pdf
			url: ROOT_URL+'?act=addclient', 
			success:function(){
				//si tout est fait, on l'indique au client
				alert('Vos informations ont bien été enregistrées, un message vous sera envoyé prochainement !');
			}
		});
	}
	else{
		//le client n'a pas coché on lui indique qu'il doit le faire
		alert('Vous devez indiquer que vous avez lu et que vous accepter les conditions générales de vente.');
	}
});


/*******************************************************************/
/*********************gestion-entrees.html**************************/
/*******************************************************************/

//=====mise en forme des boutons jquery ui
$( "#gestion-entrees .authentification" ).button();

$( "#tabs-1 .recherche" ).button();

$( "#tabs-2 .recherche" ).button();

$(" #gestion-commande .quit ").button();
//==========
/*
//Authentification
$("#gestion-entrees .authentification").live('click', function(e){
	if( $( "#gestion-entrees #identifiant" ).val()!="" && $( "#gestion-entrees #password" ).val()!="")
	{
		//si on a un login+password
		$.ajax({
			//on essaie de le logger
			url: ROOT_URL+'?act=login&ident='+$( "#gestion-entrees #identifiant" ).val()+'&pass='+$( "#gestion-entrees #password" ).val(),
			success:function(){
				//si ça fonctionne, on refresh la page, les variables en session permettront l'accès aux infos
				window.location.reload();
			}
		});
	}
	
});
*/
/**Fonction de mise en forme des onglets avec jquery ui**/
$(function() {
	$( "#tabs" ).tabs();
});

//quitte la session
$("#tabs .quit, #gestion-commande .quit").live('click', function(){
	$.ajax({
		//on deconnecte l'user
		url: ROOT_URL+'?act=logout',
		success:function(){
			//et on le redirige vers la page d'authentification
			window.location.href = ROOT_URL+"authentification.html";
		}
	});
});

//Recherche/scan d'une commande par un numéro de billet
$("#tabs-1 .recherche").live('click', function(){
	var num = $( "#numbillet" );
	if(num.val()!=''){
		num.removeClass( "ui-state-error" );
		$.ajax({
			//action de recherche 
			url: ROOT_URL+'?act=recherche&xml=1&recherche=billet&num='+num.val(),
			dataType:"xml",
			success:function(xml){
				//recupération des resultats via du xml
				$('#tabs-1 .result-content').html($(xml).find('result').text());
			}
		});
	}
	else{
		//si le champ est vide = ajout d'une classe d'erreur ui
		num.addClass( "ui-state-error" );
	}
});

//Recherche d'un client par son nom
$("#tabs-2 .recherche").live('click', function(){
	var nom = $( "#nomclient" );
	if(nom.val()!=''){
		nom.removeClass( "ui-state-error" );
		$.ajax({
			//action de recherche
			url: ROOT_URL+'?act=recherche&xml=1&recherche=client&nom='+nom.val(),
			dataType:"xml",
			success:function(xml){
				//recupération des resultats via du xml
				$('#tabs-2 .result-content').html($(xml).find('result').text());
			}
		});
	}
	else{
		//si le champ est vide = ajout d'une classe d'erreur ui
		nom.addClass( "ui-state-error" );
	}
});


/*******************************************************************/
/*********************gestion-commande.html************************/
/*******************************************************************/

//Affichage des détails d'une commande
$("table td .details").live('click', function(){
	//recup du numéro de commande contenu dans la class du lien
	var commande = $(this).attr('class');
	split = commande.split(' ');
	commande = split[1].split('-');
	commande = commande[1];
	$.ajax({
		//action de recherche des details
		url: ROOT_URL+'?act=details-commande&xml=1&commande='+commande,
		dataType:"xml",
		success:function(xml){
			//récupération des détails via du xml et injection dans la page via ajax
			$('#result-details-commande').html($(xml).find('result').text());
			$(function() {
				//Fonction d'ouverture d'une "pop-up" via jquery ui
				//il récupére les details de la recherche dans la page et l'insére dans la "pop-up"
				$( "#dialog:ui-dialog" ).dialog( "destroy" );
				$( "#dialog-message" ).dialog({
					width: 666,
					modal: true,
					buttons: {
						Retour: function() {
							$( this ).dialog( "close" );
						}
					}
				});
			});
		}
	});
});

//Génération de la facture
$("table td .facture").live('click', function(){
	//recup du numéro de commande contenu dans la class du lien
	var commande = $(this).attr('class');
	split = commande.split(' ');
	commande = split[1].split('-');
	commande = commande[1];
	if(confirm('Voulez vous générer le pdf de la facture ?')){
		//si il clique sur ok, on l'envoie vers un lien qui générera la facture correspondante au numéro de la commande
		window.location.href = ROOT_URL+"?view=generateFacturePdf&output=1&commande="+commande;
	}
});

//Fonction d'envoie des billets à un client
$("table td .billets").live('click', function(){
	//recup du numéro de commande et du nom/prenom client contenu dans la class du lien
	var info = $(this).attr('class');
	var split = info.split(' ');
	var infoclient = new Array();
	infoclient[0] = split[1];
	var i = 2;
	while(split[i]){
		infoclient[i-1] = split[i];
		i++;
	}
	infoclient = infoclient.join(' ');
	split = infoclient.split('+');
	commande = split[1];
	nom = split[2];
	prenom = split[3];
	if(confirm('Voulez vous envoyer les billets à '+prenom+' '+nom+' ?')){
		$.ajax({
			//si il est ok on réenvoie les billets au client via l'action mail
			url: ROOT_URL+'?act=mail&billet=oui&commande='+commande,
			success:function(){
				//et bien sur on l'informe du succes de l'opération commando d'élite
				alert('Billets envoyés !');
			}
		});
	}
});
