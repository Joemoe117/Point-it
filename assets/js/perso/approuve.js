/**
*	Javascript permettant d'approuver un point en ajax 
*	@author ballanb
*	@param	idPoint		l'id de du point approuvé
*	@param	idProfil	l'id du profil de la personne qui approuve
*
*
*/
function approuve(idPoint, component){

	// construction de l'URL
	url = urlApprouve.url + "/" + idPoint;

	// appel ajax
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'html',


		// réussite de l'appel
		success: function(res) {

			spanInsert = $(component).parent(); // on récupère le span parent
			$(spanInsert).empty();				// on le vide
			$(spanInsert).append(res);			// on ajoute le résultat de la vue dedans
		},

		// erreur de l'appel
		error: function(res, statut, erreur) {
			alert('error'); // à améliorer	
		}
	});
}

