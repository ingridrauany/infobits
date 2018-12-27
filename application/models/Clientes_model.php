<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function buscaTodos() {
        $this->db->order_by("id", "desc");
        return $this->db->get("clientes")->result_array();
    }

    public function salva($cliente) {
        $this->db->insert("clientes", $cliente);
    }

    public function busca($id) {
        return $this->db->get_where("clientes", array("id"=>$id))->row_array();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete("clientes");
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update("clientes", $data);
    }

    public function retornaLista($limit = null, $offset = null, $tipo = null, $valor = null) {
        $this->db->order_by("id", "desc");
        if($tipo != null && $valor != null) {
            if($tipo == 'nome') {
                $this->db->or_like('nome_representante', $valor);
                $this->db->or_like('razaosocial', $valor);
            } elseif ($tipo == 'email') {
                $this->db->or_like('email_representante', $valor);
                $this->db->or_like('email_empresa', $valor);
            } else {
                $this->db->like($tipo, $valor);
            }
        }
        $query = $this->db->get("clientes", $limit, $offset);
        return $query->result();
    }

    public function CountAll() {
        return $this->db->count_all_results("clientes");
    }

    public function export_csv() {
		$this->load->dbutil();
		$this->load->helper('file');
	    $this->load->helper('download');
		$delimiter = ",";
		$newline = "\r\n";
		$filename = "clientes.csv";
		$query = "SELECT * FROM clientes";
		$result = $this->db->query($query);
		$data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
		force_download($filename, $data);
	}
}