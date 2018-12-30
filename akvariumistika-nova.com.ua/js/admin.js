$(document).ready(function(){
	if( $(".order_status_list").length > 0 )
	{
		$(".order_status_list").change(function(){
			var el = $(this);
			$(el).parent().find('small').remove();
			$(el).parent().append('<small>Минутку...</small>');
			$.post(
				'/admin/items/orders/set_status',
				{id: $(el).attr('id'), status: $(el).val()},
				function(data){
					$(el).parent().find('small').html(data).fadeOut('444');
				}
			);
		});
	}
	
	if ( $(".autocomplete").length > 0 )
	{
		var elem = $(".autocomplete");
		$(".autocomplete").autocomplete({
			source: function (request, response) {
					$.post(
						$(elem).parent().attr('action'),
						$(elem).parent().serialize(),
						function(data){
							var obj = $.parseJSON(data);
							response(
								$.map( obj, function( item ) {
									return {
										label: item.id + ": " + item.title,
										value: item.value,
										id: item.id
									}
								})
							);
						}
					);
				},
			minLength: 2,
			data: $(elem).parent().serialize(),
			select: function( event, ui ) {
				$.post('/' + $('#c').val() + '/' + $('#m').val(), {param: $('#p').val(), val: ui.item.id}, function(data){
					$("#admin_table").html(data);
				});
			}
		});
	}
	
	$(".pagination a").live('click', function(e){e.preventDefault();
		var url = window.location.href;
		var arr = url.split('/');
		var filter = ( typeof arr[7] != 'undefined' ) ? arr[7] : '';
		
		var arr2 = $(this).attr('href').split('/');
		var offset = (typeof arr2[4] == '' ) ? 'empty' : arr2[4];
		
		if( filter != '' ) {
			if( offset == '') {
				window.location.href = $(this).attr('href')+'0/'+filter;
			} else {
				window.location.href = $(this).attr('href')+'/'+filter;
			}
		} else {
			if( offset == '') {
				window.location.href = $(this).attr('href')+'0/';
			} else {
				window.location.href = $(this).attr('href')+'/';
			}
		}
	});
	
	if( $("#tabs").length > 0 )
	{
		$("#tabs").tabs({});
	}
	
	/*
	 * Feedbacks
	 * --------------------------------------------------------------------------------------------
	 */
	$(".approve_feedback").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="disapprove_feedback" id="'+id+'" href="/admin/items/feedbacks/disapprove/'+id+'">Скрыть</a>');
		});
	});
	
	$(".disapprove_feedback").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="approve_feedback" id="'+id+'" href="/admin/items/feedbacks/approve/'+id+'">Показать</a>');
		});
	});
	
	$(".show_feedback").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="hide_feedback" id="'+id+'" href="/admin/items/feedbacks/hide_on_main/'+id+'">Убрать с главной</a>');
		});
	});
	
	$(".hide_feedback").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="show_feedback" id="'+id+'" href="/admin/items/feedbacks/show_on_main/'+id+'">Показать на главной</a>');
		});
	});
	
	$('.update-item-comment').live('click', function(e){e.preventDefault();
		$.post(
				$(this).attr('href'),
				{text: $(this).parent().parent().find('textarea').val()},
				function(){
					alert('Сохранено!');
				}
		);
	})

	/*
	 * Comments
	 * ---------------------------------------------------------------------------------------------
	 */
	$(".approve_pagecomments").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="disapprove_pagecomments" id="'+id+'" href="/admin/items/pagecomments/disapprove/'+id+'">Скрыть</a>');
		});
	});
	
	$(".disapprove_pagecomments").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="approve_pagecomments" id="'+id+'" href="/admin/items/pagecomments/approve/'+id+'">Показать</a>');
		});
	});
	
	$(".show_pagecomments").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="hide_pagecomments" id="'+id+'" href="/admin/items/pagecomments/hide_on_main/'+id+'">Убрать с главной</a>');
		});
	});
	
	$(".hide_pagecomments").live('click', function(e){e.preventDefault();
		var id = $(this).attr('id');
		var parent = $(this).parent();
		$(parent).html('Минутку...');
		$.post($(this).attr('href'), {}, function(){
			$(parent).html('<a class="show_pagecomments" id="'+id+'" href="/admin/items/pagecomments/show_on_main/'+id+'">Показать на главной</a>');
		});
	});
	
	if($(".admin_sortable").length > 0)
	{
		$(".admin_sortable").sortable({
			placeholder: 'ui-state-highlight',
			items: 'tr',
			placeholder: 'ui-state-highlight',
			forcePlaceholderSize: true,
			axis: 'y',
			update: function(event, ui) {
				var order = $(this).sortable("serialize")+'&context='+$(this).attr('id');
				$.post('/admin/sort_table', order);
			}
		});
	}
	
	$("ul.admin_tree li a").click(function(e){
		if( $(this).parent().find('ul').length > 0 ) {
			e.preventDefault();
		}
		if( $(this).parent().hasClass('hover-item') ) {
			$(this).parent().removeClass('hover-item').find("ul:first").slideUp(333);
		} else { 
			$(this).parent().addClass('hover-item').find("ul:first").slideDown(333);
		}
	});
	
	$(".filter_tree").hover(
		function(){
			$(this).addClass("filter_tree_hover");
		},
		function(){
			$(this).removeClass("filter_tree_hover");
		}
	);
	
	if( $("#seach-box").length > 0 )
	{
		$("#go-search").click(function(){
			$("#search-overlay").fadeIn('fast', function(){
				$("#search-content").html('Минутку, ищу...');
				$.post('/admin/search/', {word: $("#search-word").val(), context: $("#context").val(), s4: $("#s4").val(), s5: $("#s5").val()}, function(data){
					$("#search-content").html(data);
				});
			});
		});
		$("#search-title").click(function(e){e.preventDefault();
		$("#search-overlay").fadeOut('fast');
		});
	}
	
	if( $("#admin_tree_wrapper").length > 0 )
	{
		$("#admin_tree_wrapper li a").hover(
			function() {
				$(this).next().find('a').css('display', 'inline');
			},
			function() {
					$(this).next().find('a').fadeOut('slow');
			}
		);
		$("#admin_tree_wrapper li span a").hover(
			function() {
				$(this).stop().css('opacity', '1');
			},
			function() {
				$(this).fadeOut('slow');
			}	
		);
	}

	$(".del_link").click(function(e){e.preventDefault();
		var isback = $(this).hasClass('backtolist');
		if( confirm('Вы действительно хотите удалить эту позицию?') )
		{
			$.post($(this).attr('href'), {back: isback}, function(data){
				if(data == '1')
				{
					window.location.reload();
				}
				else
				{
					window.location.href = data;
				}
			});
		}
	});

});

function save_file(el)
{
	var ed = CKEDITOR.instances[el];
	$("#"+el).html(ed.getData());
	$("#"+el).attr('disable', 'disable');
	$.post(
			'/admin/save_file',
			{
				file: $("#"+el).attr('id'),
				content: $("#"+el).val()
			},
			function(data){
				$("#"+el).removeAttr('disable');
				alert(data);
			}
	);
}

function set_value(c, e, v, cpt)
{
	$('#'+e).val(v);
	$("span.parent-selected").html("Выбрано: "+cpt);
}

function set_filter_url(e)
{
	var param_name = $("#"+e).attr('id');
	var param_value = $("#"+e).val();
	var param = param_name+'='+param_value+':';
	var curr_url = window.location.href;
	
	var budd =  (curr_url.charAt(curr_url.length-1) != '/') ? ( (curr_url.charAt(curr_url.length-1) != ':') ? '/' : '' ) : '';
	
	if( curr_url.match(new RegExp(param_name)) )
	{
		var pos = curr_url.indexOf(':', curr_url.indexOf(param_name, 0));
		var old_ns = curr_url.substring(curr_url.indexOf(param_name, 0), pos+1);
		ns = old_ns.replace(/(\d+)/, param_value);
		if( param_value == "-1" )
		{
			curr_url = curr_url.split(old_ns).join('');
		}
		else
		{
			curr_url = curr_url.split(old_ns).join(budd+ns);
		}
		window.location.href = curr_url;
	}
	else
	{
		if( param_value != "-1" ) {
			window.location.href = curr_url+budd+param;
		}
	}
}
