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
	public function index($type_point=null)	{

		$NB_PERSONNES = 20;
		$allTypePoint = $this->point_model->getAllType();

		if (is_null($type_point))
			$data['classement'] = $this->classement_model->general($NB_PERSONNES);
		else {
			$exist = false;
			foreach ($allTypePoint as $value) {
				if ($type_point == $value->typept_nom) {
					$exist = true;
					break;
				}
			}

			if ($exist)
				$data['classement'] = $this->classement_model->byTypePoint($type_point, $NB_PERSONNES);
			else
				redirect('/leaderboard', 'refresh');
		}
		// echo '<pre>';
		// var_dump($data['classement']);
		// echo '</pre>';
		

		// Chargement de la vue
		$data['titre'] 	= 'Leaderboard';
		$data['menu']	= 'leaderboard';
		$data['type_point']	= $type_point;
		$data['types_point'] = $this->point_model->getAllType();

		$this->load->view('template/header.php', $data);
		$this->load->view('leaderboard/view_index.php', $data);
		$this->load->view('template/footer.php');
	}

	/**
	 * 	 
	 *
	 */


}