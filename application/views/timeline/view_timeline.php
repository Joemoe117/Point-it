<div class="container main">
<div class="col-md-7">
		<h1>Timeline</h1>
		<?php foreach ($points as $point): ?>
			<div class="point">
				<div class="point_texte">




					<!-- Affichage des avatars -->
					<?php foreach ($point->recoit as $pointInfo): ?>
						<img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_point">
					<?php endforeach ?>

					<?php $i = 0; ?>
					<!-- Affichage des noms -->
					<?php foreach ($point->recoit as $pointInfo): ?>
						<a class="name" href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><?=$pointInfo->profil_nom?></a>
						<?php if ( $i < (count($point->recoit)-1) && $i !=(count($point->recoit)-1) ): ?>
							et
						<?php endif ?>
						<?php 
							// améliorer
							$i++;
						?>
					<?php endforeach ?>


					<?php if ( (count($point->recoit) == 1 )): ?>
						a
					<?php else: ?>
						ont
					<?php endif ?>
					gagné un Point <?=$point->typept_nom?>
					<span class="point_date pull-right">
						<?php
							echo "Le ".date("d/m/y à H:i", mysql_to_unix($point->point_date_crea));
						?>
					</span>

					<div class="point_description"><?=$point->point_description?></div>


					<h5><span class="glyphicon glyphicon-comment"></span>  Commentaires</h5>
					<div class="zone_commentaire">
						<?php foreach ($commentaires as $commentaire): ?>
							<?php foreach ($commentaire as $key => $com): ?>
								<?php if ($com->point_id == $point->point_id): ?>
									<div class="commentaire">
										<img src="<?=$com->profil_image ?>" alt="test" class="img-rounded image_commentaire">
										<a href="<?php echo site_url("profil/get/"); echo "/".$com->profil_id; ?>"><?=$com->profil_nom?></a>
										<span class="point_date pull-right">
											<?php echo "Le ".date("d/m/y à H:i", mysql_to_unix($com->com_date)); ?>
										</span>	
										<br>
										<?=$com->com_texte?>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
						<form method="post" action="<?php echo site_url("commentaire/create"); ?>">
							<textarea id="texte" name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="2"></textarea>
							<input id="point_id" name="point_id" type="hidden" value="<?=$point->point_id?>">
							<input class="btn btn-primary pull-right test" value="Poster" type="submit">
							<br><br>
						</form>
					</div>

				</div>
			</div>
		<?php endforeach ?>

	</div>


	<div class="col-md-5">
		<div class="panel panel-primary">
			<div class="panel-heading"><span class="glyphicon glyphicon-edit"></span>  Distribuer un point</div>
			<div class="panel-body">
				<form role="form" method="post" action="<?php echo site_url("timeline/create"); ?>">
					<div class="control-group">
						<label for="multiple" class="control-label">Personne(s)</label>
						<div class="controls">
							<select id="select_nom" class="select2" multiple name="personnes[]" style="width:400px;">
								<?php foreach ($form_profil as $value): ?>
									<option value="<?=$value->profil_id?>">  <?=$value->profil_nom?> </option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

				  	<div class="form-group">
				    <label>Point</label>

				    <!-- Génération de la dropdown des points -->
				    <select class="form-control" name="point">
				    	<?php foreach ($form_point as $value): ?>
				    		<option value="<?=$value->typept_id?>"> <?=$value->typept_nom?> </option>
				    	<?php endforeach ?>
					</select>

				    <label>Description</label>
				    <textarea placeholder="Allez là !" class="form-control" name="texte_point" rows="3" cols="50"></textarea>
				  	</div>
				  	<button type="submit" class="btn btn-default pull-right">Prends-ça !</button>
				</form>
			</div>
		</div> 
	</div>

	<script type="text/javascript">
		$("#select_nom").select2();
	</script>

</div>