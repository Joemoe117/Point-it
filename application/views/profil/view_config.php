<div class="container main">
	<h2>Configuration du profil de <?= $profil_nom ?></h2>
	<h3>Changer de photo</h3>
	<!-- <form method="post" enctype="multipart/form-data">
		<input type="hidden" name="form_name" value="avatar">
		<input type="file" name="avatar">
		<input type="submit">
	</form> -->
	<?php echo form_open_multipart('profil/config');?>
	<input type="hidden" name="form_name" value="avatar">
	<input type="file" name="avatar">
	<input type="submit">
	<?php if (isset($errors['avatar'])): ?>
		<?php foreach ($errors['avatar'] as $error): ?>
			<p><?= $error ?></p>
		<?php endforeach ?>
	<?php elseif (isset($success['avatar'])): ?>
		<p><?= $success['avatar'] ?></p>
	<?php endif ?>


	<!-- <h3>Changer de mot de passe</h3>
	<form method="post">
		<input type="hidden" name="form_name" value="password">
		<input type="password" name="old_pass" required placeholder="Ancien mot de passe">
		<input type="password" name="new_pass" required placeholder="Nouveau mot de passe">
		<input type="password" name="new_pass_check" required placeholder="Confirmer nouveau mot de passe">
		<input type="submit">
	</form> -->
</div>