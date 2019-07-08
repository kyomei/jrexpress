<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/css/style.min.css');?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
		integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="#">RJ Express</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('consultar')?>">Consultar</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?=base_url('trabalhe-conosco')?>">Trabalhe conosco</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('login')?>">Login</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="jumbotron text-center">
		<h1>Trabalhe Conosco</h1>
		<p>Faça parte da nossa equipe!</p>
	</div>
	<!-- Start .\ Section de cadastro -->
	<section>
		<div class="container">
			<!-- Start .\ Habilitação -->
			<div class="row">
				<div class="col-12">
					<strong>Condições para a Inscrição:</strong>
					<ul>
						<li>Ter 21 anos completos;</li>
						<li>Possui uma moto para trabalho;</li>
						<li>Estar habilitado, no mínimo, há dois anos na categoria A;</li>
						<li>Não estar cumprindo pena de suspensão do direito de dirigir;</li>
						<li>Não estar cumprindo pena de cassação da carteira nacional de habilitação (CNH), decorrente de crime de trânsito;</li>
					</ul>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="termos" name="termos">
						<label class="custom-control-label" for="termos">Declaro ter as condições necessárias para a inscrição</label>
					</div>
					<!-- Botão Iniciar inscrição -->
					<div class="col-12 d-flex justify-content-center mb-5">
						<input type="button" class="btn btn-success btn-lg mt-3" id="inscricao" value="Iniciar Inscrição" disabled />
					</div>
					<!-- End .\ Botão Iniciar inscrição -->
				</div>

				<!-- Informações pessoais - ETAPA 1 -->
				<div class="col-12">
					<form id="formEtapa1" method="POST"> 
						<h2>Informações pessoais</h2>
						<hr />

						<!-- Campo Nome -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" placeholder="Seu nome completo" maxlength="150" autocomplete="off" required>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ campo Nome -->

						<!-- Campo data nascimento -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="nascimento">Data nascimento</label>
								<input type="text" class="form-control" name="nascimento" placeholder="__/__/____" maxlength="10" autocomplete="off" required>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ campo data nascimento -->

						<!-- Campo CPF -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="cpf">Número do CPF</label>
								<input type="text" class="form-control" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo CPF -->

						<!-- Campo CNH -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="cnh">Número da CNH</label>
								<input type="text" class="form-control" name="cnh" placeholder="00000000000" maxlength="11" required>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo CNH -->

						<!-- Campo E-mail -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" class="form-control" name="email" placeholder="seuemail@exemplo.com" maxlength="100" required>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo E-mail -->

						<!-- Campo Telefone -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="telefone">Telefone <small class="text-muted">(Opcional)</small></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupPrepend1"><i class="fas fa-phone"></i></span>
									</div>
									<input type="tel" class="form-control" name="telefone" placeholder="(XX) XXXX-XXXX" aria-describedby="inputGroupPrepend1" maxlength="14">
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Telefone -->	

						<!-- Campo Celular -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="celular">Celular</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupPrepend2"><i class="fab fa-whatsapp"></i></span>
									</div>
									<input type="tel" class="form-control" name="celular" placeholder="(XX) XXXXX-XXXX" aria-describedby="inputGroupPrepend2" maxlength="15" required>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Telefone -->

						<!-- Button prev -->
						<div class="col-12 text-right mb-5">
							<div class="text-right">
								<button type="submit" class="btn btn-success btn-sm">Próximo</button>
							</div>
						</div>
						<!-- End .\ Button prev -->
					</form>
				</div>

				<!-- End .\ Informações pessoais - ETAPA 1 -->

				<!-- Informações pessoais - ETAPA 2 -->
				<div class="col-12">
					<form id="formEtapa2" method="POST"> 
						<h2>Informações pessoais</h2>
						<hr />
						
						<!-- Campo Gênero -->
						<div class="col-md-3 col-sm-4">
							<div class="form-group">
								<label for="sexo">Sexo</label><br />
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="Masculino" name="sexo" value="M">
									<label class="custom-control-label" for="Masculino">Masculino</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="Feminino" name="sexo" value="F">
									<label class="custom-control-label" for="Feminino">Feminino</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Gênero -->

						<!-- Campo Estado Civil -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="estadoCivil">Estado Civil</label>
								<select class="form-control" name="estadoCivil">
									<option disabled selected>Selecione</option>
									<option>Solteiro (a)</option>
									<option>Casado (a)</option>
									<option>Viúvo (a)</option>
									<option>Separado (a)</option>
									<option>Divorciado (a)</option>
									<option>União Estável</option>
									<option>Outro</option>
								</select>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Estado Civil -->

						<!-- Campo Filhos -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="filhos">Número de filhos</label>
								<input type="number" class="form-control" min="0" max="20" value="0" name="filhos">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Filhos -->

						<!--  Campo Moradia -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="moradia">Moradia</label><br />
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="casa" name="moradia" value="Casa própria">
									<label class="custom-control-label" for="casa">Casa própria</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="aluguel" name="moradia" value="Aluguel">
									<label class="custom-control-label" for="aluguel">Aluguel</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Moradia -->

						<!-- Campo CEP -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="cep">CEP</label>
								<input type="text" class="form-control" name="cep" placeholder="00000-000" maxlength="9">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo CEP -->
						
						<!-- Campo Logradouro -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="logradouro">Endereço</label>
								<input type="text" class="form-control" name="endereco" placeholder="Endereço" readonly>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Logradouro -->

						<!-- Campo Número -->
						<div class="col-md-2">
							<div class="form-group">
								<label for="numero">Nº</label>
								<input type="text" class="form-control" name="numero" placeholder="Número">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Número -->

						<!-- Campo Bairro -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="bairro">Bairro</label>
								<input type="text" class="form-control" name="bairro" placeholder="Bairro" readonly>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Estado -->

						<!-- Campo Cidade -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="cidade">Cidade</label>
								<input type="text" class="form-control" name="cidade" placeholder="Cidade" readonly>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Cidade -->

						<!-- Campo Estado -->
						<div class="col-md-2">
							<div class="form-group">
								<label for="estado">Estado</label>
								<input type="text" class="form-control" name="estado" placeholder="Estado" readonly>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Estado -->

						<!-- Button prev e next -->
						<div class="col-12 text-right mb-5">
							<div class="btn-group btn-group-sm">
								<button type="button" class="btn btn-sm btn-success btn-prev">Voltar</button>
								<button type="submit" class="btn btn-success">Próximo</button>
							</div>	
						</div>
						<!-- End .\ Button prev e next -->
					</form>
				</div>
				<!-- End .\ Informações pessoais - ETAPA 2 -->

				<!-- Disponibilidade -->
				<div class="col-12">
					<form id="formEtapa3" method="POST"> 
						<h2>Outras informações</h2>
						<hr />
						<!--  Campo Trabalha outro serviço -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="trabalha">Você trabalha atualmente?</label><br />
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="trabalha_sim" name="trabalha" value="yes">
									<label class="custom-control-label" for="trabalha_sim">Sim</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="trabalha_nao" name="trabalha" value="no">
									<label class="custom-control-label" for="trabalha_nao">Não</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Trabalha outro serviço -->

						<!-- Start .\ Atividade Remunerada CNH -->
						<div class="col-md-12">
							<div class="form-group">
								<label for="AtividadeRemuneradaCNH">Você possui Atividade remunerada na sua habilitação?</label><br />
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="cnhRemunerada_sim" name="AtividadeRemuneradaCNH" value="yes">
									<label class="custom-control-label" for="cnhRemunerada_sim">Sim</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="cnhRemunerada_nao" name="AtividadeRemuneradaCNH" value="no">
									<label class="custom-control-label" for="cnhRemunerada_nao">Não</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>		
							</div>
						</div>
						<!-- End .\ Atividade Remunerada CNH -->

						<!-- Campo Turno de trabalho -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="turno">Quais horários você teria interesse em trabalha?</label><br />
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="turno1" name="turno">
									<label class="custom-control-label" for="turno1">1º Turno das 11:00 ás 15:00</label>
								</div>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="turno2" name="turno">
									<label class="custom-control-label" for="turno2">2º Turno das 15:00 ás 18:00</label>
								</div>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="turno3" name="turno">
									<label class="custom-control-label" for="turno3">3º Turno das 18:00 ás 00:00</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Turno de trabalho -->

						<!--  Campo Curso moto frete -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="curso">Você já possui curso de moto frete?</label><br />
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" id="curso_sim" name="curso" value="yes">
									<label class="custom-control-label" for="curso_sim">Sim</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" id="curso_nao" name="curso" value="no">
									<label class="custom-control-label" for="curso_nao">Não</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" id="curso_nao_sim" name="curso" value="no_sim">
									<label class="custom-control-label" for="curso_nao_sim">Não, mas tenho interesse em fazer</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Curso moto frete -->

						<!--  Foto de perfil -->
						<div class="col-md-12">
							<div class="form-group">
								<p>Precisamos que envie uma foto de perfil <br />
									- <i><small>Deve estar de frente e com rosto em primeiro plano - <a href="<?php echo base_url('assets/images/profile.jpg');?>" class="modal-image" title="Exemplo de como deve ser enviada a foto de perfil">Veja exemplo</a></small></i><br />
									- <i><small> Deve ser neutro, como nas fotos utilizadas em documentos oficiais (ex: RG, Carteira de Habilitação, Passaporte), sem objetos visíveis</small></i>
								</p>
								<input type="file" class="form-control-file" name="fotoPerfil">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div><hr />
						<!--  End .\ Foto de perfil -->

						<!--  Foto de Comprovante de endereço -->
						<div class="col-md-12">
							<div class="form-group">
								<p>Precisamos que envie uma foto de um comprovante de endereço no nome do interessado, com CEP<br />
									- <i><small>Imagem deve ser legível - <a href="<?php echo base_url('assets/images/comprovante.png');?>" class="modal-image" title="Exemplo de como deve ser enviada a foto de comprovante de endereço no nome do interessado, com CEP">Veja exemplo</a></small></i>
								</p>
								<input type="file" class="form-control-file" name="fotoComprovanteEndereco">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div><hr />
						<!--  End .\ Foto do comprovante de endereço -->

						
						<!--  Foto da Habilitação -->
						<div class="col-md-12">
							<div class="form-group">
								<p>Precisamos que envie uma foto da sua habilitação<br />
									- <i><small>Imagem deve está legível - <a href="<?php echo base_url('assets/images/cnh.jpg');?>" class="modal-image" title="Exemplo de como deve ser enviada a foto da habilitação">Veja exemplo</a></small></i>
								</p>
								<input type="file" class="form-control-file" name="fotoHabilitacao">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!--  End .\ Foto da Habilitação -->
						
						<!-- Button prev e next -->
						<div class="col-12 text-right mb-5">
							<div class="btn-group btn-group-sm">
								<button type="button" class="btn btn-sm btn-success btn-prev">Voltar</button>
								<button type="submit" class="btn btn-success">Próximo</button>
							</div>	
						</div>
						<!-- End .\ Button prev e next -->
					</form>
				</div>
				<!-- End .\ Disponibilidade -->

				<!-- Informações do veículo -->
				<div class="col-12">
					<form id="formEtapa4" method="POST">
						<h2>Informações do veículo</h2>
						<hr />
						<!--  Campo Proprietário do veículo -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="proprietario">Moto está em seu nome?</label><br />
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="proprietario_sim" name="proprietario" value="yes">
									<label class="custom-control-label" for="proprietario_sim">Sim</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="proprietario_nao" name="proprietario" value="no">
									<label class="custom-control-label" for="proprietario_nao">Não</label>
								</div>
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Proprietário do veículo -->

						<!-- Campo Placa -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="placa">Placa</label>
								<input type="text" class="form-control" name="placa" placeholder="XXX-0000" maxlength="8">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Placa -->

						<!-- Campo Ano -->
						<div class="col-md-2">
							<div class="form-group">
								<label for="ano">Ano</label>
								<input type="number" class="form-control" name="ano" placeholder="0000" maxlength="4">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Ano -->

						<!-- Campo Modelo -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="modelo">Modelo</label>
								<input type="text" class="form-control" name="modelo" placeholder="Modelo" maxlength="150">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div>
						<!-- End .\ Campo Modelo -->

						
						<!--  Foto do documento da moto -->
						<div class="col-md-12">
							<div class="form-group">
								<p>Precisamos que envie uma foto do documento da moto.<br />
									- <i><small>Imagem deve ser legível - <a href="<?php echo base_url('assets/images/documento_moto.jpg');?>" class="modal-image" title="Exemplo de como deve ser enviada a foto do documento da moto">Veja exemplo</a></small></i>
								</p>
								<input type="file" class="form-control-file" name="fotoDocumentoMoto">
								<div class="valid-feedback">Válido.</div>
								<div class="invalid-feedback">Message error</div>
							</div>
						</div><hr />
						<!--  End .\ Foto do comprovante de endereço -->

						<!-- Button prev -->
						<div class="col-12">
							<div class="text-right">
								<button type="button" class="btn btn-success btn-sm btn-prev">Voltar</button>
							</div>
						</div>
						<!-- End .\ Button prev -->

						<!-- Submit enviar formulário -->
						<div class="col-12 d-flex justify-content-center mb-5">
							<input type="submit" class="btn btn-danger btn-lg mt-3" value="Finalizar cadastro" />
						</div>
						<!-- End .\ Submit enviar formulário -->
					</div>
					<!-- End .\ Disponibilidade -->
				</form>
			</div>
		<!-- End .\ Formulário -->
		</div>
	</section>
	<!-- End .\ Section de cadastro -->

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- The Close Button -->
		<span class="close">&times;</span>

		<!-- Modal Content (The Image) -->
		<img class="modal-content">

		<!-- Modal Caption (Image Text) -->
		<div id="caption"></div>
	</div>

	<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/popper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.validate.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.validate.messages_pt_PT.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.validate.additional-methods.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.mask.min.js?2')?>"></script>
	<script src="<?=base_url('assets/js/app.js?2')?>"></script>
</body>

</html>
