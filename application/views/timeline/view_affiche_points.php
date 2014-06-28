<?php if (!empty($points)): ?>
	<div>	
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
						<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><?=$pointInfo->profil_nom?></a>
						<?php if ( $i < (count($point->recoit)-1) && $i !=(count($point->recoit)-1) ): ?>
							et
						<?php endif ?>
						<?php $i++;	?>
					<?php endforeach ?>
				


					<?php if ((count($point->recoit) == 1 )): ?>
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

				<div class="zone_commentaire">
					<?php foreach ($commentaires as $commentaire): ?>
						<?php foreach ($commentaire as $com): ?>
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
						<div class="container-fluid" style="margin:0px; padding:0px;" >
							<div class="row col-xs-10" style="margin:0px; padding:0px;" >
							    <textarea name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="2"></textarea>
							</div>
							<div class="row col-xs-2" style="margin:0px; padding:0px;">
							    <input class="btn btn-primary form-control pull-right" value="Poster" type="submit">
						  	</div>
						</div>
						<input name="point_id" type="hidden" value="<?=$point->point_id?>">
					</form>
				</div>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>