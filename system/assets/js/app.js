$(function(){

	// Base URL
	var base_url = "http://localhost/sites/jrexpress.com.br/";

	// get Formulario
	var form = $('form');

	// get Campos do formulário
	var termos = $('input[name=termos]');

	var nome = form.find('input[name=nome]');
	var nascimento = form.find('input[name=nascimento]');
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
	var ativRemunerada = form.find('input[name=ativRemunerada]');
	var psicotecnico = form.find('input[name=psicotecnico]');
	var ano = form.find('input[name=ano]');
	var placa = form.find('input[name=placa]');
	
	// Preenchendo com valores vázios input para impedir autocompletar do browsers
	//jQuery($('input[name=telefone]')).attr('autocomplete','off');

	// Mascara de entrada nos campos
	nascimento.mask("00/00/0000");
	cpf.mask("000.000.000-00");
	cnh.mask("00000000000");
	telefone.mask("(00) 0000-0000");
	celular.mask("(00) 00000-0000");
	cep.mask("00000-000");
	ano.mask("0000");
	placa.mask("AAA-0000", {
		translation: {
			'A': {
				pattern: /[a-zA-Z]/
			}
		}
	});

	// Transforma em maiusculas os valores digitados no campo placa
	placa.keyup(function(){
		$(this).val($(this).val().toUpperCase());
	});

	// API BUSCA ENDEREÇO
	cep.change(function(){
		var cep_code = $(this).val();
		if (cep_code.length <= 0) return;
		$.get("https://apps.widenet.com.br/busca-cep/api/cep.json", {code: cep_code},
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

	

	// Validação da idade no campo Data nascimento
	nascimento.keyup(function(e) {
		if ($(this).val().length > 9) {
			let valor = $(this).val();
			let data = valor.split('/');
			let dia = data[0];
			let mes = data[1];
			let ano = data[2];
			if (idade(ano, mes, dia) < 21) {
				alert('Desculpe! Infelizmente para trabalha conosco é preciso ter 21 anos de idade.');
				window.location.reload();
			}
		}
	});

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

	// Termos para inicia cadastro
	termos.bind('click', function(){
		$(this).is(':checked') ? $("#inscricao").removeAttr('disabled') : $("#inscricao").attr('disabled', 'disabled');
	});

	// Ação do botão iniciar inscrição
	$("#inscricao").bind('click', function(){
		$(this).parent().parent().hide('slow');
		$("#formEtapa1").show('slow');
	});

	// jQuery Validate - Regras ETAPA 1
	jQuery.validator.addMethod("nomeCompleto", function(value, element) {
		let result = value.toString().trim();
		if (result.indexOf(" ") > 0) {
			return true
		} else {
			return false
		}
	}, "Por favor, informe seu nome completo.");

	$('#formEtapa1').validate({
		rules: {
			
			nome: {
				nomeCompleto: true,
				required: true,
				maxlength: 150,
				minlength: 5
			},
			nascimento: {
				required: true,
				minlength: 10
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
				maxlength: 14,
				minlength: 14
			},
			celular: {
				required: true,
				minlength: 15,
				maxlength: 15
			}		
			
		}, 
		messages: {
			
			nome: {
				minlength: "Por favor, informe seu nome completo.",
			},
			nascimento: {
				minlength: "Informe sua data de nascimento dia/mês/ano. Ex: 03/08/1945",
			},
			cpf: {
				minlength: "Por favor, informe CPF válido."
			},
			cnh: {
				minlength: "Por favor, informe número da habilitação válido."
			},
			email: {
				email: "Por favor, informe um e-mail válido."
			}
			
		},
		errorPlacement: function(error, element) {
			if($(error)[0].innerText != "") {
				$(element).hasClass('is-valid') ? $(element).removeClass('is-valid') : '';
				$(element).addClass("is-invalid");
				$(element).parent().find('.invalid-feedback').text($(error)[0].innerText);
			}		
		},
		success: function (label, element) {
			$(element).hasClass('is-invalid') ? $(element).removeClass('is-invalid') : '';
			$(element).addClass("is-valid");
		},
		submitHandler: function (form) {

			// Enviando dados via ajax
			$.ajax({
				url: $(form).attr('action'),
				type: 'POST',
				//datatype: 'json',
				data: $(form).serialize(),
				success: function(response) {
					console.log("Epata 1 - Enviado com sucesso!");
					console.log(response);
					$(form).hide('slow');
					$("#formEtapa2").show('slow');
				},
				error: function(request, status, error) {
					console.log("Oops! Ocorreu algum erro!");
					console.log(request);
					console.log(status);
					console.log(error);
				}
			});
		}
	});
	
	// jQuery Validate - Regras ETAPA 2
	$('#formEtapa2').validate({
		
		rules: {
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
			}
		},
		errorPlacement: function(error, element) {
			if($(error)[0].innerText != "") {
				$(element).hasClass('is-valid') ? $(element).removeClass('is-valid') : '';
				$(element).addClass("is-invalid");
				$(element).parent().find('.invalid-feedback').text($(error)[0].innerText);
			}
		
		},
		success: function (label, element) {
			$(element).hasClass('is-invalid') ? $(element).removeClass('is-invalid') : '';
			$(element).addClass("is-valid");
		},
		highlight: function (element, errorClass, validClass) {

			// Preenchendo outros input do mesmo name com classe is-valid para ficar em vermelho quando não tiver selecionado nenhum
			// Tipo Radio e Checkbox	
			if ($(element).prop('type') === 'radio' || $(element).prop('type') === 'checkbox') {
				var nameElement = $(element).attr('name');
				var buscaElemento = "input[name=" + nameElement + "]";
				$(buscaElemento).each(function(){
					$(this).addClass("is-invalid");
				});
				if ($(element).prop('type') === 'checkbox'){
					$(element).parent().parent().find('.invalid-feedback').text("Por favor, selecione alguma ou todas opções.").show();
				} else {
					$(element).parent().parent().find('.invalid-feedback').text("Por favor, selecione uma das opções.").show();
				}
			}
		},
		submitHandler: function (form) {
			// form.submit();
			$.ajax({
				url: $(form).attr('action'),
				type: 'POST',
				//datatype: 'json',
				data: $(form).serialize(),
				success: function(response) {
					console.log("Epata 2 - Enviado com sucesso!");
					console.log(response);
					$(form).hide('slow');
					$("#formEtapa3").show('slow');
				},
				error: function(request, status, error) {
					console.log("Oops! Ocorreu algum erro!");
					console.log(request);
					console.log(status);
					console.log(error);
				}
			});
		}
	});

	// jQuery Validate - Regras ETAPA 3
	$('#formEtapa3').validate({
		rules: {
			
			trabalha: {
				required: true
			},
			ativRemunerada: {
				required: true
			},
			psicotecnico: {
				required: true
			},
			turno: {
				required: true,
			},
			curso: {
				required: true
			},
			fotoPerfil: {
				required: true,
				extension: "png|jpeg|jpg|gif"
			},
			fotoComprovanteEndereco: {
				required: true,
				extension: "png|jpeg|jpg|gif"
			},
			fotoHabilitacao: {
				required: true,
				extension: "png|jpeg|jpg|gif"
			}
			
		},
		messages: {
			
			fotoPerfil: {
				extension: "Foto do tipo inválida",
				required: "Por favor, envie uma foto de perfil."
			},
			fotoComprovanteEndereco: {
				extension: "Foto do tipo inválida",
				required: "Por favor, envie uma foto de comprovante de endereço."
			},
			fotoHabilitacao: {
				extension: "Foto do tipo inválida",
				required: "Por favor, envie uma foto da habilitação."
			}
			
		},errorPlacement: function(error, element) {
			if($(error)[0].innerText != "") {
				$(element).hasClass('is-valid') ? $(element).removeClass('is-valid') : '';
				$(element).addClass("is-invalid");
				$(element).parent().find('.invalid-feedback').text($(error)[0].innerText);
			}
		},
		success: function (label, element) {
			$(element).hasClass('is-invalid') ? $(element).removeClass('is-invalid') : '';
			$(element).addClass("is-valid");
		},
		highlight: function (element, errorClass, validClass) {

			// Preenchendo outros input do mesmo name com classe is-valid para ficar em vermelho quando não tiver selecionado nenhum
			// Tipo Radio e Checkbox	
			if ($(element).prop('type') === 'radio' || $(element).prop('type') === 'checkbox') {
				var nameElement = $(element).attr('name');
				var buscaElemento = "input[name=" + nameElement + "]";
				$(buscaElemento).each(function(){
					$(this).addClass("is-invalid");
				});
				if ($(element).prop('type') === 'checkbox'){
					$(element).parent().parent().find('.invalid-feedback').text("Por favor, selecione alguma ou todas opções.").show();
				} else {
					$(element).parent().parent().find('.invalid-feedback').text("Por favor, selecione uma das opções.").show();
				}
			}
		},
		submitHandler: function (form) {
			//  form.submit();
			var element = $(this);
		  	var loadingText = '<span class="spinner-border spinner-border-sm"></span>Aguarde...';
			$(element).attr('disabled', 'disabled');
			$(element).html(loadingText);
			
			$.ajax({
				url: $(form).attr('action'),
				type: 'POST',
				//datatype: 'json',
				data: new FormData(form),
				contentType: false,
				processData: false,
				success: function(response) {
					console.log("Epata 3 - Enviado com sucesso!");
					console.log(response);
					$(element).removeAttr('disabled');
					$(element).html('Próximo');
					$(form).hide('slow');
					$("#formEtapa4").show('slow');
				},
				error: function(request, status, error) {
					console.log("Oops! Ocorreu algum erro!");
					console.log(request);
					console.log(status);
					console.log(error);
				}
			});
			
		}
	});

	// jQuery Validate - Regras ETAPA 4
	$('#formEtapa4').validate({
		rules: {
			proprietario: {
				required: true,
			},
			placa: {
				required: true,
				minlength: 8
			},
			ano: {
				required: true
			},
			modelo: {
				required: true
			},
			fotoDocumentoMoto: {
				required: true
			}
		},
		messages: {
			fotoDocumentoMoto: {
				required: "Por favor, envie uma foto do documento do veículo."
			}
		},errorPlacement: function(error, element) {
			if($(error)[0].innerText != "") {
				$(element).hasClass('is-valid') ? $(element).removeClass('is-valid') : '';
				$(element).addClass("is-invalid");
				$(element).parent().find('.invalid-feedback').text($(error)[0].innerText);
			}
		},
		success: function (label, element) {
			$(element).hasClass('is-invalid') ? $(element).removeClass('is-invalid') : '';
			$(element).addClass("is-valid");
		},
		highlight: function (element, errorClass, validClass) {

			// Preenchendo outros input do mesmo name com classe is-valid para ficar em vermelho quando não tiver selecionado nenhum
			// Tipo Radio e Checkbox	
			if ($(element).prop('type') === 'radio' || $(element).prop('type') === 'checkbox') {
				var nameElement = $(element).attr('name');
				var buscaElemento = "input[name=" + nameElement + "]";
				$(buscaElemento).each(function(){
					$(this).addClass("is-invalid");
				});
				if ($(element).prop('type') === 'checkbox'){
					$(element).parent().parent().find('.invalid-feedback').text("Por favor, selecione alguma ou todas opções.").show();
				} else {
					$(element).parent().parent().find('.invalid-feedback').text("Por favor, selecione uma das opções.").show();
				}
			}
		},
		submitHandler: function (form) {
			// form.submit();
			$.ajax({
				url: $(form).attr('action'),
				type: 'POST',
				data: new FormData(form),
				contentType: false,
				processData: false,
				success: function(response) {
					console.log("Epata 4 - Enviado com sucesso!");
					console.log(response);
					alert("Inscrição finalizada com sucesso, aguarde nosso contato!");
					window.location.reload();
					$(form).hide('slow');
				},
				error: function(request, status, error) {
					console.log("Oops! Ocorreu algum erro!");
					console.log(request);
					console.log(status);
					console.log(error);
				}
			});
		}
	});

	// Ação voltar etapa
	$(document).on('click', '.btn-prev', function (e) {
		$(this).parent().parent().parent().hide('slow').parent().prev().find('form').show('slow');
	});

	// Ação para abir anexos em Modal

	$(document).on('click', '.modal-image', function(e) {
		e.preventDefault();

		// modal
		var modal = $("#myModal");
		var imageModal = $("#myModal").find(".modal-content");
		
		imageModal.attr('src', $(this).attr('href'));
		modal.find("#caption").text($(this).attr('title'));
		modal.show();
	});
	// Ação fecha do modal
	$(document).on('click', '.modal .close', function() {
		$("#myModal").hide();
	});
});
