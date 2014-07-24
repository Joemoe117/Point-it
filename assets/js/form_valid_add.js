/**
 *	Fonction JQuery permettant de vérifier que le formulaire pour ajouter des 
 * 	points est bien correct
 *
 *	@author Baptiste BALLAN
 *
 *	Verifie seulement si la description est assez longue pour le moment 
 */

$('form').submit(function () {
	var textarea = $.trim($('#textarea').val());

    // Check if description is larger than 20 characters and not empty
    if (name  === '' && textarea.length < 20 ) {
    	$('#error_add').css("display", "inline");
    	$('#error_add').text("Veuillez donner une description plus longue");
        return false;
    }
});