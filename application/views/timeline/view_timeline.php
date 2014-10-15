<div class="container main">
	<?php if ($this->session->flashdata('first_visit')): ?>
		<div class="alert alert-info">
			Tu es maintenant inscrit et connecté. Bravo !!!
		</div>
	<?php endif ?>

	<!-- Timeline -->
	<div class="col-md-7 central" id="points_block">
		<div class="bandeau">
			<span class="bandeau-texte">Timeline</span>
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
	<div class="col-md-5 secondaire">
		<div class="panel panel-default">
			<div class="panel-heading bleu"><span class="glyphicon glyphicon-edit"></span>  Distribuer un point</div>
			<div class="panel-body">
				<form role="form" id="form_add_point" method="post" action="<?php echo site_url("timeline/add_point"); ?>">
					<div class="control-group">
						<label for="multiple" class="control-label">Personne(s)</label>
						<div class="controls">
							<select id="select_nom" class="select2" multiple name="personnes[]" style="width:100%;" minlengt="20" required>
								<?php foreach ($form_profil as $value): ?>
									<option value="<?=$value->profil_id?>">  <?=$value->profil_nom?> </option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="form-group">
					<label>Point</label>

					<!-- Génération de la dropdown des points -->
					<select class="form-control" name="point" required>
						<?php foreach ($form_point as $value): ?>
							<option value="<?=$value->typept_id?>">Point <?=$value->typept_nom?> </option>
						<?php endforeach ?>
					</select>

					<label>Description</label>
					<textarea id="textarea" placeholder="Allez là !" class="form-control" name="texte_point" rows="3" cols="50"></textarea>
					</div>
					<?php if (isset($error) ): ?>
						<div id="alert_form_add" class="alert alert-danger"><?=$error?></div>
					<?php endif ?>

					<div class="checkbox">
						<label>
							<input type="checkbox"> Epique
						</label>
					</div>
					<label>Date (facultatif)</label><br>
					<input id="date_point" type="text" name="date" placeholder="aaaa-mm-jj">

					<button type="submit" class="btn btn-default pull-right">Prends-ça !</button>
				</form>
			</div>
		</div>

		<?php if ($this->session->flashdata('first_visit')): ?>
			<div class="alert alert-info">
				Ici c'est le formulaire pour donner des points. Libre à toi de balancer tes amis ou de vanter tes anecdotes.
			</div>
		<?php endif ?>

		<?php if ($this->session->flashdata('add_point_errors')): ?>
			<div class="alert alert-danger">
				<?php foreach ($this->session->flashdata('add_point_errors') as $error): ?>
					<p><?= $error ?></p>
				<?php endforeach ?>
			</div>	 	
		<?php endif ?>
		<?php if ($this->session->flashdata('add_point_success')): ?>
			<div class="alert alert-success">
				<p><?= $this->session->flashdata('add_point_success') ?></p>
			</div>
		<?php endif ?>
		<div id="error_add" class="alert alert-danger" style="display:none">
		</div>
	</div>


	<!-- Changelog -->
	<div class="col-md-5">
		<?php $this->load->view("component/component_changelog.php");?>
	</div>




	<!-- Javascript déguelasse -->
	<script type="text/javascript">
		$(function() {
			$("#select_nom").select2();
			$( "#date_point").datepicker({ dateFormat: "yy-mm-dd" });
		});
	</script>
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
