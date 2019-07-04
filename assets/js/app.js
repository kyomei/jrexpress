$(function(){

	var form = $('#formCadastro');

	form.find('#habilitacao_sim').bind('click', function(){
		element = $(this).parent().parent();
		element.removeClass('d-block');
		element.next().show('slow');
		$('#alert-message').hide();
	});
	form.find('#habilitacao_nao').bind('click', function(){
		var alerte = $('#alert-message');
		alerte.find('.message').html('<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário possui um veículo.');
		alerte.show('slow');
	});
	form.find('#tempo_sim').bind('click', function() {
		nextElement($(this));
	});
	form.find('#tempo_nao').bind('click', function() {
		var alerte = $('#alert-message');
		alerte.find('.message').html('<strong>Desculpe!</strong> Infelizmente para trabalha conosco é necessário estar habilitado pelo menos à 2 anos.');
		alerte.show('slow');
	});
	form.find('#moto_sim').bind('click', function() {
		nextElement($(this));
	});

	form.find('.btn-prox').bind('click', function(){
		nextElement($(this));
	});

	function nextElement(e) {
		element = $(e).parent().parent();
		element.hide('slow');
		element.next().show('slow');
		$('#alert-message').hide();
	}
	
});
