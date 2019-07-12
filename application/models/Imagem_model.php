
<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Imagem_model extends CI_Model {
	
	private $table;
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->table = 'imagens';
	}

	/**
	 * Insere imagem no banco de dados
	 */
	public function save($data) {
		
		
		if($result = $this->findByURL($data['url'])) {	

			$this->edit($result->id, $data);
			$userID = $result->id;
		} else {
			$this->db->insert($this->table, $data);
			$userID = $this->db->insert_id();
		}
		if($userID) {
			return $this->find($userID);
		} else {
			return false;
		}
		
	}
	/**
	 * Atualiza os dados da imagem, através do id informado
	 */
	public function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	/**
	 * Atualiza os dados da imagem, através da url informado
	 */
	public function editByURL($url, $data) {
		$this->db->where('url', $url);
		$this->db->update($this->table, $data);
	}

	/**
	 * Busca um imagem no banco de dados, através do $id informado
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
	 * Busca usuário no banco de dados, através do $cpf informado
	 */
	public function findByURL($url) {
		$this->db->select('*')->from($this->table)->where('url', $url);
		$result = $this->db->get()->result();

		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}
}
