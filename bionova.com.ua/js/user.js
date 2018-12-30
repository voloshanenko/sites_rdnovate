var arrayQestions = new Array();
arrayQestions[0] = '3+7';
arrayQestions[1] = '2+6';
arrayQestions[2] = '5+4';
arrayQestions[3] = '8+5';

var arrayAnswers = new Array();
arrayAnswers[0] = '10';
arrayAnswers[1] = '8';
arrayAnswers[2] = '9';
arrayAnswers[3] = '13';

$(document).ready(function(){
	$('ul.menu_tree ul').each(function(i) { // Check each submenu:
		if ($.cookie('submenuMark-' + i)) {  // If index of submenu is marked in cookies:
			$(this).show().prev().removeClass('collapsed').addClass('expanded'); // Show it (add apropriate classes)
		}else {
			$(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Hide it
		}
		$(this).prev().addClass('collapsible').click(function() { // Attach an event listener
			var this_i = $('ul.menu_tree ul').index($(this).next()); // The index of the submenu of the clicked link
			if ($(this).next().css('display') == 'none') {
				$(this).next().slideDown(200, function () { // Show submenu:
					$(this).prev().removeClass('collapsed').addClass('expanded');
					cookieSet(this_i);
				});
			}else {
				$(this).next().slideUp(200, function () { // Hide submenu:
					$(this).prev().removeClass('expanded').addClass('collapsed');
					cookieDel(this_i);
					$(this).find('ul').each(function() {
						$(this).hide(0, cookieDel($('ul.menu_tree ul').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
					});
				});
			}
		return false; // Prohibit the browser to follow the link address
		});
	});
	
	$(".item-box").hover(
			function(){
				$(this).find(".item-thumb-description").fadeIn(333);
			},
			function(){
				$(this).find(".item-thumb-description").fadeOut(333);
			}
	);
	
	$("#search-pages-form").submit(function(e){e.preventDefault();
		if( $("#word").val() == 'undefined' || $("#word").val() == '' )
		{
			alert('Введите фразу или слово для поиска.');
		}
		else
		{
			$("body").append('<div id="ipsd"></div>');
			$("body").append('<div id="page-search-results"></div>');
			$("#page-search-results").fadeIn();
			$("body #ipsd").css('opacity', 0).css('display', 'block').animate({opacity:.7},333);
			$.post($(this).attr('action'), {word: $("#word").val()}, function(d){
				$("#page-search-results").html(d);
			});
		}
	});
	
	if( $("#tabs").length > 0 )
	{
		$("#tabs").tabs();
	}
	
	$(".decr").click(function(){
		var v = parseInt( $(this).prev().prev().val() );
		if( v > 1 )
		{
			$(this).prev().prev().val( v - 1 );
		}
	});
	
	$("#ask-from").submit(function(e){e.preventDefault();
		var allowed = ($("#from_name").val() != '') && ($("#from_email").val() != '') && ($("#message").val() != '');
		if(allowed)
		{
			var i = Math.floor(Math.random() * (3 - 0 + 1)) + 0;
			var ans = prompt('Сосчитайте пожалуйста: '+arrayQestions[i]);
			if( ans == arrayAnswers[i] )
			{
				var data = $("#ask-from").serialize();
				$("#ask-box").html('<p>Минутку, Ваше сообщение отправляется...</p>');
				$.post('/askme', data, function(){
					$("#ask-box").html('<p>Спасибо, Ваше сообщение отправлено!</p>');
				});
			}
			else
			{
				alert('Извините, Вы ошиблись. Введите правильную сумму чисел.');
			}
		}
		else
		{
			alert('Заполните, пожалуйста, все поля. Спасибо!');
		}
	});
	
	$(".vendor_name").hover(
		function(){
			$(this).next().fadeIn('fast');
		},
		function() {
			$(this).next().fadeOut('fast');
		}
	);
	
	$(".incr").click(function(){
		var v = parseInt( $(this).next().next().val() );
		$(this).next().next().val( v + 1 );
	});
	
	// Ссылка нажата, появляется окно, загружается форма
	$("#open-register").click(function(e){e.preventDefault();
		$("body").append('<div id="rws"></div><div id="registration-window"></div>');
		$("#rws").css('opacity', 0).css('display', 'block').animate({opacity:.7},333);
		$("#registration-window").fadeIn('fast', function(){
			$("#registration-window").html('Минутку, загружаю форму регистрации...');
			$.get('/user/registration', null, function(data){
				$("#registration-window").html(data);
			});
		});
	});
	
	// Форма отправляется
	$("#registration-form").live('submit', function(e){e.preventDefault();
		$("#registration-window").html('Минутку, данные проверяются...');
		$.post($(this).attr('action'), $(this).serialize(), function(data){
			$("#registration-window").html(data);
			if( data.indexOf('завершена') != -1 )
			{
				setTimeout(function(){
					window.location.reload();
				}, 500);
			}
		});
	});
	
	// Нажата ссылка Отмена
	$("#cancel-registration").live('click', function(e){e.preventDefault();
		$("#registration-window").fadeOut('fast', function(){
			$("#rws").fadeOut('fast', function(){
				$("#rws").remove();
			});
			$("#registration-window").remove();
		});
	});
	
	// Нажат темный фон под окном регистрацииx
	$("#rws").live('click', function(){
		$("#registration-window").fadeOut('fast', function(){
			$("#rws").fadeOut('fast', function(){
				$("#rws").remove();
			});
			$("#registration-window").remove();
		});
	});

	$("#goods-сomments-form").submit(function(e){e.preventDefault();
		var form = $("form#goods-сomments-form");
		var data = $(form).serialize();
		var allowed = ($("form#goods-сomments-form textarea").val() != '');
		if(allowed)
		{
			var i = Math.floor(Math.random() * (3 - 0 + 1)) + 0;
			var ans = prompt('Сосчитайте пожалуйста: '+arrayQestions[i]);
			if( ans == arrayAnswers[i] )
			{
				$("#ask-box").html('<p>Минутку, Ваше сообщение отправляется...</p>');
				$.post( $(form).attr('action'), data, function(fb){
					if( fb == "1" )
					{ 
						$(form).find('textarea').val('');
						alert('Спасибо за комментарий. Он появится на сайте сразу же после проверки модератором.');
					}
				});
			}
			else
			{
				alert('Извините, Вы ошиблись. Введите, пожалуйста, правильную сумму чисел.');
			}
		}
		else
		{
			alert('Напишите, пожалуйста, текст комментария.');
		}
	});
	
	$("#section-login form").live('submit', function(e){e.preventDefault();
		var form_code = $("#section-login").html();
		var form = $("#section-login form");
		$("#section-login").html('Минутку, проверяю введенные данные...');
		$.post('/user/login', $(form).serialize(), function(data){
			if(data == 'A')
			{
				if (confirm('Здравствуйте! Желаете перейти в админку?') )
				{
					window.location.href = '/admin';
				}
				else
				{
					window.location.reload();
				}
			}
			else
			{
				if(data == '1') {
					alert('Спасибо за авторизацию!');
					window.location.reload();
				}
				if(data == '0') {
					if (confirm('Логин или пароль были введены не верно. Хотите зарегистрироваться?') )
					{
						$("#section-login").html(form_code);
						$("body").append('<div id="rws"></div><div id="registration-window"></div>');
						$("#rws").css('opacity', 0).css('display', 'block').animate({opacity:.7},333);
						$("#registration-window").fadeIn('fast', function(){
							$("#registration-window").html('Минутку, загружаю форму регистрации...');
							$.get('/user/registration', null, function(data){
								$("#registration-window").html(data);
							});
						});
					}
					else
					{
						$("#section-login").html(form_code);
					}
				}
			}
		});
	});
	
	$("#show-hide-cat-description").click(function(ev){ev.preventDefault();
		switch( $("#show-hide-cat-description").attr('class') )
		{
			case 'open':
				$("#category-descript").css('height', 'auto');
				$("#show-hide-cat-description").removeClass('open').addClass('close').text('свернуть');
				break;
			case 'close':
				$("#category-descript").css('height', '20px');
				$("#show-hide-cat-description").removeClass('close').addClass('open').text('развернуть');
		}
	});
	
	$("#checkout-form").submit(function(e){e.preventDefault();
		$.ajax({
			url: '/mycart/checkout',
			data: $("#checkout-form").serialize(),
			type: 'POST',
			success: function(data){
				alert(data);
			}
		});
	});
	
	$(".product-image a").click(function(e){e.preventDefault();
		var url = $(this).attr('href');
		$("body").append('<div id="ipsd"></div>');
		$("body").append('<div class="image-preview"><table><tr><td id="ipi"><img src="'+url+'" /></td></tr></table></div>');
		$("body #ipsd").css('opacity', 0).css('display', 'block').animate({opacity:.7},333);
		$("body .image-preview").fadeIn('555');
	});
	
	$(".image-preview img, #ipsd").live('click', function(){
		if( $(".image-preview").length > 0 )
		{
			$(".image-preview, #ipsd").fadeOut('222', function(){
				$(".image-preview, #ipsd").remove();
			});
		}
		if( $("#page-search-results").length > 0 )
		{
			$("#page-search-results, #ipsd").fadeOut('222', function(){
				$("#page-search-results, #ipsd").remove();
			});
		}
	});
	
	$("#complete-order").click(function(e){e.preventDefault();
		$("#complete-order").remove();
		$("#content").append('<p>Минутку, данные обрабатываются...</p>');
		$.post('/mycart/checkout', {
			comments: $("#comments-box").val(),
			delivery: $("input[name=delivery]:checked").val(),
			payment: $("input[name=payment]:checked").val()
			}, function(d){
			if( d == '1' ) {
				window.location.href = '/mycart/checkout_confirm';
			}
		});
	});
});

function open_ask_window()
{
	$("#ask-us-window").fadeIn('fast');
}

function close_ask_window()
{
	$("#ask-us-window").fadeOut('fast');
}

function submitOrderForm(){
	if( $("#comments-box").val() )
	{
		if( confirm('Вы ввели комментарии к заказу. При пересчете они сотрутся (но Вы можете скопировать их в буфер обмена). Продолжить?') )
		{
			$("#cart-form").submit();
		}
	}
	else
	{
		$("#cart-form").submit();
	}
}
 
function cookieSet(index) {
	$.cookie('submenuMark-' + index, 'opened', {expires: null, path: '/'}); // Set mark to cookie (submenu is shown):
}
function cookieDel(index) {
	$.cookie('submenuMark-' + index, null, {expires: null, path: '/'}); // Delete mark from cookie (submenu is hidden):
}

function order(el)
{
	$.post('/mycart/add', {sku: el, qty: $("."+el).val()}, function(data){
		$("#small-cart-wrap").fadeOut('fast', function(){
			$("#small-cart").html('').html(data);
			$("#small-cart-wrap").fadeIn('slow');
		});
	});
}

function remove_from_cart(rowid)
{
	$.post('/mycart/remove', {id: rowid}, function(data){
		$("#small-cart-wrap").fadeOut('fast', function(){
			$("#small-cart").html('').html(data);
			$("#small-cart-wrap").fadeIn('slow');
		});
	});
}