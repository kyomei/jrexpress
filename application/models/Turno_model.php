<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Turno_model extends CI_Model {
	
	private $table;

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->table = 'turnos';
	}

	/**
	 * Busca um turno no banco de dados, através do $id informado
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
	 * Busca todos os turnos disponíveis no banco de dados
	 */
	public function findAll() {
		//$this->db->select('*')->from($this->table);
		return $this->db->get($this->table)->result();
	}

}
