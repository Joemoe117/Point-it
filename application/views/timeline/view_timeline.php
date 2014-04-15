


<div class="container main">
	<div class="col-md-8">
		<h1>Timeline</h1>

		<div id="test_ajout" style="display:none">
			
		</div>
		
		<h2>Test 1</h2>
		<div class="point">
		<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="60">
		<span class="point_texte"> Baptiste a gagné un point Moustache </span> <br>
			
			<div class="commentaire">
				<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="30">
				<span class="commentaire_texte"> Ah ouais, t'es vraiment un mec stylé ! </span>
			</div>
			<div class="commentaire">
				<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c114.59.733.733/s160x160/522418_10200703773854067_2122395249_n.jpg" alt="..." class="img-rounded" width="30">
				<span class="commentaire_texte"> Ouais, c'est trop vrai ! </span>
			</div>
			<div class="commentaire">
				<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="30">
				<span class="commentaire_texte"> Arretez, je suis gêné !</span>
			</div>
		</div>



		<div id="button" >test</div>
		<div id="test" style="display:none">
			<div class="point">
			<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="60">
			<span class="point_texte"> Baptiste a gagné un point Moustache </span> <br>
				
				<div class="commentaire">
					<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="30">
					<span class="commentaire_texte"> Ah ouais, t'es vraiment un mec stylé ! </span>
				</div>
				<div class="commentaire">
					<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c114.59.733.733/s160x160/522418_10200703773854067_2122395249_n.jpg" alt="..." class="img-rounded" width="30">
					<span class="commentaire_texte"> Ouais, c'est trop vrai ! </span>
				</div>
				<div class="commentaire">
					<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="30">
					<span class="commentaire_texte"> Arretez, je suis gêné !</span>
				</div>
			</div>
		</div>

		<script>
		// Préparation d'un effet kikoo
		$(function() {
			$( "#button" ).click(function() {
				var options = {};
				$( "#test" ).show( "slide", options, 700 );
				});
			$( "#effect" ).hide();
		});
		</script>







		<h2>Test 2</h2>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c114.59.733.733/s160x160/522418_10200703773854067_2122395249_n.jpg" alt="..." class="img-rounded" width="40">
				<span class="point_texte"> Thomas a gagné un point Moustache <span class="glyphicon glyphicon-thumbs-up pull-right">7</span>	</span> <br>


			</div>
			<div class="panel-body">
				<div class="commentaire_2">
					<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="32">
					<span class="commentaire_texte2"> Putain, les deux développeurs sont quand même bien stylé ! </span>
				</div>
				<br>

				<div class="commentaire_2">
					<img src="<?php echo base_url("/assets/images/profil.jpg");  ?>" alt="..." class="img-rounded" width="32">
					<span class="commentaire_texte2"> En plus, t'as 7 likes ! </span>
				</div>
			</div>

		</div> 

		<br><br><br><br>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. 

		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		<br>

		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		<br>


	</div>


	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><span class="glyphicon glyphicon-edit"></span>  Distribuer un point</div>
			<div class="panel-body">
				<form role="form" >
				  <div class="form-group">
				    <label for="exampleInputEmail1">Personne</label>
				    <select class="form-control">
				    	<?php foreach ($form_profil as $value): ?>
				    		<option> <?=$value->nom?> </option>
				    	<?php endforeach ?>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Point</label>

				    <!-- Génération de la dropdown des points -->
				    <select class="form-control">
				    	<?php foreach ($form_point as $value): ?>
				    		<option> <?=$value->nom?> </option>
				    	<?php endforeach ?>
					</select>



				  </div>
				 <div class="form-group">
				    <label for="exampleInputEmail1">Description</label>
				    <textarea name="textarea" rows="7" cols="50">Allez là !</textarea>
				  </div>
				  <button id="test" type="submit" class="btn btn-default pull-right">Prends-ça !</button>
				</form>
			</div>
		</div> 
		<button id="test2" type="submit" class="btn btn-default pull-right">Ajouter un point fictif !</button>
	</div>

	
	<script type="text/javascript">

	$( "#test2" ).click(function(){
		$("#test_ajout").prepend("<span class=\"point_texte\"> Baptiste a gagné un point Moustache </span> <br>");
	  	$( "#test_ajout" ).slideDown("slow");
	});


	</script>

</div>