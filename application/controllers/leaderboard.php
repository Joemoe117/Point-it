<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// Redirection si non connecté
		if (!$this->session->userdata('id'))
			redirect('/login', 'location');

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('point_model');
		$this->load->model('classement_model');

	}


	/**
	 *	Page qui affichera les personnes qui ont le plus de points et sélectionner le classement par type de points 
	 *
	 */
	public function index()	{

		$data['classement'] = $this->classement_model->general();
		$data['types_point'] = $this->point_model->getAlltype();

		echo '<pre>';
		var_dump($this->classement_model->general());
		echo '</pre>';

		// Chargement de la vue
		$data['titre'] = 'Leaderboard';

		$this->load->view('template/header.php', $data);
		$this->load->view('leaderboard/view_index.php', $data);
		$this->load->view('template/footer.php');
	}

	/**
	 * 	 
	 *
	 */


}