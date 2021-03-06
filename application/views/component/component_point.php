<div class="point">
	<div class="row point_haut">
		<div class="col-xs-3 col-sm-3">
			<div class="row">
				<!-- Display the type of point first for small device -->
				<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
					<img src="<?= base_url($point->typept_image);  ?>" class="img-rounded image_point" alt="">
				</div>

				<!-- Display the list of persons -->
				<div class="col-xs-12 col-sm-6 col-lg-6">
					<?php foreach ($point->recoit as $pointInfo): ?>
						<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><img src="<?=base_url($pointInfo->profil_image) ?>"  title="<?= $pointInfo->profil_nom ?>" class="img-rounded image_point" ></a>
					<?php endforeach ?>
				</div>

				<!-- Type of point for big screen -->
				<div class="hidden-xs col-sm-6 col-lg-6">
					<img src="<?= base_url($point->typept_image);  ?>" title="Point <?= $point->typept_nom ?>" class="img-rounded image_point" alt="">
				</div>
			</div>

			<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
			  <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</div>

			<span class="point_date hidden-xs">
				<?= "le ".date("d/m/y à H:i", mysql_to_unix($point->point_date_crea)); ?>
				<br>
			</span>


			<!-- Affichage du nombre de commentaire -->
			<p class="nbCommentaire">
				<?=  count($commentaires[$point->point_id]) ?>
				<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
			</p>
		</div>

		<!-- Partie droite -->
		<div class="col-sm-9 ">
			<span class="point_description">
				<?=$point->point_description?>
			</span>

			<!-- Partie approuve -->
			<?php
				$data["approuve"] = $point->approuve;
				$this->load->view("component/component_approuve.php", $data );
			?>

		</div>
	</div>

	<!-- COMMENTAIRE -->

	<div class="zone_commentaire">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-lg-3">
			</div>

			<div class="col-xs-9 col-sm-9 col-lg-9">

				<?php foreach ($commentaires as $commentaire): ?>

					<div class="commentaire_texte">
						<?php foreach ($commentaire as $com): ?>
							<?php if ($com->point_id == $point->point_id): ?>
								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object img-rounded" src="<?=base_url($com->profil_image) ?>" alt="..." width="35">
									</a>
									<div class="media-body">
										<a href="<?php echo site_url("profil/get/"); echo "/".$com->profil_id; ?>"><div class="media-heading"><?=$com->profil_nom?></div></a>
										<?=$com->com_texte?>
									</div>
								</div>
							<?php endif ?>

						<?php endforeach ?>
					</div>
				<?php endforeach ?>
				<form
				id="form<?php echo $point->point_id?>"
				method="post"
				action="<?= site_url("commentaire/create"); ?>"
				>

				<div class="row">
					<div class="col-xs-12 col-sm-9 col-lg-9">
						<textarea id="textarea<?php echo $point->point_id?>" name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="3" required></textarea>
					</div>
					<div class="col-xs-12 col-sm-3 col-lg-3">
						<input class="btn btn-primary form-control pull-right" value="Poster" type="submit">
					</div>
					<input name="point_id" type="hidden" value="<?=$point->point_id?>">
				</div>
			</form>
		</div>
	</div>
</div>
</div>
