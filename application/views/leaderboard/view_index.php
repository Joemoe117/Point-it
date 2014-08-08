<div class="container main">


	<div class="col-md-7">
		<h2>Classement 
			<?php if (is_null($type_point)): ?>
				général
			<?php else: ?>
				du point <?= $type_point ?>
			<?php endif ?>
		</h2>

		<!-- Podium -->
		<div class="row">
			<?php for ($i=0; $i < $leader_limit; $i++): ?>
				<div class="leader leader-<?= $i+1 ?> col-md-3 col-md-offset-1">
					<a href="<?= site_url('profil/get/'.$classement[$i]->profil_id) ?>"><p><?= $classement[$i]->profil_nom ?></p></a>
					<a href="<?= site_url('profil/get/'.$classement[$i]->profil_id) ?>"><img src="<?= $classement[$i]->profil_image ?>" height="100%" width="100%"></a>
					<p><?= $classement[$i]->nb_points ?> POINTS</p>
				</div>
			<?php endfor ?>
		</div>

		<!-- Le reste du classement -->
		<?php if ($nb_elem_class > 3): ?>
			<h3>Les autres personnes sans importance</h3>
			<?php for ($i=3; $i<$nb_elem_class; $i++): ?>
				<div class="row">
					<div class="col-md-1"><?= $i+1 ?></div>
					<a href="<?= site_url('profil/get/'.$classement[$i]->profil_id) ?>"><div class="col-md-2"><?= $classement[$i]->profil_nom ?></div></a>
					<div class="col-md-3"><?= $classement[$i]->nb_points ?> Points</div>
				</div>
			<?php endfor ?>	
		<?php endif ?>
	</div>

	<!-- Barre à droite -->
	<div class="col-md-5">
		<h3>Par type de point</h3>

		<div><a href="<?= site_url('leaderboard') ?>" class="btn btn-default btn-lg btn-block <? if(is_null($type_point)) echo 'active' ?>">
			Classement général
		</a></div>
		<?php foreach ($types_point as $key => $value): ?>
			<div>
				<a href="<?= site_url('leaderboard/index/'.$value->typept_id) ?>" class="btn btn-default btn-lg btn-block <? if($type_point == $value->typept_id) echo 'active' ?>">
					<?= $value->typept_nom ?>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>