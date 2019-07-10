<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function registerEtapa1()
    {
        $this->load->library('form_validation');

        // regras de validação
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]|max_length[150]');
        $this->form_validation->set_rules('nascimento', 'Nascimento', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('cpf', 'cpf', 'trim|required|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('cnh', 'cnh', 'trim|required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('celular', 'Celular', 'trim|required|max_length[15]');

        // Verifica se houve errors
        if ($this->form_validation->run() == false) {
			print_r(validation_errors());
        } else {
			$data['formErrors'] = null;
			
			$formData = $this->input->post();
			$this->load->model('Usuario_model');
			$result = $this->Usuario_model->save($formData);
			if($result) {
				print_r($result);
			} else {
				echo "Oops, ocorreu algum erro ao adicionar usuário!";
			}
        }
	}
	
}
