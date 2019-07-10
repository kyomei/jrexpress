<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Insere um usuário no banco de dados
	 */
	public function save($data) {
		if($result = $this->findByCPF($data['cpf'])) {	
			
			// $this->db->where('id', $result->id);
			// $this->db->update('usuarios', $data);

			$this->editByCPF($result->cpf, $data);
			$userID = $result->id;
		} else {
			$this->db->insert('usuarios', $data);
			$userID = $this->db->insert_id();
		}
		if($userID) {
			return $this->find($userID);
		} else {
			return false;
		}
	}
	/**
	 * Atualiza os dados do usuário
	 */
	public function editByCPF($cpf, $data) {
		$this->db->where('cpf', $cpf);
		$this->db->update('usuarios', $data);
	}

	/**
	 * Busca um usuário no banco de dados, através do $id informado
	 */
	public function find($id) {
		$this->db->select('*')->from('usuarios')->where('id', $id);
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
	public function findByCPF($cpf) {
		$this->db->select('*')->from('usuarios')->where('cpf', $cpf);
		$result = $this->db->get()->result();

		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}
}
