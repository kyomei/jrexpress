
<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Veiculo_model extends CI_Model {
	
	private $table;
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->table = 'veiculos';
	}

	/**
	 * Insere veiculo no banco de dados
	 */
	public function save($data) {
		// $this->db->insert($this->table, $data);
		
		if($result = $this->findByPlaca($data['placa'])) {	

			if($result->usuario_id == $data['usuario_id']) {

				$this->edit($result->id, $data);
				$id = $result->id;
			} else {
				$this->db->insert($this->table, $data);
				$id = $this->db->insert_id();
			}
		} else {
			$this->db->insert($this->table, $data);
			$id = $this->db->insert_id();
		}
		if($id) {
			return $this->find($id);
		} else {
			return false;
		}
		
		
	}
	/**
	 * Atualiza os dados da veiculo, através do id informado
	 */
	public function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	/**
	 * Atualiza os dados da veiculo, através da placa informado
	 */
	public function editByPlaca($placa, $data) {
		$this->db->where('placa', $placa);
		$this->db->update($this->table, $data);
	}

	/**
	 * Busca um veiculo no banco de dados, através do $id informado
	 */
	public function find($id) {
		$this->db->select('*')->from($this->table)->where('id', $id);
		$result = $this->db->get()->result();

		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}

	/**
	 * Busca veiculo no banco de dados, através do $placa informado
	 */
	public function findByPlaca($placa) {
		$this->db->select('*')->from($this->table)->where('placa', $placa);
		$result = $this->db->get()->result();

		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}
}
