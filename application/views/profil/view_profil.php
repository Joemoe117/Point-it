<div class="container main">
	<div class="col-md-7">

	<?php foreach ($profil as $value): ?>
		<img src="<?=$value->profil_image ?>" alt="..." class="img-circle"  width="200px" height="200px">
		<h1 style="display:inline-block; vertical-align:bottom"><?=$value->profil_nom ?></h1>	<br>	
	<?php endforeach ?>

	<?php foreach ($points as $point): ?>
			<div class="point">
				<div class="point_texte">

					<!-- Affichage des avatars -->
					<?php foreach ($point->recoit as $pointInfo): ?>
						<img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_point" >
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
		<h2>Statistiques</h2>
		<h3>Fonction en cours de développement</h3>
		<h5>Nombre de points :</h5>
		<?=$nbPoint?>
		<h5>Nombre de commentaires :</h5>
		<?=$nbCommentaire?>
		<h3>Autres joyeusetés</h3>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
</div>

