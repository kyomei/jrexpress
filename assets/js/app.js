$(function(){

	// get Formulario
	var form = $('#formCadastro');

	// get Campos do formulário
	var habilitacao = form.find('input[name=habilitacao]');
	var tempoHabilitado = form.find('input[name=tempoHabilitado]');
	var veiculo = form.find('input[name=veiculo]');

	var nome = form.find('input[name=nome]');
	var cpf = form.find('input[name=cpf]');
	var cnh = form.find('input[name=cnh]');
	var email = form.find('input[name=email]');
	var telefone = form.find('input[name=telefone]');
	var celular = form.find('input[name=celular]');
	var sexo = form.find('input[name=sexo]');
	var estadoCivil = form.find('select[name=estadoCivil]');
	var filhos = form.find('input[name=filhos]');
	var moradia = form.find('input[name=moradia]');
	var cep = form.find('input[name=cep]');
	var endereco = form.find('input[name=endereco]');
	var numero = form.find('input[name=numero]');
	var bairro = form.find('input[name=bairro]');
	var cidade = form.find('input[name=cidade]');
	var estado = form.find('input[name=estado]');
	var trabalha = form.find('input[name=trabalha]');
	var turno = form.find('input[name=turno]');
	var curso = form.find('input[name=curso]');
	var AtividadeRemuneradaCNH = form.find('input[name=AtividadeRemuneradaCNH]');

	// Mascara de entrada nos campos
	cpf.mask("000.000.000-00");
	telefone.mask("(00) 0000-0000");
	celular.mask("(00) 00000-0000");
	/*
	celular.blur(function(e) {
		alert('ok');
		if ($(this).val().length == 11 || $(this).val().length == 15) {
			$(this).mask("(00) 00000-0009");
		} else {
			$(this).mask("(00) 0000-0000");
		}
	});*/
	cep.mask("00000-000");

	// API BUSCA ENDEREÇO
	cep.change(function(){
		var cep_code = $(this).val();
		if (cep_code.length <= 0) return;
		$.get("http://apps.widenet.com.br/busca-cep/api/cep.json", {code: cep_code},
			function(result) {
				if(result.status != 1) {
					alert(result.message || "Houve um erro desconhecido");
					return;
				}
				$(cep).val(result.code);
				$(estado).val(result.state);
				$(cidade).val(result.city);
				$(bairro).val(result.district);
				$(endereco).val(result.address);
			}
		
		);
	});
	
	
	// Campo Possui habilitação
	habilitacao.bind('click', function() {
		let valor = $(this).val();

		if (valor == 'yes') {
			removeAlert();
			nextElement(this);
		} else {
			let message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário possui habilitação categoria A.';
			createAlert(message);
		}
	});

	// Campo Tempo de habilitação
	tempoHabilitado.bind('click', function() {
		let valor = $(this).val();

		if (valor == 'yes') {
			removeAlert();
			nextElement(this);
		} else {
			let message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário estar habilitado pelo menos à 2 anos.';
			createAlert(message);
		}
	});
	
	// Campo Atividade Remunerada CNH
	veiculo.bind('click', function() {
		let valor = $(this).val();

		if (valor == 'yes') {
			removeAlert();
			nextElement(this);
		} else {
			let message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário ter uma moto';
			createAlert(message);
		}
	});

	// Campo Possui veículo 
	form.find('input[name=veiculo]').bind('click', function() {
		let valor = $(this).val();

		if (valor == 'yes') {
			removeAlert();
			nextElement(this);
		} else {
			let message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário ter uma moto.';
			createAlert(message);
		}
	});

	// Validação da idade no campo Data nascimento
	form.find('#verificarNascimento').bind('click', function(e) {
		e.preventDefault();
		let valor = $('input[name=nascimento]').val();
		let data = valor.split('-');
	
		if (idade(data[0], data[1], data[2]) < 21) {
			let message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é preciso ter 21 anos de idade.';
			createAlert(message);
		}  else {
			removeAlert();
			nextElement($('input[name=nascimento]'));
		}
		
	});

	// Button proxima etapa
	form.find('.btn-prox').bind('click', function(){
		//nextElement($(this));
	});
	// Oculta elemento atual e exibe o próximo bloco
	function nextElement(e) {
		element = $(e).parent().parent();
		element.hide('slow');
		element.next().show('slow');
	}

	// Create alert com animação Fade
	function createAlert(message,color = 'alert-danger') {
		var html = '<div id="alert-message" class="alert ' + color + ' alert-dismissible  fade show">';
			html += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			html += message + '</div>';
			
			$('#area-alert').hide();
			$('#area-alert').append(html);
			$('#area-alert').fadeIn('slow');
	}
	// Remove alert com animação Fade
	function removeAlert() {
		$('#area-alert .alert').fadeOut('slow',function(){
			$('#area-alert .alert').remove();
		});
	}

	// Função para calcular idade apartir da data
	function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
		var d = new Date,
		ano_atual = d.getFullYear(),
		mes_atual = d.getMonth() + 1,
		dia_atual = d.getDate(),

		ano_aniversario = +ano_aniversario,
		mes_aniversario = +mes_aniversario,
		dia_aniversario = +dia_aniversario,

		quantos_anos = ano_atual - ano_aniversario;

		if (mes_atual < mes_aniversario || mes_atual == mes_aniversario) {
			
			if (dia_atual > dia_aniversario) {
				quantos_anos--;
			}
			
		}

		return quantos_anos < 0 ? 0 : quantos_anos;
	}

	// jQuery Validate - Regras
	$('#formCadastro').validate({
		
		rules: {
			nome: {
				required: true,
				maxlength: 150,
				minlength: 5
			},
			cpf: {
				required: true,
				minlength: 14,
				maxlength: 14
			},
			cnh: {
				required: true,
				minlength: 11,
				maxlength: 11,
			},
			email: {
				email: true,
				required: true,
				maxlength: 100
			},
			telefone: {
				minlength: 14
			},
			celular: {
				minlength: 15
			},
			sexo: {
				required: true
			},
			estadoCivil: {
				required: true
			},
			filhos: {
				maxlength: 10
			},
			moradia: {
				required: true
			},
			cep: {
				required: true,
				minlength: 9
			},
			numero: {
				required: true
			},
			trabalha: {
				required: true,
			},
			turno: {
				required: true,
			}
		}, errorPlacement: function(error, element) {
			console.log(error);
		}

	});
	
	// Modal nos anexos

	$(document).on('click', '.modal-image', function(e) {
		e.preventDefault();

		// modal
		var modal = $("#myModal");
		var imageModal = $("#myModal").find(".modal-content");
		
		imageModal.attr('src', $(this).attr('href'));
		modal.find("#caption").text($(this).attr('title'));
		modal.show();
	});
	$(document).on('click', '.modal .close', function() {
		$("#myModal").hide();
	});
});
