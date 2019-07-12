<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Turno_Usuario_model extends CI_Model {
	
	private $table;

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->table = 'turnos_usuarios';
	}

	/**
	 * Insere a associação de turnos com usuário no banco de dados
	 */
	public function save($data) {
		
		// verifica se foi encontrado algum turno para esse usuário
		if($result = $this->findByUsuario($data['usuario_id'])) {
			// Array para salvar os turnos que usuário já tem no banco de dados
			$turnos_user = array();
			// Percorre todos os turnos do usuario e guarda no array $turnos_user
			foreach($result as $value) {
				$turnos_user[] = $value->turno_id;	
			}
			// Verifica se o turno enviado no $data['turno_id'] já existe no array $turnos_user
			if (!in_array($data['turno_id'], $turnos_user)) { 
				// Turno que não tiver no array $turnos_user insere no banco de dados
				if($this->db->insert($this->table, $data)) {
					return true;
				} else {
					return false;
				}
			} 

		}
		// Se não encontrar nenhum usuario no banco com id do $data['usuario_id'] então insere
		$this->db->insert($this->table, $data);		
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
	 * Busca os turnos de um determinado usuário
	 */
	public function findByUsuario($usuario_id) {
		$this->db->select('*')->from($this->table)->where('usuario_id', $usuario_id);
		return $this->db->get()->result();
	}

	/**
	 * Busca os usuarios de um determinado turno
	 */
	public function findByTurno($turno_id) {
		$this->db->select('*')->from($this->table)->where('turno_id', $turno_id);
		return $this->db->get()->restul();
	}

	/**
	 * Busca todos os turnos disponíveis no banco de dados
	 */
	public function findAll() {
		//$this->db->select('*')->from($this->table);
		return $this->db->get($this->table)->result();
	}

}
