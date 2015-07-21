<div class="container">
	<?php if ($this->session->flashdata('first_visit')): ?>
		<div class="alert alert-info">
			Tu es maintenant inscrit et connecté. Bravo !!!
		</div>
	<?php endif ?>

	<!-- Timeline -->
	<div class="col-md-7" id="points_block">
		<div class="bandeau">
			<span class="bandeau-texte">Les derniers exploits</span>
		</div>
			<?php if ($this->session->flashdata('first_visit')): ?>
				<div class="alert alert-info">
					Voici la Timeline, c'est ici que tu verras les exploits de tes petits copains et les commentaires d'encouragement qui vont avec.
				</div>
			<?php endif ?>

		<?php foreach ($points as $point): ?>
			<?php $data["point"] = $point; ?>
			<?php $this->load->view("component/component_point.php", $data );?>
		<?php endforeach ?>

		<button id="add_old_points" class="btn btn-primary pull-right">Points plus anciens</button>
	</div>

	<!-- Formulaire d'ajout de point -->
	<div class="col-md-5">
		<?php $this->load->view("component/component_changelog.php");?>
	</div>

	<script type="text/javascript">
		// On déclare les variables globales ainsi que l'URL pour le script "get_points.js" pour que PHP interprete l'URL à appeler
		var getPointsVar = {
			url: '<?= site_url("timeline/get_points/") ?>',
			nb: <?= $point_by_page_add ?>,
			limit: <?= $point_by_page ?>
		};

		var urlApprouve = {
			url: '<?= site_url("ajax/addApprouve/") ?>'
		}
	</script>

	<script>
		$( ".point_haut" ).click(function(e) {
			// click sur le bouton approuver - on affiche pas la zone de commentaire
			if($(e.target).is("#approuve")){
	            e.preventDefault();
	            return;

	        // sinon, on affiche la zone de commentaire
	  		} else {
	  			$(this).next(".zone_commentaire" ).toggle( "blind", 400 );
	  		}
		});
	</script>
</div>
