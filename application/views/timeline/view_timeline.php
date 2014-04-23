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
				<textarea id="texte" name="commentaire" placeholder="Ajouter un commentaire..." class="form-control" rows="2"></textarea>
				<input id="point_id" name="point_id" type="hidden" value="<?=$value->point_id?>">
				<br>
				<input id="ajouterCommentaire<?=$value->point_id?>" onclick="test()" class="btn btn-primary pull-right" value="Poster" type="submit">
				<br><br>
			</div>

			<script>

				function test(){
					var parent = $( "#ajouterCommentaire<?=$value->point_id?>" ).parent().get(0).tagName;
					var donnee = {
						texte : $( parent ).children( "#texte" ).val(),
						point_id : $( parent ).children( "#point_id" ).val(),
						ajax : '1'
					};


					if ($( parent ).children( "#texte" ).val().length != 0){
						$.ajax({
							url: "<?php echo site_url('ajax/ajouterCommentaireAjax'); ?>",
							type: 'POST',
							async : false,
							data: donnee,
							success: function(msg) {
								$( parent ).children( "#texte" ).val('');
								$( msg ).insertAfter( $(parent).find(".commentaire:last") );
							}
						});
					}
					
				}
			</script>


		</div>
	<?php endforeach ?>







	</div>


	<div class="col-md-5">
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
				    <textarea class="form-control" name="textarea" rows="3" cols="50">Allez là !</textarea>
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
</div>