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


		echo "<div class=\"commentaire\">";
		echo "<img src=\"".$this->session->userdata('image')."\" class=\"img-rounded image_commentaire\">";
		echo "<a href=\"<?php echo site_url(\"profil/get/\"); echo \"/\"".$this->session->userdata('id')."\">".$this->session->userdata('login')."</a>";
		echo "<span class=\"point_date pull-right\">";
		echo "Le ".date("d/m/y à H:i", now());
		echo "</span><br>";
		echo $texte;
		echo "</div>";	
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */  