app.modules.search = (function($){
	
	var _timer = null;
	
	function _bindUIHandlers() {
		$("input#search-box-placeholder").focusin(function(){
			$(this).next().fadeIn(app.settings.animationSpeed);
			$("#search-term").focus();
		});

		$("#search-box").mouseleave(function(){
			$("#search-box").fadeOut(app.settings.animationSpeed);
		});

		$("#search-form").submit(function(e){
			e.preventDefault();
			if($("#search-term").val() == '') {
				alert('Введите, пожалуйста, искомое слово.');
				return false;
			}
			if($("#search-term").val().length <= 3) {
				alert('Искомое слово не может быть меньше 4 символов.');
				return false;
			}

			$.post($(this).attr('action'), $(this).serialize(), _processResponse);
		});
	}
	
	function _processResponse(data) {
		app.ui.shadowBox.init('800px');
		app.ui.shadowBox.appendElement('<div id="search-results">'+data+'</div>');
		if( app.ui.shadowBox.status == 'none' || app.ui.shadowBox.status == 'inited' )
		    app.ui.shadowBox.show();
        if( app.ui.shadowBox.status == 'boxhidden' )
		    app.ui.shadowBox.showBox();
	}
	
	function _initialize() {
		_bindUIHandlers();
	}
	
	return {
		init: _initialize
	}
	
}(jQuery));