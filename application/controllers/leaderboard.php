<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controlleur gérant la partie leaderboard du site
 * @author gauvint
 */
class Leaderboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Redirection si non connecté
		if (!$this->session->userdata('id'))
			redirect('/login', 'location');

		// Chargement des models
		$this->load->model('m_point', "pointManager");
		$this->load->model('m_leaderboard', "leaderboardManager");

	}


	/**
	 *	Page qui affichera les personnes qui ont le plus de points et sélectionner le classement par type de points
	 *
	 */
	public function index($type_point=null)	{

		$NB_PERSONNES = 20;
		$allTypePoint = $this->pointManager->getAllType();

		// Si aucun type de point n'est demandé
		if (is_null($type_point))
			$data['classement'] = $this->leaderboardManager->general($NB_PERSONNES);

		else {
			if ($this->pointManager->typePointExist($type_point))
				$data['classement'] = $this->leaderboardManager->byTypePoint($type_point, $NB_PERSONNES);
			else
				redirect('leaderboard', 'refresh');
		}

		$nb_elem_class = count($data['classement']);
		// Indiquer à la vue le nombre de personnes qu'elle doit afficher sur le podium
		if ($nb_elem_class < 3)
			$data['leader_limit'] = $nb_elem_class;
		else
			$data['leader_limit'] = 3;


		// Chargement de la vue
		$data['titre'] 	= 'Leaderboard';
		$data['menu']	= 'leaderboard';
		if (is_null($type_point))
			$data['type_point']	= null;
		else
			$data['type_point']	= $this->pointManager->getOneType($type_point);
		$data['types_point'] 	= $this->pointManager->getAllType();
		$data['nb_elem_class'] 	= $nb_elem_class;


		/* Génération des informations du formulaire */
		$data['form_point'] = $this->dataFormPoint;
		$data['form_profil'] = $this->dataFormProfil;

		// chargement des vues
		$this->load->view('template/header.php', $data);
		$this->load->view('leaderboard/view_index.php', $data);
		$this->load->view('template/footer.php');
	}
}
