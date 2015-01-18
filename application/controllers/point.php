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
	 * Route qui renvoie par défaut sur le profil de la personne connecté
	 * @return [type]
	 */
	public function set($id = 0) {

		// if no point is given in argument
		if ( $id == 0){
			redirect('/timeline', 'location');
		}

		$res = $this->pointManager->read($id);
	}

}