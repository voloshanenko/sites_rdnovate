app.modules.qa = (function($){
	
	var _answerFormValid = true;
	
	function _bindHandlers()
	{
		$("#question-answer-form").submit(function(e){
			// not so fast...
			var form = $(this);
			e.preventDefault();
			
			// validate answer form
			if($(this).find('textarea').val()=='') {
				$(this).find('textarea').next().show(app.settings.animationSpeed);
				_answerFormValid = false;
			}
			
			$(form).hide();
			// ok, sending the form
			if(_answerFormValid) {
				app.ui.ajaxer.send('/qa/answer', 'post', $("#question-answer-form").serialize(), function(data){
					if($("#no-answers").length > 0) {
						$("#no-answers").remove();
					}
					$(form).show();
					$("#question-answer-form textarea").val('');
					$("#answers-wall").prepend(data.answer);
					var _cntr = parseInt($("#answers-wall").prev().find('#answers-count').html());
					$("#answers-wall").prev().find('#answers-count').html(_cntr+1);
				}, null)
			}
		});
		
		$(".is-the-best a").click(function(e){
			e.preventDefault();
			if( confirm("Вы собираетесь определить лучший ответ и тем самым закрыть вопрос.\nОтветы больше не будут поступать.\nПродолжить?") ) {
				app.ui.ajaxer.send($(this).attr('href'), 'get', {}, function(){
					$("#question-answer-form").parent().remove();
					$(".is-the-best a").remove();
				});
			}
		});
		
		$('#question-answer-form textarea').keyup(function(){
			$(this).next().hide(app.settings.animationSpeed);
			_answerFormValid = true;
		});
	}
	
	function _initialize()
	{
		_bindHandlers();
	}
	
	return {
		init: _initialize
	}
	
}(jQuery));