<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Propostas extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        
        if (!$this->ion_auth->logged_in()){
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
    
    public function index() {
        //load clients names
        $this->load->model("Clientes_model");
        $dados['clientes']  = $this->Clientes_model->buscaTodos();

        $this->load->model("Propostas_model");
        
        $config = array (
            "base_url" => base_url('propostas/p'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->Propostas_model->CountAll(),
            "prev_link" => "< Anterior",
            "next_link" => "Próximo >"
        );

        $this->pagination->initialize($config);

        $dados['pagination'] = $this->pagination->create_links();
        $offset = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $dados['propostas'] = $this->Propostas_model->retornaLista($config['per_page'], $offset);
        
        $this->load->template("propostas/index", $dados);
    }

    public function new() {
        $this->form_validation->set_rules("id_cliente", "id_cliente", "required");
        $this->form_validation->set_rules("data", "data", "required");
        $this->form_validation->set_rules("status", "status", "required");
        $this->form_validation->set_rules("envio_proposta", "envio_proposta", "required");

        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $proposta = array(
                "id_cliente" => $this->input->post("id_cliente"),
                "status" => $this->input->post("status"),
                "titulo" => $this->input->post("titulo"),
                "data" => $this->input->post("data"),
                "forma_pagamento" => $this->input->post("forma_pagamento"),
                "servicos" => $this->input->post("servicos"),
                "envio_proposta" => $this->input->post("envio_proposta"),
                "proposta_conteudo" => $this->input->post("proposta_conteudo")
            );
            
            $this->load->model("Propostas_model");
            $this->Propostas_model->salva($proposta);
            $this->session->set_flashdata("success", "Proposta cadastrada com sucesso!");
    
            redirect("/propostas");
        } else {
            $this->load->template("propostas/create");
        } 
    }

    public function create() {
        //load clients names
        $this->load->model("Clientes_model");
        $clientes = $this->Clientes_model->buscaTodos();

        $dados = array("clientes" => $clientes);
        $this->load->template("propostas/create", $dados);
    }

    public function view($id) {
        $this->load->model("Propostas_model");
        $dados['proposta']  = $this->Propostas_model->busca($id);

        //load clients names
        $this->load->model("Clientes_model");
        $dados['clientes'] = $this->Clientes_model->buscaTodos();

        $this->load->template("propostas/view", $dados);
    }

    public function delete($id) {
        $this->load->model("Propostas_model");
        $this->Propostas_model->delete($id);
        redirect("/propostas");
    }

    public function edit($id) {
        $this->load->model("Propostas_model");
        //load clients names
        $this->load->model("Clientes_model");
        $dados['clientes'] = $this->Clientes_model->buscaTodos();

        $dados['proposta'] = $this->Propostas_model->busca($id);

        $this->load->template('propostas/edit', $dados);
    }

    public function print($id) {
        $this->load->model("Clientes_model");
        $dados['clientes'] = $this->Clientes_model->buscaTodos();

        $this->load->model("Propostas_model");
        $dados['proposta'] = $this->Propostas_model->busca($id);

        $this->load->template_print("propostas/print", $dados);
    }

    public function update($id) {
        $this->form_validation->set_rules("id_cliente", "id_cliente", "required");
        $this->form_validation->set_rules("data", "data", "required");
        $this->form_validation->set_rules("status", "status", "required");
        $this->form_validation->set_rules("envio_proposta", "envio_proposta", "required");

        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $proposta = array(
                "id_cliente" => $this->input->post("id_cliente"),
                "status" => $this->input->post("status"),
                "data" => $this->input->post("data"),
                "titulo" => $this->input->post("titulo"),
                "forma_pagamento" => $this->input->post("forma_pagamento"),
                "servicos" => $this->input->post("servicos"),
                "valor" => $this->input->post("valor"),
                "envio_proposta" => $this->input->post("envio_proposta"),
                "proposta_conteudo" => $this->input->post("proposta_conteudo")
            );
            
            $this->load->model("Propostas_model");
            $this->Propostas_model->update($id, $proposta);
            $this->session->set_flashdata("success", "Proposta alterada com sucesso!");
    
            redirect("/propostas");
        } else {
            $this->load->template("propostas/create");
        } 
    }

    // Export tabela para formato CSV 
    public function exportCSV(){ 
        $this->load->model('Propostas_model');
        $this->Propostas_model->export_csv();
    }

    public function pesquisa() {
        $this->load->model("Propostas_model");
        
        $config = array (
            "base_url" => base_url('propostas/pesquisa/p'),
            "per_page" => 1,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->Propostas_model->CountAll(),
            "prev_link" => "< Anterior",
            "next_link" => "Próximo >"
        );

        $this->pagination->initialize($config);
        $tipo = $this->input->post("pesquisa");
        $valor = $this->input->post("pesquisa_content");

        $dados['pagination'] = $this->pagination->create_links();
        $offset = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $dados['propostas'] = $this->Propostas_model->retornaLista($config['per_page'], $offset, $tipo, $valor);
        
        $this->load->template("proppostas/index.php", $dados);
    }
}