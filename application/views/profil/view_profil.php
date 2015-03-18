<div class="container">
	<div class="col-md-7">
		<div class="bandeau">
			<span class="bandeau-texte"><?=$profil->profil_nom ?></span>
		</div>
		<div class="row" style="background:white; margin-bottom: 10px;">
			<div class="col-md-3">
				<img src="<?=$profil->profil_image ?>" class="img-rounded" width="100%" height="100%">
			</div>
			<div class="col-md-9" >	
				<table class="table">
					<th>Type de point</th>
					<th>Nombre</th>
					<?php foreach ($table_point as $tpoint): ?>
						<tr>
							<td><?= $tpoint->typept_nom?></td>
							<td><?= $tpoint->nombre?></td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
		<?php foreach ($points as $point): ?>
			<?php $data["point"] = $point; ?>
			<?php $this->load->view("component/component_point.php", $data );?>
		<?php endforeach ?>

	</div>

	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading bleu"><span class="glyphicon glyphicon-stats"></span>   Statistique</div>
			<div class="panel-body">
				<h3>Général</h3>
				<h5>Nombre de points :</h5>
				<?=$nbPoint?>
				<h5>Nombre de commentaires :</h5>
				<?=$nbCommentaire?>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	// On déclare les variables globales ainsi que l'URL pour que PHP interprete l'URL à appeler
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


