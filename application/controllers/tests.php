<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller {

	public function point_multi() {
		$this->load->model('point_model');

		echo "<pre>";
		echo print_r($this->point_model->getAllPoints());
		echo "</pre>";
	}

}