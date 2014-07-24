<?php if (!empty($points)): ?>
	<?php foreach ($points as $point): ?>
		<?php $data["point"] = $point; ?>
		<?php $this->load->view("component/component_point.php", $data );?>
	<?php endforeach ?>
	<script>
		// need to reload JS for ajax calls
		$( ".point_haut" ).click(function() {
			$(this).next(".zone_commentaire" ).toggle( "blind", 400 );
		});
	</script>
<?php endif ?>