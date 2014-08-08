<div class="container main">
	<h1>Inscription</h1>

	<?php if (isset($errors)): ?>
		<div class="alert alert-danger">
		<?php foreach ($errors as $error): ?>
			<p><?= $error ?></p>
		<?php endforeach ?>
		</div>
	<?php elseif (isset($success)): ?>
		<div class="alert alert-success">
			<p><?= $success ?></p>
		</div>
	<?php endif ?>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group  <?php if (isset($errors['login'])) echo 'has-error'; elseif (isset($errors['pass'])) echo 'has-success'; ?>">
			<label class="control-label" for="login">Votre login</label>
			<input
				type		="text"
				class		="form-control"
				id			="login"
				name		="login"
				placeholder	="Entrez votre grâcieux nom ou surnom <3"
				value		= "<?php if (isset($retry['login'])) echo $retry['login']; ?>"
				required
			>
		</div>
		<div class="form-group <?php if (isset($errors['pass'])) echo 'has-error'; ?>">
			<label class="control-label" for="pass">Votre mot de passe</label>
			<input
				type		="password"
				class		="form-control"
				id			="pass"
				name		="pass"
				placeholder	="Entrez votre mot de passe"
				value		= "<?php if (isset($retry['pass'])) echo $retry['pass']; ?>"
				required
			>
		</div>
		<div class="form-group  <?php if (isset($errors['pass'])) echo 'has-error'; ?>">
			<label class="control-label" for="pass_check">Confirmez votre mot de passe</label>
			<input
				type		="password"
				class		="form-control"
				id			="pass_check"
				name		="pass_check"
				placeholder	="On sais qu'il y a des pas doués, alors confirme le ici"
				value		= "<?php if (isset($retry['pass_check'])) echo $retry['pass_check']; ?>"
				required
			>
		</div>
		<div class="form-group  <?php if (isset($errors['pass'])) echo 'has-error'; ?>">
			<label class="control-label" for="antibot_reponse"><?= $antibot_question ?></label>
			<input
				type		="text"
				class		="form-control"
				id			="antibot_reponse"
				name		="antibot_reponse"
				placeholder	="C'est pour vérifier que tu n'es pas un connard de bot"
				value		= "<?php if (isset($retry['antibot_reponse'])) echo $retry['antibot_reponse']; ?>"
				required
			>
		</div>
		<button class="btn btn-primary" type="submit">S'inscrire</button>
		<a class="btn btn-default" href="<?= site_url('login') ?>">Retour</a>
	</form>
</div>