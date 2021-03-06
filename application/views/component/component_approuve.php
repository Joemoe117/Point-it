<!-- Personnes qui approuvent le point -->
<span class="approuve">

	<?php $contains = false; ?>
	<?php foreach ($approuve as $value): ?>
		<?php if ( $value->profil_id == $this->session->userdata('id')): ?>
			<?php $contains = true; ?>
		<?php endif ?>
	<?php endforeach ?>

	<!-- contenu réinitialisé lors du clic sur le approuve -->
	<span class="approuve_test">

		<!-- Si le profil n'approuve pas le point, alors on affiche le bouon pour approuver-->
		<?php if (!$contains): ?>
			<button class="btn btn-primary btn-sm pull-right" onclick="approuve(<?= $point->point_id?>, this)"><span class="glyphicon glyphicon-thumbs-up"> Approuver</span></button>
		<?php endif ?>



		<!-- Affichage de la liste des personnes qui approuvent -->
		<?php $i = 0; ?>
		<?php if (count($approuve) >= 1): ?>
		<?php foreach ($approuve as $key => $value): ?>

				<?php if ($i != 0): ?>
					<?php if ($i < (count($approuve))-1): ?>
						,
					<?php else: ?>
						et
					<?php endif ?>
				<?php endif ?>
				<?php $i++;	?>
				<?php echo $value->profil_nom ?>
			<?php endforeach ?>

			<?php if (count($approuve) > 1): ?>
				approuvent ce point.
			<?php else: ?>
				approuve ce point.
			<?php endif ?>
		<?php endif ?>
	</span>

</span>
