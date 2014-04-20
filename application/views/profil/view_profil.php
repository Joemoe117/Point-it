<div class="container main">
	<div class="col-md-6">

	<?php foreach ($profil as $value): ?>
		<img src="<?=$value->profil_image ?>" alt="..." class="img-circle" >
		<h1 style="display:inline-block"><?=$value->profil_nom ?></h1>	<br>	
	<?php endforeach ?>

	<?php foreach ($points as $key => $value): ?>
		<div class="point">

			<div class="point_texte">
				<img src="<?=$value->profil_image ?>" alt="test" class="img-rounded image_point">
				<a href=""><?=$value->profil_nom?></a>
					a gagné un <?=$value->typept_nom?>
				<span class="point_date pull-right"><?=$value->point_date?></span>
			</div>
			
			<div class="point_description"><?=$value->point_description?></div>

			<div class="zone_commentaire">
				<?php foreach ($commentaires as $key => $valueCom): ?>
					<?php if ($valueCom->point_id == $value->point_id): ?>
						<div class="commentaire">
							<img src="<?=$valueCom->profil_image ?>" alt="test" class="img-rounded image_commentaire">
							<?=$valueCom->profil_nom?>
							<br>
							<?=$valueCom->com_texte?>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endforeach ?>


	DEBUG <br>
	<?php
	
	?>
	</div>

	<div class="col-md-6">
		<h2>Statistiques</h2>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
</div>

