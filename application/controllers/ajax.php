<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function testAjax(){
		echo "Bon, reste plus qu'a écrire cette méthode";
	}

	/**
	*	@return 	Ajoute un point en Ajax
	*
	*
	*
	*/
	public function ajouterCommentaireAjax(){

		$this->load->model('commentaire_model');

		$profil_id 	= $this->session->userdata('id');
		$point_id	= $this->input->post('point_id', TRUE);
		$texte 		= $this->input->post('texte', TRUE);


		$res = $this->commentaire_model->create( $point_id, $profil_id, $texte);

		echo "ça marche !".$texte;
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */