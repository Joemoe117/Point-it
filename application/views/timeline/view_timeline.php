<div class="container main">
	<div class="col-md-7">
		<h1>Timeline</h1>

			<?php foreach ($points as $key => $value): ?>
		<div class="point">

			<div class="point_texte">
				<img src="<?=$value->profil_image ?>" alt="test" class="img-rounded image_point">
				<a href=""><?=$value->profil_nom?></a>
					a gagné un <?=$value->typept_nom?>
				<span class="point_date pull-right">
					<?php
						echo "Le ".date("d/m/y à H:i", mysql_to_unix($value->point_date));
					?>
				</span>
			</div>
			
			<div class="point_description"><?=$value->point_description?></div>

			<h5><span class="glyphicon glyphicon-comment"></span>  Commentaires</h5>

		</div>
	<?php endforeach ?>


		<?php
			print_r($points);
		?>


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
				    		<option> <?=$value->profil_nom?> </option>
				    	<?php endforeach ?>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Point</label>

				    <!-- Génération de la dropdown des points -->
				    <select class="form-control">
				    	<?php foreach ($form_point as $value): ?>
				    		<option> <?=$value->typept_nom?> </option>
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