<div class="container main">
	<div class="col-md-7" id="points_block">
	<h2>Leaderboard</h2>
	<p>Ceci n'est pas très explicite. Va falloir revoir ta vue mon Thoumou.</p>
	<table class="table table-bordered">
		<th>Personne</th>
		<th>Total de points</th>

		<?php foreach ($classement as $key => $value): ?>
			<tr>
				<td><?= $value->profil_id?></td>
				<td><?= $value->nb_points?></td>
			</tr>
		<?php endforeach ?>	
	</table>
	</div>
	<div class="col-md-5" id="points_block">
		<h3>Changer de filtre</h3>
	</div>
</div>