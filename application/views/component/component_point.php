<div class="point">
	<div class="point_haut">
		<!-- Affichage des avatars -->
		<?php foreach ($point->recoit as $pointInfo): ?>
			<a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_point" ></a>	
		<?php endforeach ?>

		<?php $i = 0; ?>
		<!-- Affichage des noms -->
		<span class="name">
			<?php foreach ($point->recoit as $pointInfo): ?>
				<?php if ($i != 0): ?>			
					<?php if ($i < (count($point->recoit))-1): ?>
						,
					<?php else: ?>
						et
					<?php endif ?>
				<?php endif ?>
				<?php $i++;	?>
				<a class="hidden-xs" href="<?= site_url("profil/get/")."/".$pointInfo->profil_id ?>"><?=$pointInfo->profil_nom?></a>
			<?php endforeach ?>

			<?php if ( (count($point->recoit) == 1 )): ?>
				a
			<?php else: ?>
				ont
			<?php endif ?>
			gagné un Point <?=$point->typept_nom?>
			<?php if ($point->point_epique): ?>
				 EPIQUE
			<?php endif ?>
		</span>


		<span class="point_date pull-right hidden-xs">
			<?= "Créé le ".date("d/m/y à H:i", mysql_to_unix($point->point_date_crea)); ?>
			<br>
			<?php if (!is_null($point->point_date_evenement)): ?>
				<?= "Passé le ".date("d/m/y", mysql_to_unix($point->point_date_evenement)); ?>	
			<?php endif ?>
		</span>

		<div class="point_description"><?=$point->point_description?></div>

		<!-- Partie approuve -->
		<?php
			$data["approuve"] = $point->approuve; 
			$this->load->view("component/component_approuve.php", $data );
		?>

		<!-- Affichage du nombre de commentaire -->
		<p class="nbCommentaire" style="text-align:right">
			<?php printf(ngettext("%d commentaire", "%d commentaires", count($commentaires[$point->point_id])), count($commentaires[$point->point_id])) ?>
		</p>
		

		<!-- COMMENTAIRE -->
	</div>	
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