/******
/*	Fonction pour afficher 10 points supplémentaires à la timeline
/*
/*****/

// Variables globales définis dans "view_timeline.php" car l'URL pour récupérer les points doit-être interprété par PHP

$('#add_old_points').click(function() {
	// On rajoute en argument à l'URL le nombre de points que l'on souhaite et à partir de quel point on commence
	var url = getPointsVar.url+'/'+getPointsVar.nb+'/'+getPointsVar.limit;

	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'html',
		success: function(res, statut) {
			// Si le résultat est vide alors il n'y a plus de point à afficher
			if (res === '') {
				$('<div class="alert alert-info" role="alert"><p>Il n\'y a plus de points à afficher</p></div>')
					.appendTo('#points_block');
				$('#add_old_points').remove();
			}

			else {
				$('#error_get_points').remove(); // On supprime la bulle d'erreur si il y en avait une
				$(res).appendTo('#points_block');
				$('#add_old_points').appendTo('#points_block');
				getPointsVar.limit = getPointsVar.limit + getPointsVar.nb;
			}
		},
		error: function(res, statut, erreur) {
			$('<div id="error_get_points" class="alert alert-danger" role="alert"><p>Une erreur est survenu lors du chargement des points</p><p>'+ erreur +'</p></div>')
				.appendTo('#points_block');			
		}
	});
});

