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
	public function Save($data) {
		$this->db->insert('usuarios', $data);
		$userID = $this->db->insert_id();
		if($userID) {
			return $this->find($userID);
		} else {
			return false;
		}
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
}
