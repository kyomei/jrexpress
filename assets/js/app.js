$(function(){

	var form = $('#formCadastro');
	
	
	/*
	form.find('#habilitacao_sim').bind('click', function(){
		
		removeAlert();
		nextElement(this);
		/*
		element = $(this).parent().parent();
		element.removeClass('d-block');
		element.next().show('slow');
		//$('#alert-message').hide();
		
	});
	form.find('#habilitacao_nao').bind('click', function(){
		
		var message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário possui habilitação categoria A.';
		createAlert(message);
		
	});
	form.find('#tempo_sim').bind('click', function() {
		removeAlert();
		nextElement($(this));
	});
	form.find('#tempo_nao').bind('click', function() {
		var message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário estar habilitado pelo menos à 2 anos.';
		createAlert(message);
	});
	form.find('#moto_sim').bind('click', function() {
		removeAlert();
		nextElement($(this));
	});
	form.find('#moto_nao').bind('click', function() {
		var message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário ter uma moto';
		createAlert(message);
	});
	*/
	
	// Campo Possui habilitação
	form.find('input[name=habilitacao]').bind('click', function() {
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
	form.find('input[name=tempo_habilitado]').bind('click', function() {
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
	form.find('input[name=cnhRemunerada]').bind('click', function() {
		let valor = $(this).val();
		removeAlert();
		nextElement($(this));		
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

	// Campo Data nascimento
	form.find('#verificarNascimento').bind('click', function() {
		
		
		let valor = $('input[name=nascimento]').val();
		let data = valor.split('-');
	
		if (idade(data[0], data[1], data[2]) < 21) {
			let message = '<strong>Desculpe!</strong> Infelizmente para trabalha conosco é preciso ter 21 anos de idade.';
			createAlert(message);
		} 
		
	});

	// Button proxima etapa
	form.find('.btn-prox').bind('click', function(){
		nextElement($(this));
	});
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
			}
		}
	});
});
