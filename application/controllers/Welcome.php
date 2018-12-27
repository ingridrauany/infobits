<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        
        if (!$this->ion_auth->logged_in()){
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
	}
	
    public function index() {
        $this->load->model("Clientes_model");
        $clientes = $this->Clientes_model->buscaTodos();

        $dados = array("clientes" => $clientes);
    
        $this->load->template("clientes/index.php", $dados);
    }
}