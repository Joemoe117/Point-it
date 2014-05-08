<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller {

	public function point_multi() {
		$this->load->model('point_model');

		echo "<pre>";
		echo print_r($this->point_model->getAllPoints());
		echo "</pre>";
	}

	public function verif_form() {
		$string = "Salut les loulous";
		$int = "3";

		var_dump(intval($string));
		var_dump(intval($int));
	}

}