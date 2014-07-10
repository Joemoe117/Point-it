<div class="container main">
	<div class="col-md-7">

		<img src="<?=$profil->profil_image ?>" alt="..." class="img-circle"  width="200px" height="200px">
		<h1 style="display:inline-block; vertical-align:bottom"><?=$profil->profil_nom ?></h1>	<br>
			
		<div class="separateur"></div>

		<?php foreach ($points as $point): ?>
			<?php $data["point"] = $point; ?>
			<?php $this->load->view("component/component_point.php", $data );?>
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

<script>
	$( ".point" ).click(function() {
		$(this).find(".zone_commentaire" ).toggle( "blind", 400 );
	});
</script>


