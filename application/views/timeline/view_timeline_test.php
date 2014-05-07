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
						<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><?=$pointInfo->profil_nom?></a>
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
					gagné un <?=$point->typept_nom?>
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
										<?php
											echo "Le ".date("d/m/y à H:i", mysql_to_unix($com->com_date));
										?>
										</span>	
										<br>
										<?=$com->com_texte?>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
						<textarea id="texte" name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="2"></textarea>
						<input id="point_id" name="point_id" type="hidden" value="<?=$point->point_id?>">
						<input id="ajouterCommentaire<?=$point->point_id?>" onclick="test()" class="btn btn-primary pull-right test" value="Poster" type="submit">
						<br><br>
					</div>

				</div>
			</div>
		<?php endforeach ?>

	</div>

	<div class="col-md-5">
		<h1>Debug</h1>

		<?php
			print_r($points);
		?>

	</div>
</div>