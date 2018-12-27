<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contratos extends CI_Controller {

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
        $dados['clientes'] = $this->Clientes_model->buscaTodos();

        //load propostas titles
        $this->load->model("Propostas_model");
        $dados['propostas']  = $this->Propostas_model->buscaTodos();

        $this->load->model("Contratos_model");
        
        $config = array (
            "base_url" => base_url('contratos/p'),
            "per_page" => 5,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->Contratos_model->CountAll(),
            "prev_link" => "< Anterior",
            "next_link" => "Próximo >"
        );

        $this->pagination->initialize($config);

        $dados['pagination'] = $this->pagination->create_links();
        $offset = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $dados['contratos'] = $this->Contratos_model->retornaLista($config['per_page'], $offset, null, null);
        
        $this->load->template("contratos/index", $dados);
    }

    public function new() {
        $this->form_validation->set_rules("id_cliente", "id_cliente", "required");
        $this->form_validation->set_rules("id_proposta", "id_proposta", "required");
        $this->form_validation->set_rules("status", "status", "required");
        $this->form_validation->set_rules("envio_contrato", "envio_contrato", "required");
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $contrato = array(
                "id_cliente" => $this->input->post("id_cliente"),
                "id_proposta" => $this->input->post("id_proposta"),
                "data_inicio" => $this->input->post("data_inicio"),
                "status" => $this->input->post("status"),
                "valor" => $this->input->post("valor"),
                "envio_contrato" => $this->input->post("envio_contrato"),
                "data_fim" => $this->input->post("data_fim"),
                "arquivo" => $this->input->post("arquivo")
            );
            
            $this->load->model("Contratos_model");
            $this->Contratos_model->salva($contrato);
            $this->session->set_flashdata("success", "Contrato cadastrado com sucesso!");
    
            redirect("/contratos");
        } else {
            $this->load->template("contratos/create");
        } 
    }

    public function create() {
        //load clients names
        $this->load->model("Clientes_model");
        $dados['clientes'] = $this->Clientes_model->buscaTodos();

        $this->load->template("contratos/create", $dados);
    }

    public function view($id) {
        $this->load->model("Propostas_model");
        $this->load->model("Clientes_model");
        $this->load->model("Contratos_model");
        $dados['clientes'] = $this->Clientes_model->buscaTodos();
        $dados['propostas'] = $this->Propostas_model->buscaTodos();
        $dados['contrato'] = $this->Contratos_model->busca($id);

        $this->load->template("contratos/view", $dados);
    }

    public function delete($id) {
        $this->load->model("Contratos_model");
        $this->Contratos_model->delete($id);
        redirect("/contratos");
    }

    public function edit($id) {
        $this->load->model("Propostas_model");
        $this->load->model("Clientes_model");
        $this->load->model("Contratos_model");
        $dados['clientes'] = $this->Clientes_model->buscaTodos();
        $dados['propostas'] = $this->Propostas_model->buscaTodos();
        $dados['contrato'] = $this->Contratos_model->busca($id);

        $this->load->template('contratos/edit', $dados);
    }

    public function print($id) {
        $this->load->model("Contratos_model");
        $contrato = $this->Contratos_model->busca($id);

        $dados = array("contrato" => $contrato);

        $this->load->template_print("contratos/print", $dados);
    }

    public function update($id) {
        $this->form_validation->set_rules("id_cliente", "id_cliente", "required");
        $this->form_validation->set_rules("id_proposta", "id_proposta", "required");
        $this->form_validation->set_rules("status", "status", "required");
        $this->form_validation->set_rules("envio_contrato", "envio_contrato", "required");
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $contrato = array(
                "id_cliente" => $this->input->post("id_cliente"),
                "id_proposta" => $this->input->post("id_proposta"),
                "data_inicio" => $this->input->post("data_inicio"),
                "status" => $this->input->post("status"),
                "valor" => $this->input->post("valor"),
                "envio_contrato" => $this->input->post("envio_contrato"),
                "data_fim" => $this->input->post("data_fim"),
                "arquivo" => $this->input->post("arquivo")
            );
            
            $this->load->model("Contratos_model");
            $this->Contratos_model->update($id, $contrato);
            $this->session->set_flashdata("success", "Contrato alterado com sucesso!");
    
            redirect("/contratos");
        } else {
            $this->load->template("contratos/create");
        } 
    }

    public function myformAjax($id) { 
        $this->load->model("Propostas_model");
        $result = $this->Propostas_model->buscaviaCliente($id);
        echo json_encode($result);
    }

    public function exportCSV(){ 
        $this->load->model('Contratos_model');
        $this->Contratos_model->export_csv();
    }

    public function pesquisa() {
        $this->load->model("Contratos_model");
        
        $config = array (
            "base_url" => base_url('contratos/pesquisa/p'),
            "per_page" => 1,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->Contratos_model->CountAll(),
            "prev_link" => "< Anterior",
            "next_link" => "Próximo >"
        );

        $this->pagination->initialize($config);
        $tipo = $this->input->post("pesquisa");
        $valor = $this->input->post("pesquisa_content");

        $dados['pagination'] = $this->pagination->create_links();
        $offset = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $dados['contratos'] = $this->Contratos_model->retornaLista($config['per_page'], $offset, $tipo, $valor);
        
        $this->load->template("contratos/index.php", $dados);
    }
}