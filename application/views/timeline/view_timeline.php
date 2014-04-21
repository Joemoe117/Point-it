<div class="container main">
	<div class="col-md-7">
		<h1>Timeline</h1>

			<?php foreach ($points as $key => $value): ?>
		<div class="point">

			<div class="point_texte">
				<img src="<?=$value->profil_image ?>" class="img-rounded image_point">
				<a href=""><?=$value->profil_nom?></a>
					a gagné un <?=$value->typept_nom?>
				<span class="point_date pull-right">
					<?php
						echo "Le ".date("d/m/y à H:i", mysql_to_unix($value->point_date_crea));
					?>
				</span>
			</div>
			
			<div class="point_description"><?=$value->point_description?></div>

			<h5><span class="glyphicon glyphicon-comment"></span>  Commentaires</h5>
			<div class="zone_commentaire">
				<?php foreach ($commentaires as $commentaire): ?>
					<?php foreach ($commentaire as $key => $com): ?>
						<?php if ($com->point_id == $value->point_id): ?>
							<div class="commentaire">
								<img src="<?=$com->profil_image ?>" alt="test" class="img-rounded image_commentaire">
								<a href="<?php echo site_url("profil/get/"); echo "/".$com->profil_id; ?>"><?=$com->profil_nom?></a>
								<span class="point_date pull-right">
								<?php
									echo "Le ".date("d/m/y à H:i", mysql_to_unix($com->com_date));
								?>
								</span>	
								<br>
								<?=$com->com_texte?>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				<?php endforeach ?>
				<form method="post" role="form" action="<?php echo site_url("commentaire/ajouterCommentaire"); ?>">
					<textarea name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="2"></textarea>
					<input name="point_id" type="hidden" value="<?=$value->point_id?>">
					<br>
					<input class="btn btn-primary pull-right" value="Poster" type="submit">
					<br><br>
				</form>	
			</div>


		</div>
	<?php endforeach ?>



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
	</div>

	
	<script type="text/javascript">

	$( "#test2" ).click(function(){
		$("#test_ajout").prepend("<span class=\"point_texte\"> Baptiste a gagné un point Moustache </span> <br>");
	  	$( "#test_ajout" ).slideDown("slow");
	});


	</script>


	<input id="submit" type="button" value="ajax">
	<div id="affichage">OK</div>

	<script type="application/javascript">
		$(document).ready(function() {
			$('#submit').click(function() {
				alert("lol");
				$.ajax({
					url: "<?php echo site_url('ajax/testAjax'); ?>",
					type: 'POST',
					async : false,
					success: function(msg) {
						alert("ok");
						$('#affichage').html(msg);
					}
				});
				alert("lol2");
				return false;
			});
		});
	</script>


</div>