<div class="container main">
	<?php if ($this->session->flashdata('first_visit')): ?>
		<div class="alert alert-info">
			Tu es maintenant inscrit et connecté. Bravo !!!
		</div>
	<?php endif ?>


	<div class="col-md-7" id="points_block">
		<h2>Timeline</h2>
		<div>
			<?php if ($this->session->flashdata('first_visit')): ?>
				<div class="alert alert-info">
					Voici la Timeline, c'est ici que tu verras les exploits de tes petits copains et les commentaires d'encouragement qui vont avec.
				</div>
			<?php endif ?>

			<?php foreach ($points as $point): ?>
				<div class="point">

					<!-- Affichage des avatars -->
					<?php foreach ($point->recoit as $pointInfo): ?>
						<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_point" ></a>	
					<?php endforeach ?>

					<?php $i = 0; ?>
					<!-- Affichage des noms -->
					<span class="name">
						<?php foreach ($point->recoit as $pointInfo): ?>
							<a href="<?= site_url("profil/get/")."/".$pointInfo->profil_id ?>"><?=$pointInfo->profil_nom?></a>
							<?php if ( $i < (count($point->recoit)-1) && $i !=(count($point->recoit)-1) ): ?>
								et
							<?php endif ?>
							<?php $i++;	?>
						<?php endforeach ?>
					


						<?php if ( (count($point->recoit) == 1 )): ?>
							a
						<?php else: ?>
							ont
						<?php endif ?>
						gagné un Point <?=$point->typept_nom?>
					</span>
					<span class="point_date pull-right">
						<?php
							echo "Le ".date("d/m/y à H:i", mysql_to_unix($point->point_date_crea));
						?>
					</span>

					<div class="point_description"><?=$point->point_description?></div>


					<!-- COMMENTAIRE -->
					
					<div class="zone_commentaire">
						<?php foreach ($commentaires as $commentaire): ?>
							<?php foreach ($commentaire as $com): ?>
								<?php if ($com->point_id == $point->point_id): ?>						
									<div class="media">
										<a class="pull-left" href="#">
											<img class="media-object img-rounded" src="<?=$com->profil_image ?>" alt="..." width="35">
										</a>
										<div class="media-body">
										<a href="<?php echo site_url("profil/get/"); echo "/".$com->profil_id; ?>"><div class="media-heading"><?=$com->profil_nom?></div></a>
											<?=$com->com_texte?>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>

						<form id="form<?php echo $point->point_id?>" method="post" action="<?= site_url("commentaire/create"); ?>">
							<div class="container-fluid" style="margin:0px; padding:0px;" >
								<textarea id="textarea<?php echo $point->point_id?>" name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="1" required></textarea>
								<input class="btn btn-primary form-control pull-right" value="Poster" type="submit">
							</div>
							<input name="point_id" type="hidden" value="<?=$point->point_id?>">
						</form>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<button id="add_old_points" class="btn btn-primary pull-right">Afficher 10 anciens points</button>
	</div>


	<div class="col-md-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><span class="glyphicon glyphicon-edit"></span>  Distribuer un point</div>
			<div class="panel-body">
				<form role="form" method="post" action="<?php echo site_url("timeline/add_point"); ?>">
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
					<textarea placeholder="Allez là !" class="form-control" name="texte_point" rows="3" cols="50"></textarea>
					</div>
					<?php if (isset($error) ): ?>
						<div class="alert alert-danger"><?=$error?></div>
					<?php endif ?>
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
	</div>

	<script type="text/javascript">
		$("#select_nom").select2();
	</script>
	<script type="text/javascript">
		// On déclare les variables globales ainsi que l'URL pour le script "get_points.js" pour que PHP interprete l'URL à appeler
		var getPointsVar = {
			url: '<?php echo site_url("timeline/get_points/") ?>',
			nb: 10,
			limit: 5
		};
	</script>

	<script type="text/javascript" src="<?= base_url('/assets/js/get_points.js') ?>"></script>


	<script>
		$(function() {
			$( ".zone_commentaire" ).hide("hide", 0 );
	  	});
	</script>

	<script>
		$( ".point" ).click(function() {
			$(this).find(".zone_commentaire" ).toggle( "blind", 400 );
		});
	</script>

</div>