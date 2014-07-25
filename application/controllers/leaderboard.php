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

		// Si aucun type de point n'est demandé
		if (is_null($type_point))
			$data['classement'] = $this->classement_model->general($NB_PERSONNES);

		else {
			if ($this->point_model->typePointExist($type_point))
				$data['classement'] = $this->classement_model->byTypePoint($type_point, $NB_PERSONNES);
			else
				redirect('leaderboard', 'refresh');
		}

		$nb_elem_class = count($data['classement']);
		// Indiquer à la vue le nombre de personnes qu'elle doit afficher sur le podium
		if ($nb_elem_class < 3)
			$data['leader_limit'] = $nb_elem_class;
		else
			$data['leader_limit'] = 3;

		
		// echo '<pre>';
		// var_dump($data['classement']);
		// echo '</pre>';

		// Chargement de la vue
		$data['titre'] 	= 'Leaderboard';
		$data['menu']	= 'leaderboard';
		$data['type_point']	= $type_point;
		$data['types_point'] = $this->point_model->getAllType();
		$data['nb_elem_class'] = $nb_elem_class;

		$this->load->view('template/header.php', $data);
		$this->load->view('leaderboard/view_index.php', $data);
		$this->load->view('template/footer.php');
	}

	/**
	 * 	 
	 *
	 */


}