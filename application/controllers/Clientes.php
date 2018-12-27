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
        
        $config = array (
            "base_url" => base_url('clientes/p'),
            "per_page" => 5,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->Clientes_model->CountAll(),
            "prev_link" => "< Anterior",
            "next_link" => "Próximo >"
        );

        $this->pagination->initialize($config);

        $dados['pagination'] = $this->pagination->create_links();
        $offset = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $dados['clientes'] = $this->Clientes_model->retornaLista($config['per_page'], $offset, null, null);
        
        $this->load->template("clientes/index.php", $dados);
    }

    public function new() {
        $this->form_validation->set_rules("nome_representante", "nome_representante", "required");
        $this->form_validation->set_rules("tipo_cliente", "tipo_cliente", "required");
        $this->form_validation->set_rules("cpf_representante", "cpf_representante", "required");
        $this->form_validation->set_rules("tel_representante", "tel_representante", "required");
        $this->form_validation->set_rules("estado_civil", "estado_civil", "required");
        $this->form_validation->set_rules("email_representante", "email_representante", "required");
        $this->form_validation->set_rules("cep_representante", "cep_representante", "required");
        $this->form_validation->set_rules("numero_representante", "numero_representante", "required");
        $this->form_validation->set_rules("rua_representante", "rua_representante", "required");
        $this->form_validation->set_rules("bairro_representante", "bairro_representante", "required");
        $this->form_validation->set_rules("cidade_representante", "cidade_representante", "required");
        $this->form_validation->set_rules("estado_representante", "estado_representante", "required");
        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $cliente = array(
                //cliente
                "tipo_cliente" => $this->input->post("tipo_cliente"),
                "nome_representante" => $this->input->post("nome_representante"),
                "cpf_representante" => $this->input->post("cpf_representante"),
                "tel_representante" => $this->input->post("tel_representante"),
                "estado_civil" => $this->input->post("estado_civil"),
                "email_representante" => $this->input->post("email_representante"),
                "cep_representante" => $this->input->post("cep_representante"),
                "numero_representante" => $this->input->post("numero_representante"),
                "rua_representante" => $this->input->post("rua_representante"),
                "bairro_representante" => $this->input->post("bairro_representante"),
                "cidade_representante" => $this->input->post("cidade_representante"),
                "estado_representante" => $this->input->post("estado_representante"),
                "complemento_representante" => $this->input->post("complemento_representante"),

                //empresa
                "razaosocial" => $this->input->post("razaosocial"),
                "cnpj" => $this->input->post("cnpj"),
                "email_empresa" => $this->input->post("email_empresa"),
                "telefone_empresa" => $this->input->post("telefone_empresa"),
                "cep_empresa" => $this->input->post("cep_empresa"),
                "numero_empresa" => $this->input->post("numero_empresa"),
                "rua_empresa" => $this->input->post("rua_empresa"),
                "bairro_empresa" => $this->input->post("bairro_empresa"),
                "cidade_empresa" => $this->input->post("cidade_empresa"),
                "estado_empresa" => $this->input->post("estado_empresa"),
                "complemento_empresa" => $this->input->post("complemento_empresa")
            );
            
            $this->load->model("Clientes_model");
            $this->Clientes_model->salva($cliente);
            $this->session->set_flashdata("success", "Cliente cadastrado com sucesso!");
    
            redirect("/clientes");
        } else {
            $this->session->set_flashdata("danger", "Erro ao cadastrar cliente, verifique se os dados foram preenchidos corretamente!");
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
        $this->session->set_flashdata("success", "Cliente excluído com sucesso!");
        redirect("/clientes");
    }

    public function edit($id) {
        $this->load->model("Clientes_model");

        $dados['cliente'] = $this->Clientes_model->busca($id);

        $this->load->template('clientes/edit', $dados);
    }

    public function print($id) {
        $this->load->model("Clientes_model");
        $cliente = $this->Clientes_model->busca($id);

        $dados = array("cliente" => $cliente);

        $this->load->template_print("clientes/print", $dados);
    }

    public function update($id) {
        $this->form_validation->set_rules("nome_representante", "nome_representante", "required");
        $this->form_validation->set_rules("tipo_cliente", "tipo_cliente", "required");
        $this->form_validation->set_rules("cpf_representante", "cpf_representante", "required");
        $this->form_validation->set_rules("tel_representante", "tel_representante", "required");
        $this->form_validation->set_rules("estado_civil", "estado_civil", "required");
        $this->form_validation->set_rules("email_representante", "email_representante", "required");
        $this->form_validation->set_rules("cep_representante", "cep_representante", "required");
        $this->form_validation->set_rules("numero_representante", "numero_representante", "required");
        $this->form_validation->set_rules("rua_representante", "rua_representante", "required");
        $this->form_validation->set_rules("bairro_representante", "bairro_representante", "required");
        $this->form_validation->set_rules("cidade_representante", "cidade_representante", "required");
        $this->form_validation->set_rules("estado_representante", "estado_representante", "required");

        $sucesso = $this->form_validation->run();

        if($sucesso) {
            $cliente = array(
                //cliente
                "tipo_cliente" => $this->input->post("tipo_cliente"),
                "nome_representante" => $this->input->post("nome_representante"),
                "cpf_representante" => $this->input->post("cpf_representante"),
                "tel_representante" => $this->input->post("tel_representante"),
                "estado_civil" => $this->input->post("estado_civil"),
                "email_representante" => $this->input->post("email_representante"),
                "cep_representante" => $this->input->post("cep_representante"),
                "numero_representante" => $this->input->post("numero_representante"),
                "rua_representante" => $this->input->post("rua_representante"),
                "bairro_representante" => $this->input->post("bairro_representante"),
                "cidade_representante" => $this->input->post("cidade_representante"),
                "estado_representante" => $this->input->post("estado_representante"),
                "complemento_representante" => $this->input->post("complemento_representante"),

                //empresa
                "razaosocial" => $this->input->post("razaosocial"),
                "cnpj" => $this->input->post("cnpj"),
                "email_empresa" => $this->input->post("email_empresa"),
                "telefone_empresa" => $this->input->post("telefone_empresa"),
                "cep_empresa" => $this->input->post("cep_empresa"),
                "numero_empresa" => $this->input->post("numero_empresa"),
                "rua_empresa" => $this->input->post("rua_empresa"),
                "bairro_empresa" => $this->input->post("bairro_empresa"),
                "cidade_empresa" => $this->input->post("cidade_empresa"),
                "estado_empresa" => $this->input->post("estado_empresa"),
                "complemento_empresa" => $this->input->post("complemento_empresa")
            );
            
            $this->load->model("Clientes_model");
            $this->Clientes_model->update($id, $cliente);
            $this->session->set_flashdata("success", "Cliente alterado com sucesso!");
    
            redirect("/clientes");
        } else {
            $this->load->template("clientes/create");
        } 
    }

    function valid_cpf($cpf) {
        // Verifiva se o número digitado contém todos os digitos
        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
     
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
     
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    // Export tabela para formato CSV 
    public function exportCSV(){ 
        $this->load->model('Clientes_model');
        $this->Clientes_model->export_csv();
    }

    public function pesquisa() {
        $this->load->model("Clientes_model");
        
        $config = array (
            "base_url" => base_url('clientes/pesquisa/p'),
            "per_page" => 5,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->Clientes_model->CountAll(),
            "prev_link" => "< Anterior",
            "next_link" => "Próximo >"
        );

        $this->pagination->initialize($config);
        $tipo = $this->input->post("pesquisa");
        $valor = $this->input->post("pesquisa_content");

        $dados['pagination'] = $this->pagination->create_links();
        $offset = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
        $dados['clientes'] = $this->Clientes_model->retornaLista($config['per_page'], $offset, $tipo, $valor);
        
        $this->load->template("clientes/index.php", $dados);
    }
}