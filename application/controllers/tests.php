<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests extends CI_Controller {

	public function index() {

		echo date('Y-m-d H:i:s', now());
	}

}