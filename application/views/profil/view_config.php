<div class="container main">
	<h1>Configuration du profil de <?= $profil_nom ?></h1>
	<hr>

	<div>
		<h2>Changer de photo de profil</h2>
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="form_name" value="avatar">
			<div class="form-group">
				<label for="avatar">Nouvelle photo de profil</label>
				<input type="file" id="avatar" name="avatar" required>
				<p class="help-block">Formats acceptés : gif, png, jpeg, jpg</p>
				<p class="help-block">Image de moins de 2Mo</p>
			</div>
			
			<button type="submit" class="btn btn-default">Envoyer</button>

		</form>

		<?php if (isset($errors['avatar'])): ?>
			<div class="alert alert-danger">
			<?php foreach ($errors['avatar'] as $error): ?>
				<p><?= $error ?></p>
			<?php endforeach ?>
			</div>
		<?php elseif (isset($success['avatar'])): ?>
			<div class="alert alert-success">
				<p><?= $success['avatar'] ?></p>
			</div>
		<?php endif ?>
	</div>


	<div>
		<h2>Changer de mot de passe</h2>
		<form method="post">

			<input type="hidden" name="form_name" value="new_password">
			<div class="form-group">
				<label id="old_pass">Ancien mot de passe</label>
				<input type="password" class="form-control" id="old_pass" name="old_pass" required placeholder="Entrez votre ancien mot de passe">
			</div>
			<div class="form-group">
				<label id="new_pass">Nouveau mot de passe</label>
				<input type="password" class="form-control" id="new_pass" name="new_pass" required placeholder="Entrez votre nouveau mot de passe">
			</div>
			<div class="form-group">
				<label id="new_pass_check">Confirmer nouveau mot de passe</label>
				<input type="password" class="form-control" id="new_pass_check" name="new_pass_check" required placeholder="Confirmer votre nouveau mot de passe">
			</div>

			<button type="submit" class="btn btn-default">Envoyer</button>

		</form>

		<?php if (isset($errors['new_password'])): ?>
			<div class="alert alert-danger">
			<?php foreach ($errors['new_password'] as $error): ?>
				<p><?= $error ?></p>
			<?php endforeach ?>
			</div>
		<?php elseif (isset($success['new_password'])): ?>
			<div class="alert alert-success">
				<p><?= $success['new_password'] ?></p>
			</div>
		<?php endif ?>
	</div>
</div>