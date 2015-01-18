<div class="point">
	<div class="row point_haut">
		<div class="col-xs-4 col-sm-3">
			<div class="row">
				<div class="col-xs-6">
					<!-- plusieurs personnes -->
					<?php if (count($point->recoit) > 1): ?>
						<?php $i = 0 ?>
						<?php foreach ($point->recoit as $pointInfo): ?>
							<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_petite" ></a>
						<?php endforeach ?>

					<!-- une seule personne -->
					<?php else: ?>
						<?php foreach ($point->recoit as $pointInfo): ?>
							<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_point" ></a>	
						<?php endforeach ?>
					<?php endif ?>
		
				</div>
				<div class="col-xs-6">
					<?php if ($point->typept_id == 1): ?>
						<img src="<?= base_url("/assets/images/point/moustache.png");  ?>" class="img-rounded image_point" alt="">
					<?php endif ?>

					<?php if ($point->typept_id == 2): ?>
						<img src="<?= base_url("/assets/images/point/vietnam.png");  ?>" class="img-rounded image_point" alt="">
					<?php endif ?>

					<?php if ($point->typept_id == 3): ?>
						<img src="<?= base_url("/assets/images/point/nazi.png");  ?>" class="img-rounded image_point" alt="">
					<?php endif ?>

					<?php if ($point->typept_id == 4): ?>
						<img src="<?= base_url("/assets/images/point/princesse.png");  ?>" class="img-rounded image_point" alt="">
					<?php endif ?>
					
				</div>
			</div>			
		
			<span class="point_date hidden-xs">
				<?= "le ".date("d/m/y à H:i", mysql_to_unix($point->point_date_crea)); ?>
				<br>
				<?php if (!is_null($point->point_date_evenement)): ?>
					<?= "Passé le ".date("d/m/y", mysql_to_unix($point->point_date_evenement)); ?>	
				<?php endif ?>

				<?php if ($point->profil_id_donne == 1): ?>
					<a href="<?= site_url("point/set"); ?>">
						<span class="glyphicon glyphicon-pencil">Modifier</span>
					</a>
					<br/>
					<a href="">
						<span class="glyphicon glyphicon-remove">Supprimer</span>
					</a>

					
				<?php endif ?>
			</span>


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
				
			<!-- Affichage du nombre de commentaire -->
			<p class="nbCommentaire" style="text-align:right">
				<?php printf(ngettext("%d commentaire", "%d commentaires", count($commentaires[$point->point_id])), count($commentaires[$point->point_id])) ?>
			</p>

		</div>
	</div>

	

	<!-- COMMENTAIRE -->
	<div class="zone_commentaire">
		
		<?php foreach ($commentaires as $commentaire): ?>

			<div class="commentaire_texte">
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
			</div>
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