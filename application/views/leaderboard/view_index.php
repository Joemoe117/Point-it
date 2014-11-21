<div class="container main">


	<div class="col-md-7 central">
		<div class="bandeau">
			<span class="bandeau-texte">
				Classement 
				<?php if (is_null($type_point)): ?>
					général
				<?php else: ?>
					du point <?= $type_point->typept_nom ?>
				<?php endif ?>
			</span>
		</div>
		<br>
		<!-- Podium -->
		<div class="row">
			<?php for ($i=0; $i < $leader_limit; $i++): ?>
				<div class="leader leader-<?= $i+1 ?> col-md-2 col-md-offset-1">
					<a href="<?= site_url('profil/get/'.$classement[$i]->profil_id) ?>"><p><?= $classement[$i]->profil_nom ?></p></a>
					<a href="<?= site_url('profil/get/'.$classement[$i]->profil_id) ?>"><img src="<?= $classement[$i]->profil_image ?>" height="100%" width="100%"></a>
					<p><?= $classement[$i]->nb_points ?> POINTS</p>
				</div>
			<?php endfor ?>
		</div>

		<!-- Le reste du classement -->
		<?php if ($nb_elem_class > 3): ?>
			<h3>Les autres personnes sans importance</h3>
			<table class="table">
				<th>Classement</th>
				<th>Personne</th>
				<th>Nombre</th>			
				<?php for ($i=3; $i<$nb_elem_class; $i++): ?>
					<tr>
						<td><?= $i+1 ?></td>
						<td><a href="<?= site_url('profil/get/'.$classement[$i]->profil_id) ?>"><div class="col-md-2"><?= $classement[$i]->profil_nom ?></div></a></td>	
						<td><div class="col-md-3"><?= $classement[$i]->nb_points ?></div></td>	
					</tr>
				<?php endfor ?>	
			</table>
		<?php endif ?>
	</div>

	<!-- Barre à droite -->
	<div class="col-md-5 secondaire">
		<h3>Par type de point</h3>

		<div><a href="<?= site_url('leaderboard') ?>" class="btn btn-default btn-lg btn-block <? if(is_null($type_point)) echo 'active' ?>">
			Classement général
		</a></div>
		<?php foreach ($types_point as $key => $value): ?>
			<div>
				<a href="<?= site_url('leaderboard/index/'.$value->typept_id) ?>" class="btn btn-default btn-lg btn-block <? if(!is_null($type_point) AND $type_point->typept_id == $value->typept_id) echo 'active' ?>">
					<?= $value->typept_nom ?>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>