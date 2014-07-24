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
		<h3>Général</h3>
		<h5>Nombre de points :</h5>
		<?=$nbPoint?>
		<h5>Nombre de commentaires :</h5>
		<?=$nbCommentaire?>
		<h3>Point par type</h3>
		<table class="table">
			<th>Type de point</th>
			<th>Nombre</th>
			<?php foreach ($table_point as $tpoint): ?>
				<tr>
					<td><?= $tpoint->typept_nom?></td>
					<td><?= $tpoint->nombre?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

<script>
	$( ".point_haut" ).click(function() {
		$(this).next(".zone_commentaire" ).toggle( "blind", 400 );
	});
</script>


