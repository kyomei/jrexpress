<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	
	function __construct() {
		parent::__construct();
		
		// Initializing a session
		$this->load->library('session');

		// Initilizing a form validation
		$this->load->library('form_validation');
		
		// Load model usuario
		$this->load->model('Usuario_model');
	}
    public function registerEtapa1()
    {
        // regras de validação
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]|max_length[150]');
        $this->form_validation->set_rules('nascimento', 'Nascimento', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[14]|max_length[14]');
        $this->form_validation->set_rules('cnh', 'CNH', 'trim|required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|min_length[14]|max_length[14]');
		$this->form_validation->set_rules('celular', 'Celular', 'trim|required|max_length[15]');
		
        // Verifica se houve errors
        if ($this->form_validation->run() == false) {
			$formErrors = validation_errors();
			echo $formErrors;
			exit;
        } else {
			$data['formErrors'] = null;
			
			$formData = $this->input->post();
			$formData['nascimento'] = date('Y-m-d', strtotime($this->input->post('nascimento')));
			$result = $this->Usuario_model->save($formData);
			if($result) {
				print_r($result);
				echo "<hr>";
				$this->session->set_userdata('user_cpf',$result->cpf);
				$this->session->set_userdata('user_id',$result->id);
			} else {
				echo "Oops, ocorreu algum erro no cadastro";
			}
        }
	}
	public function registerEtapa2()
	{
		// Regras de validação
		$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		$this->form_validation->set_rules('estadoCivil', 'Estado civil', 'required');
		$this->form_validation->set_rules('moradia', 'Moradia', 'required');
		$this->form_validation->set_rules('cep', 'CEP', 'required|max_length[9]');
		$this->form_validation->set_rules('numero', 'Número', 'required');
		

		// Verifica se houve errors
		if ($this->form_validation->run() == false) {
			$formErrors = validation_errors();
			echo $formErrors;
			echo "error";
			exit;
		} else {
			$data['formErrors'] = null;

			// Inserindo cadastro do usuário
			
			$data = array(
				'id' => $this->session->userdata('user_id'),
				'cpf' => $this->session->userdata('user_cpf'),
				'sexo' => $this->input->post('sexo'),
				'estadoCivil' => $this->input->post('estadoCivil'),
				'filhos' => $this->input->post('filhos'),
				'moradia' => $this->input->post('moradia'),
			); 
			if($this->Usuario_model->save($data)) {
				// Inserindo o endereço do usuário
				$endereco = array(
				'usuario_id' => $this->session->userdata('user_id'),
				'logradouro' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'estado' => $this->input->post('estado')
				);
				$this->load->model('Endereco_model');
				$this->Endereco_model->save($endereco);
			} else {
				echo "Oops, ocorreu algum erro no cadastro!";
			}
		}

		echo $data['formErrors'];
	}
	public function registerEtapa3()
	{	
		
		// Regras de validação		
		$this->form_validation->set_rules('trabalha', 'Trabalha', 'required');		
		$this->form_validation->set_rules('ativRemunerada', 'Atividade Remunerada', 'required');
		$this->form_validation->set_rules('psicotecnico', 'Exame psicotécnico', 'required');
		$this->form_validation->set_rules('curso', 'Curso', 'required');		
		if (empty($_FILES['fotoPerfil']['name']))
			$this->form_validation->set_rules('fotoPerfil', 'Foto Perfil', 'required');
		if (empty($_FILES['fotoComprovanteEndereco']['name']))
			$this->form_validation->set_rules('fotoComprovanteEndereco', 'Foto Comprovante de Endereço', 'required');
		if (empty($_FILES['fotoHabilitacao']['name']))
			$this->form_validation->set_rules('fotoHabilitacao', 'Foto Habilitação', 'required');
		

		// Verifica se houve errors
		if ($this->form_validation->run() == false) {
			$formErrors = validation_errors();
			print_r($formErrors);
			echo "error";
			exit;
		} else {
			$data['formErrors'] = null;

			// Inserindo cadastro do usuário			
			$data = array(
				'id' => $this->session->userdata('user_id'),
				'cpf' => $this->session->userdata('user_cpf'),
				'trabalhaAtualmente' => $this->input->post('trabalha'),
				'ativRemunerada' => $this->input->post('ativRemunerada'),
				'psicotecnico' => $this->input->post('psicotecnico'),
				'curso' => $this->input->post('curso'),
			);
			if($this->Usuario_model->save($data)) {
				// Carrega model Turno_Usuario
				$this->load->model('Turno_Usuario_model');
				
				// Recupera os valores do input turno em array
				$turnos = $this->input->post('turno');

				// Insere item por item do array retornado
				foreach($turnos as $value) {
					$data = array('turno_id' => $value, 'usuario_id' => $this->session->userdata('user_id'));
					$resultado = $this->Turno_Usuario_model->save($data);
				}
				// Upload das imagens
				$caminho = 'usuarios/'.$this->session->userdata('user_cpf');
				$this->upload_image('fotoPerfil', 'Foto de perfil', $caminho);
				$this->upload_image('fotoComprovanteEndereco', 'Foto do comprovante de Endereço', $caminho);
				$this->upload_image('fotoHabilitacao', 'Foto da habilitação', $caminho);
			} else {
				echo "Oops, ocorreu algum erro no cadastro!";
			}
			
		}

	}

	public function registerEtapa4()
	{
		// Regras de validação
				
		$this->form_validation->set_rules('proprietario', 'Proprietário da moto', 'required');
		$this->form_validation->set_rules('placa', 'Placa', 'required');
		$this->form_validation->set_rules('ano', 'Ano', 'required');
		$this->form_validation->set_rules('modelo', 'Modelo', 'required');
		
		if (empty($_FILES['fotoDocumentoMoto']['name']))
			$this->form_validation->set_rules('fotoDocumentoMoto', 'Foto do documento da moto', 'required');
		
		// Verifica se houve errors
		if ($this->form_validation->run() == false) {
			$formErrors = validation_errors();
			echo $formErrors;
			echo "error";
			exit;
		} else {
			$data['formErrors'] = null;
			
			// Inserindo cadastro do usuário			
			$data = array(
				'id' => $this->session->userdata('user_id'),
				'cpf' => $this->session->userdata('user_cpf'),
				'veiculoProprio' => $this->input->post('proprietario'),
			);
			if ($this->Usuario_model->save($data)) {

				// Carrega model Veiculo_model
				$this->load->model('Veiculo_model');

				// Cadastrando veiculo no banco de dados
				$veiculo = array(
					'usuario_id' => $this->session->userdata('user_id'),
					'placa' => $this->input->post('placa'),
					'ano' => $this->input->post('ano'),
					'modelo' => $this->input->post('modelo'),
				);
				if ($this->Veiculo_model->save($veiculo)) {
					// Upload da imagem
					$caminho = 'usuarios/'.$this->session->userdata('user_cpf');
					$this->upload_image('fotoDocumentoMoto', 'Foto do documento da moto', $caminho);
				}
			} else {
				echo "Oops, ocorreu algum erro no cadastro!";
			}
			
			
		}
	}

	public function upload_image($file_input, $filename, $caminho)
	{
		// $path = './assets/upload/usuarios/'.$nome_pasta;

		$path = 'assets/upload/'.$caminho;
		if (!is_dir($path))
			mkdir($path, 0777, true);
		
		$config = array(
			'file_name' => utf8_decode($filename),
			'upload_path' => './'.$path.'/',
			'allowed_types' => 'png|jpeg|jpg|gif',
			'overwrite' => true
		);
		$this->load->library('upload');
		$this->upload->initialize($config);
		if ($this->upload->do_upload($file_input)) {
			$upload_data = $this->upload->data();
			// Carrega model imagem
			$this->load->model('Imagem_model');
			// Salva no banco de dados dados da imagem 
			$data = array(
				'usuario_id' => $this->session->userdata('user_id'),
				'descricao' => $filename,
				'url' => $path.'/'.str_replace(' ', '_', $filename.$upload_data['file_ext'])
			);
			$this->Imagem_model->save($data);
			// echo "SUCESSO";
		} else {
			// echo "ERROR<br>";
			echo $this->upload->display_errors();
		}
	}
}
