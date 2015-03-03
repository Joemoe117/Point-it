<div class="point">
	<div class="row point_haut">
		<div class="col-xs-3 col-sm-3">
			<div class="row">
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
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
				<div class="col-xs-12 col-sm-6 col-lg-6">
					<?php foreach ($point->recoit as $pointInfo): ?>
                        <a href="<?php echo site_url("profil/get/"); echo "/".$pointInfo->profil_id; ?>"><img src="<?=$pointInfo->profil_image ?>" class="img-rounded image_point" ></a>
                    <?php endforeach ?>
				</div>
                <div class="hidden-xs col-sm-6 col-lg-6">
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
					<a href="<?php echo site_url("point/set/"); echo "/".$point->point_id; ?>">
						<span class="glyphicon glyphicon-pencil">Modifier</span>
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
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-lg-1">
                </div>

                <div class="col-xs-11 col-sm-11 col-lg-11">

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
                <form
                    id="form<?php echo $point->point_id?>"
                    method="post"
                    action="<?= site_url("commentaire/create"); ?>"
                >

                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-lg-9">
                            <textarea id="textarea<?php echo $point->point_id?>" name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="5" required></textarea>
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