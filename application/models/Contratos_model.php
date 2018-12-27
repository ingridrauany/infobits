<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function buscaTodos() {
        $this->db->order_by("id", "desc");
        return $this->db->get("contratos")->result_array();
    }

    public function salva($contrato) {
        $this->db->insert("contratos", $contrato);
    }

    public function busca($id) {
        return $this->db->get_where("contratos", array("id"=>$id))->row_array();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete("contratos");
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update("contratos", $data);
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
        $query = $this->db->get("contratos", $limit, $offset);
        return $query->result();
    }

    public function CountAll() {
        return $this->db->count_all_results("contratos");
    }

    public function export_csv() {
		$this->load->dbutil();
		$this->load->helper('file');
	    $this->load->helper('download');
		$delimiter = ",";
		$newline = "\r\n";
		$filename = "contratos.csv";
		$query = "SELECT * FROM contratos";
		$result = $this->db->query($query);
		$data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
		force_download($filename, $data);
	}
}