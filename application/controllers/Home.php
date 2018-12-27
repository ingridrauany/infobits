<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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

    public function new() {
        $this->form_validation->set_rules("nome", "nome", "required");
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $cliente = array(
                "nome" => $this->input->post("nome"),
                "email" => $this->input->post("email"),
                "telefone" => $this->input->post("telefone"),
                "cnpj" => $this->input->post("cnpj"),
                "cep" => $this->input->post("cep"),
                "rua" => $this->input->post("rua"),
                "numero" => $this->input->post("numero"),
                "bairro" => $this->input->post("bairro"),
                "complemento" => $this->input->post("complemento"),
                "cidade" => $this->input->post("cidade"),
                "estado" => $this->input->post("estado"),
                "nome_representante" => $this->input->post("nome_representante"),
                "cpf_representante" => $this->input->post("cpf_representante"),
                "tel_representante" => $this->input->post("tel_representante"),
                "estado_civil" => $this->input->post("estado_civil")
            );
            
            $this->load->model("Clientes_model");
            $this->Clientes_model->salva($cliente);
            $this->session->set_flashdata("success", "Cliente cadastrado com sucesso!");
    
            redirect("/clientes");
        } else {
            $this->load->template("clientes/create");
        } 
    }

    public function create() {
        $this->load->template("clientes/create");
    }

    public function view($id) {
        $this->load->model("Clientes_model");
        $cliente = $this->Clientes_model->busca($id);

        $dados = array("cliente" => $cliente);

        $this->load->template("clientes/view", $dados);
    }

    public function delete($id) {
        $this->load->model("Clientes_model");
        $this->Clientes_model->delete($id);
        redirect("/clientes");
    }

    public function edit($id) {
        $this->load->model("Clientes_model");

        $dados['cliente'] = $this->Clientes_model->busca($id);

        $this->load->template('clientes/edit', $dados);
    }

    public function update($id) {
        $this->form_validation->set_rules("nome", "nome", "required");
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $cliente = array(
                "nome" => $this->input->post("nome"),
                "email" => $this->input->post("email"),
                "telefone" => $this->input->post("telefone"),
                "cnpj" => $this->input->post("cnpj"),
                "cep" => $this->input->post("cep"),
                "rua" => $this->input->post("rua"),
                "numero" => $this->input->post("numero"),
                "bairro" => $this->input->post("bairro"),
                "complemento" => $this->input->post("complemento"),
                "cidade" => $this->input->post("cidade"),
                "estado" => $this->input->post("estado"),
                "nome_representante" => $this->input->post("nome_representante"),
                "cpf_representante" => $this->input->post("cpf_representante"),
                "tel_representante" => $this->input->post("tel_representante"),
                "estado_civil" => $this->input->post("estado_civil")
            );
            
            $this->load->model("Clientes_model");
            $this->Clientes_model->update($id, $cliente);
            $this->session->set_flashdata("success", "Cliente alterado com sucesso!");
    
            redirect("/clientes");
        } else {
            $this->load->template("clientes/create");
        } 
    }
}