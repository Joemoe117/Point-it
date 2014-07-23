<div class="container main">


	<div class="col-md-7">
		<h2>Classement 
			<?php if (is_null($type_point)): ?>
				général
			<?php else: ?>
				du point <?= $type_point ?>
			<?php endif ?>
		</h2>

		<div class="row">
			<?php for ($i=0; $i < 3; $i++): ?>
				<div class="leader leader-<?= $i+1 ?> col-md-3 col-md-offset-1">
					<p><?= $classement[$i]->profil_nom ?></p>
					<img src="<?= $classement[$i]->profil_image ?>" height="100%" width="100%">
					<p><?= $classement[$i]->nb_points ?> POINTS</p>
				</div>
			<?php endfor ?>
		</div>

		<h3>Les autres personnes sans importance</h3>
		
		<?php for ($i=3; $i<count($classement); $i++): ?>
			<div class="row">
				<div class="col-md-1"><?= $i+1 ?></div>
				<div class="col-md-2"><?= $classement[$i]->profil_nom ?></div>
				<div class="col-md-3"><?= $classement[$i]->nb_points ?> Points</div>
			</div>
		<?php endfor ?>
	</div>

	<!-- Barre à droite -->
	<div class="col-md-5">
		<h3>Par type de point</h3>

		<div><a href="<?= site_url('leaderboard') ?>" class="btn btn-default btn-lg btn-block <? if(is_null($type_point)) echo 'active' ?>">
			Classement général
		</a></div>
		<?php foreach ($types_point as $key => $value): ?>
			<div>
				<a href="<?= site_url('leaderboard/index/'.$value->typept_nom) ?>" class="btn btn-default btn-lg btn-block <? if($type_point == $value->typept_nom) echo 'active' ?>">
					<?= $value->typept_nom ?>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>