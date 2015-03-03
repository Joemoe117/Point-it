<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controlleur permettant de gérer les points
 * @author ballanb
 * @version 1.0
 */
class Point extends CI_Controller {

	/**
	 * Constructeur
	 */
	public function __construct()	{
		parent::__construct();

		// Redirect if no user is connected
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('point_model', "pointManager");
	}

    /**
     * @param int $id
     *      id of the point to modify
     */
	public function set($id = 0) {

		// if no point is given in argument
		if ( $id == 0){
			redirect('/timeline', 'location');
		}

		$res = $this->pointManager->getOnePoint($id);

		if ($res[0]->profil_id != $this->session->userdata('id')){
			redirect('/timeline', 'location');
		}

		/* Génération des informations du formulaire */
		$data['form_point'] = $this->pointManager->getAllType();
		$data['form_profil'] = $this->profilManager->getAll();

		$data['point'] = $res[0];

		// chargement des vues
		$data['titre'] 	= "Timeline";
		$data['menu']	= "timeline";
		$this->load->view('template/header.php', $data);
		$this->load->view('point/set.php', $data);
		$this->load->view('template/footer.php');
		
	}

}