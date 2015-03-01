<div class="container">
	<div class="col-md-7 central" id="points_block">
		<div class="bandeau">
			<span class="bandeau-texte">Modification d'un point</span>
		</div>

		<form role="form" id="form_add_point" method="post" action="<?php echo site_url("timeline/add_point"); ?>">
            <div class="modal-body">

                <div class="control-group">
                    <label for="multiple" class="control-label">Personne(s)</label>
                    <div class="controls">
                        <select id="select_nom_anex" class="js-example-basic-multiple" multiple name="personnes[]" style="width:100%;" required>
                            <?php foreach ($form_profil as $value): ?>
                                <option value="<?=$value->profil_id?>" <?php if ($value->profil_id == $point->recoit[0]->profil_id){ echo "selected";}?> > 
                                	<?=$value->profil_nom?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Point</label>

                    <!-- Génération de la dropdown des points -->
                    <select class="form-control" name="point" required>
                        <?php foreach ($form_point as $value): ?>
                            <option value="<?=$value->typept_id?>" <?php if ($value->typept_id == $point->typept_id){ echo "selected";}?>>
                            	Point <?=$value->typept_nom?> 
                            </option>
                        <?php endforeach ?>
                    </select>

                    <label>Description</label>
                    <textarea id="textarea" class="form-control" name="texte_point" value="<?= $point->point_description ?>" rows="3" cols="50"><?= $point->point_description ?></textarea>
                </div>
                <?php if (isset($error) ): ?>
                    <div id="alert_form_add" class="alert alert-danger"><?=$error?></div>
                <?php endif ?>

                <div class="checkbox">
                    <label>
                    <?php if ($point->point_epique == 1): ?>
                    	<input type="checkbox" checked> Epique
                    <?php else: ?>
                    	<input type="checkbox"> Epique
                    <?php endif ?>
                    </label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-right">Prends-ça !</button>
            </div>
        </form>
	</div>

	<!-- Javascript dégueulasse -->
	<script type="text/javascript">
	    $(function() {
	        $("#select_nom_anex").select2();
	    });
	</script>
</div>
