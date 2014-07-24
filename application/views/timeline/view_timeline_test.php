<div class="container main">
	<div class="col-md-7">
		<h1>Timeline</h1>
		<?php foreach ($points as $point): ?>
			<?php $data["point"] = $point; ?>
			<?php $this->load->view("component/component_point.php", $data);?>
		<?php endforeach ?>

	</div>

	<div class="col-md-5">
		<h1>Debug</h1>

		<?php
			print_r($points);
		?>

	</div>
</div>