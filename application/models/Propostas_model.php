<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propostas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function buscaTodos() {
        $this->db->order_by("id", "desc");
        return $this->db->get("propostas")->result_array();
    }

    public function salva($proposta) {
        $this->db->insert("propostas", $proposta);
    }

    public function busca($id) {
        return $this->db->get_where("propostas", array("id"=>$id))->row_array();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete("propostas");
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update("propostas", $data);
    }

    public function buscaviaCliente($id) {
       $this->db->select('propostas.id, propostas.titulo, propostas.id_cliente');
       $this->db->from('propostas');
       $this->db->join('clientes', 'clientes.id = propostas.id_cliente');
       $this->db->where(array('clientes.id' => $id));
       $result = $this->db->get();
       return $result->result();
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
        $query = $this->db->get("propostas", $limit, $offset);
        return $query->result();
    }

    public function CountAll() {
        return $this->db->count_all_results("propostas");
    }

    public function export_csv() {
		$this->load->dbutil();
		$this->load->helper('file');
	    $this->load->helper('download');
		$delimiter = ",";
		$newline = "\r\n";
		$filename = "propostas.csv";
		$query = "SELECT * FROM propostas";
		$result = $this->db->query($query);
		$data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
		force_download($filename, $data);
	}
}