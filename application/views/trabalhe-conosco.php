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
			<form id="formCadastro" method="POST">
				<!-- Start .\ Habilitação -->
				<div class="row">
					<!-- Message alert -->
					<div class="col-12" id="area-alert">
						
					</div>
					<!-- Start .\ Possui habilitação -->
					<div class="col-md-12 text-center">
						<label for="habilitacao">Você possui habilitação <strong>categoria A</strong>?</label><br />
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="habilitacao_sim" name="habilitacao" value="yes">
							<label class="custom-control-label" for="habilitacao_sim">Sim</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="habilitacao_nao" name="habilitacao" value="no">
							<label class="custom-control-label" for="habilitacao_nao">Não</label>
						</div>
					</div>
					<!-- End .\ Possui habilitação -->

					<!-- Start .\ Tempo de habilitação -->
					<div class="col-md-12 text-center">
						<label for="tempoHabilitado">Você está habilitado na <strong>categoria A</strong> a mais de 2
							anos?</label><br />
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="tempo_sim" name="tempoHabilitado" value="yes">
							<label class="custom-control-label" for="tempo_sim">Sim</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="tempo_nao" name="tempoHabilitado" value="no">
							<label class="custom-control-label" for="tempo_nao">Não</label>
						</div>
					</div>
					<!-- End .\ Tempo de habilitação -->

					<!-- Start .\ Atividade Remunerada CNH -->
					<div class="col-md-12 text-center">
						<label for="AtividadeRemuneradaCNH">Sua Habilitação possui <strong>Atividade remunerada?</strong></label><br />
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="cnhRemunerada_sim" name="AtividadeRemuneradaCNH" value="yes">
							<label class="custom-control-label" for="cnhRemunerada_sim">Sim</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="cnhRemunerada_nao" name="AtividadeRemuneradaCNH" value="no">
							<label class="custom-control-label" for="cnhRemunerada_nao">Não</label>
						</div>
					</div>
					<!-- End .\ Atividade Remunerada CNH -->

					<!-- Start .\ Possui veículo -->
					<div class="col-md-12 text-center">
						<label for="veiculo">Você possui uma moto para trabalhar?</label><br />
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="moto_sim" name="veiculo" value="yes">
							<label class="custom-control-label" for="moto_sim">Sim</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" id="moto_nao" name="veiculo" value="no">
							<label class="custom-control-label" for="moto_nao">Não</label>
						</div>
					</div>
					<!-- End .\ Possui veículo -->

					<!-- Start .\ Data nascimento -->
					<div class="col-md-12 text-center">
						<label for="nascimento">Para trabalhar conosco, deve ter no <strong>mínimo 21 anos</strong>. Informe sua data de nascimento</label><br />
						<div class="input-group mb-3" style="width: 270px; margin: 0 auto">
							<input type="date" class="form-control" name="nascimento">
							<div class="input-group-append">
								<button class="btn btn-success" type="button" id="verificarNascimento">Verificar</button> 
							</div>
						</div>
					</div>
					<!-- End .\ Data nascimento -->

					<!-- Informações pessoais -->
					<div class="col-12">
						<h2>Informações pessoais</h2>
						<hr />

						<!-- Campo Nome -->
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" placeholder="Seu nome completo" maxlength="150">
							</div>
						</div>
						<!-- End .\ campo Nome -->

						<!-- Campo CPF -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="cpf">Número do CPF</label>
								<input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
							</div>
						</div>
						<!-- End .\ Campo CPF -->

						<!-- Campo CNH -->
						<div class="col-md-4">
							<div class="form-group">
								<label for="cnh">Número da CNH</label>
								<input type="text" class="form-control" id="cnh" placeholder="00000000000" name="cnh">
							</div>
						</div>
						<!-- End .\ Campo CNH -->

						<!-- Campo E-mail -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" class="form-control" name="email" placeholder="seuemail@exemplo.com" maxlength="100">
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
									<input type="tel" class="form-control" name="telefone" placeholder="(XX) XXXX-XXXX" aria-describedby="inputGroupPrepend1">
								</div>
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
									<input type="tel" class="form-control" name="celular" placeholder="(XX) XXXXX-XXXX" aria-describedby="inputGroupPrepend2">
								</div>
							</div>
						</div>
						<!-- End .\ Campo Telefone -->

						<div class="col-12 text-right">
							<button type="button" class="btn btn-success btn-prox">Próximo</button>
						</div>
					</div>

					<!-- Informações pessoais -->
					<div class="col-12">
						<h2>Informações pessoais</h2>
						<hr />
						<!-- Campo Gênero -->
						<div class="col-md-3">
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
							</div>
						</div>
						<!-- End .\ Campo Estado Civil -->


						<!-- Campo Filhos -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="filhos">Número de filhos</label>
								<input type="number" class="form-control" min="0" max="20" id="filhos" value="0" name="filhos">
							</div>
						</div>
						<!-- End .\ Campo Filhos -->

						<!--  Campo Moradia -->
						<div class="col-md-3">
							<div class="form-group">
								<label for="moradia">Moradia</label><br />
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="casa" name="moradia" value="casa">
									<label class="custom-control-label" for="casa">Casa própria</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="aluguel" name="moradia" value="aluguel">
									<label class="custom-control-label" for="moradialuguela_nao">Aluguel</label>
								</div>
							</div>
						</div>
						<!-- End .\ Campo Moradia -->

						<div class="col-12 text-right">
							<button type="button" class="btn btn-success btn-prox">Próximo</button>
						</div>
					</div>
					<!-- End .\ Informações pessoais -->

					<!-- Disponibilidade -->
					<div class="col-12">
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
							</div>
						</div>
						<!-- End .\ Campo Trabalha outro serviço -->

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
							</div>
						</div>
						<!-- End .\ Campo Turno de trabalho -->

						<!--  Campo Trabalha outro serviço -->
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
							</div>
						</div>
						<!-- End .\ Campo Trabalha outro serviço -->

						<!--  Campo Anexo Documento -->
						<div class="col-md-5">
							<div class="form-group">
								<label for="curso">Precisamos que envie uma foto uma foto de perfil</label><br />
								<input type="file" class="form-control-file">
							</div>
						</div>
						<!--  Campo Anexo Documento -->


						<div class="col-12 text-right">
							<button type="button" class="btn btn-success btn-prox">Próximo</button>
						</div>
					</div>
					<!-- End .\ Disponibilidade -->
					<div class="col-12 d-flex justify-content-center mb-5">
						<input type="submit" class="btn btn-primary mt-3" value="Finalizar cadastro" />
					</div>
				</div>
			</form>
			<!-- End .\ Formulário -->
		</div>
	</section>
	<!-- End .\ Section de cadastro -->

	</section>
	<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/popper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.validate.min.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.validate.messages_pt_PT.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.mask.min.js')?>"></script>
	<script src="<?=base_url('assets/js/app.js')?>"></script>
</body>

</html>
