<!-- Personnes qui approuvent le point -->
<span class="approuve">

	<?php $contains = false; ?>
	<?php foreach ($approuve as $value): ?>
		<?php if ( $value->profil_id == $this->session->userdata('id')): ?>
			<?php $contains = true; ?>
		<?php endif ?>
	<?php endforeach ?>

	<?php if ($contains): ?>

		<?php $i = 0; ?>
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


	<!-- Personne n'approuve le point -->
	<?php else: ?>
		<span class="approuve_test">
			<button id="approuve" class="btn btn-default" onclick="approuve(<?= $point->point_id?>, this)">
				<span class="glyphicon glyphicon-ok" style="vertical-align:middle"></span> Approuver
			</button>
		</span>
	<?php endif ?>
</span>