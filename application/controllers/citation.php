<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controleur gérant les citations
 * @author ballanb
 */
class Citation extends CI_Controller {


	/**
	 * Constructeur
	 */
	public function __construct()	{
		parent::__construct();

		// Redirection si non connecté
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('m_commentaire', "commentaireManager");
        $this->load->model('m_citation', "citationManager");

		// Chargement header
		$this->load->view('template/header.php');
	}

    /**
     * Display the citations of the given user
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function user($id = 0){
        if ($id = 0){
            show_404();
        }

        // données du header
        $data['titre'] = "Profil de " . $data['profil']->profil_nom;
        $data['menu'] = "profil";

        // chargement des vues
        $this->load->view('template/header.php', $data);
        $this->load->view('profil/view_profil.php', $data);
        $this->load->view('template/footer.php');

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/commentaire.php */
