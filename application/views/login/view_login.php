<div class="container central">
	<div class="col-md-6">
		<h1>Bienvenue sur Point-it !</h1>
		<p>Vous êtes bien arrivé sur le renouveau de Pointbook ! Pour profiter des nouvelles fonctionnalités de celui-ci, veuillez vous connecter</p>
		<p style="color:red">Les inscriptions sont ouvertes. il n'est pas nécéssaire de demander de l'aide à un administrateur</p>

		<div class="form_connexion">
			<h2 class="blanc">Formulaire de connexion</h2>
			<?= validation_errors() ?>
			<form method="post" role="form" action="<?php echo site_url("login"); ?>">
				<div class="form-group">
				<label class="blanc" for="exampleInputEmail1">Login</label>
				<input name="login" type="text" class="form-control" placeholder="Entrer votre Login">
				</div>
				<div class="form-group">
					<label class="blanc" for="exampleInputPassword1">Mot de passe</label>
					<input name="password" type="password" class="form-control" placeholder="Entrer votre mot de passe">
				</div>
				<!-- Gestion erreurs -->
				<?php if (isset($errors)): ?>
					<?php foreach ($errors as $error): ?>	
						<div class="alert alert-danger"><?= $error ?></div>
					<?php endforeach ?>
				<?php endif ?>
				
				<button type="submit" class="btn btn-default pull-right">Connexion</button>
				<br>
			</form>
		</div>
	
		<a class="btn btn-primary pull-right inscription" href="<?= site_url('login/inscription') ?>">Inscription</a>
		<br>
		<h2>Statistiques générales</h2>
		<p> Point-it rassemble déjà <?= $nb_profil ?> connards. </p>
		<p> Déjà <?= $nb_point ?> points ont été distribué et <?= $nb_commentaire ?> commentaires ont été rajouté</p>

	</div>

	
	<div class="col-md-6">
		<h3>Point-it dispose de nombreuses nouvelles fonctionnalités comme : </h3>

		<div class="col-md-6">
			<center>
				<span class="glyphicon glyphicon-user icone"></span> 
				<h4>Des nouveaux profils</h4>
				<p>Des nouveaux profils vous permettant de briller au milieu de tous ces clodos et de vous démarquer de la masse populaire</p>
			</center>
		</div>

		<div class="col-md-6">
			<center>
				<span class="glyphicon glyphicon-plus-sign icone"></span> 
				<h4>Un système de point optimisé</h4>
				<p>Le système de distribution de points a été repensé pour être plus simple et plus intuitif. Il est maintenant possible de distribuer des points à plusieurs personnes à la fois</p>
			</center>
		</div>

		<div class="col-md-6">
			<center>
				<span class="glyphicon glyphicon-align-left icone"></span> 
				<h4>Une présentation en timeline</h4>
				<p>Fini l'ergonomie archaïque et découvrez une interface novatrice qu'aucun site ne vous a encore offert... Si si, on vous le promet</p>
			</center>
		</div>

		<div class="col-md-6">
			<center>
				<span class="glyphicon glyphicon-off icone"></span> 
				<h4>Plus sécurisé</h4>
				<p>La connexion Bagdad non sécurisée, c'est fini. Enfin un truc sérieux ou vous pouvez pas usurper l'identité de quelqu'un en modifiant juste vos cookies</p>
			</center>
		</div>

		<div class="col-md-6">
			<center>
				<span class="glyphicon glyphicon-comment icone"></span> 
				<h4>Cracher sur vos amis</h4>
				<p>Un vrai système de commentaires pour vous permettre d'apporter plus de précisions dans les exploits de vos amis. Et si vous êtes gentils, on ajoutera les likes !</p>
			</center>
		</div>

		<div class="col-md-6">
			<center>
				<span class="glyphicon glyphicon-euro icone"></span> 
				<h4>La gratuité, c'est bien !</h4>
				<p>Parce que on aime la communisterie, Point-it est gratuit ! D'ailleurs, Staline, Lenine et Jacques Chirac approuvent ce site</p>
			</center>
		</div>


	</div>
</div>