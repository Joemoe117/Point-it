<div class="container main">
	<div class="col-md-7">

	<?php foreach ($profil as $value): ?>
		<img src="<?=$value->profil_image ?>" alt="..." class="img-circle"  width="200px" height="200px">
		<h1 style="display:inline-block; vertical-align:bottom"><?=$value->profil_nom ?></h1>	<br>	
	<?php endforeach ?>

	<?php foreach ($points as $key => $value): ?>
		<div class="point">

			<div class="point_texte">
				<img src="<?=$value->profil_image ?>" alt="test" class="img-rounded image_point">
				<a href=""><?=$value->profil_nom?></a>
					a gagné un <?=$value->typept_nom?>
				<span class="point_date pull-right">
					<?php
						echo "Le ".date("d/m/y à H:i", mysql_to_unix($value->point_date_crea));
					?>
				</span>
			</div>
			
			<div class="point_description"><?=$value->point_description?></div>

			<h5><span class="glyphicon glyphicon-comment"></span>  Commentaires</h5>

			<div class="zone_commentaire">
				<?php foreach ($commentaires as $keyC => $valueCom): ?>
					<?php if ($valueCom->point_id == $value->point_id): ?>
						<div class="commentaire">
							<img src="<?=$valueCom->profil_image ?>" alt="test" class="img-rounded image_commentaire">
							<a href="<?php echo site_url("profil/get/"); echo "/".$valueCom->profil_id; ?>"><?=$valueCom->profil_nom?></a>
							<span class="point_date pull-right">
							<?php
								echo "Le ".date("d/m/y à H:i", mysql_to_unix($valueCom->com_date));
							?>
							</span>	
							<br>
							<?=$valueCom->com_texte?>
						</div>
					<?php endif ?>
				<?php endforeach ?>
				<form method="post" role="form" action="<?php echo site_url("commentaire/ajouterCommentaire"); ?>">
					<textarea name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="2"></textarea>
					<input name="point_id" type="hidden" value="<?=$value->point_id?>">
					<br>
					<input class="btn btn-primary pull-right" value="Poster" type="submit">
					<br><br>
				</form>	
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

