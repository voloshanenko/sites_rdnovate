(function(env){
	'use strict';
	
	var ui = {

        tools:{
            removeDOMelem:function (element) {
                if ($(element).length > 0) {
                    $(element).animate({
                        'height':0,
                        'opacity':0
                    }, app.settings.animationSpeed, function () {
                        $(element).remove();
                    });
                } else {
                    app.error('[app.ui.tools.removeDOMelem]: Несуществующий элемент для удаления');
                }
            }
        },

		spinner:{

			visible:false,
			spinner:null,

			show: function(callback){
                var self = this;
                $('.loading-spinner').fadeIn(app.settings.animationSpeed, function(){
					self.visible = true;
					if(typeof callback=='function') callback();
				});
			},
			hide: function(callback){
                var self = this;
                $('.loading-spinner').fadeOut(app.settings.animationSpeed, function(){
                    self.visible = false;
					if(typeof callback=='function') callback();
				});
			}
		},

        ajaxer:{

            send:function (url, type, data, success, error) {
                type = !type ? 'post' : type;
                data = !data ? {} : data;
                $.ajax({
                    url:url,
                    type:type,
                    data:data,
                    beforeSend: function(){
                    },
                    success:function (data) {
                    	var _obj = null;
                    	if(data) {
	                        _obj = $.parseJSON(data);
	                    }
                        success(_obj);
                    },
                    error:error
                });
            },

            toDOM:function (element, dataKey, ajaxUrl, ajaxType, ajaxParams, callback) {
                if (!ajaxUrl) {
                    app.error('[app.ui.ajaxer.dataToDOMelement()]: Не указан параметр URL');
                }
                app.ui.ajaxer.send(ajaxUrl, ajaxType, ajaxParams,
                    // if success
                    function (data) {
                        $(element).html(data[dataKey]);
                        app.ui.flashMessages.init().show(data);
                        callback();
                    },
                    // if error
                    function () {
                        app.error('[app.ui.ajaxer.dataToDOMelement()]: Ошибка при в AJAX-запросе.');
                    }
                );
            },

            confirmAndGo: function(elem, _data, _success, _error) {
                if( app.ui.dialog.prep(null).confirmation( $(elem).attr('title') ) )
                {
                    $.ajax({
                        type: 'get',
                        url: $(elem).attr('href'),
                        data: _data || {},
                        success: _success || function() {
                            if($(elem).hasClass('remove-parent')) {
                                app.ui.flashMessages.init().show({msg:'Удалено!', type:'success'});
                                var p = $(elem).parents($("'"+$(elem)+"'"));
                                p.slideUp(app.settings.animationSpeed, function(){
                                    p.parent().remove();
                                    return true;
                                });
                            }
                        },
                        error: _error || function(){
                            app.ui.flashMessages.init().show({msg:'Ошибка сервера. Попробуйте, пожалуйста, позже.',type:'error'});
                            return false;
                        }
                    });
                }
            }
        },
        
        autocomplete: function(elem){

        	var _element = null;
        	var _cache = [];
        	
        	function _processAutocompleteResults(resp, response) {
				response( $.map( resp, function( item ) {
					return {
						label: item[$(_element).data('attrib')],
						value: item[$(_element).data('attrib')]
					}
				}));
			};
			
			_element = elem;

        	return {
        		init: function(lookupUrl) {
        			
	        		_element = elem;
	        		
	        		$(_element).autocomplete({
						source: function( request, response ) {
							var term = request.term;
							if ( term in _cache ) {
								_processAutocompleteResults(_cache[term], response);
							}
							else
							{
								var vdata = {};
								vdata[$(_element).data('attrib')] = term;
								$.ajax({
									url: lookupUrl,
									type: "post",
									dataType: "json",
									data: vdata,
									success: function( data ) {
										_cache[term] = data;
										_processAutocompleteResults(data, response);
									}
								});
							}
						},
						delay: 0,
						minLength: 2
					});
	        	}
        	}

        },

        flashMessages:{

            container:null,
            msg:null,
            isVisible:false,
            timer:null,

            init:function () {
                if ($('#flashes').length > 0) {
                    this.isVisible = $('#flashes > div').is(':visible');
                    this.container = $('#flashes');
                    this.msg = $('#flashes > div');
                    if (this.isVisible) {
                        this.timer = setTimeout(function () {
                            this.hide();
                        }, app.settings.flashMessageInterval);
                    }
                }
                else {
                    this.container = $(!this.container ? document.createElement('div') : this.container);
                    this.msg = $(document.createElement('div'));
                    $(this.msg).appendTo(this.container);
                    $("#page").prepend($(this.container).attr('id', 'flashes').addClass('html-box'));
                }
                return app.ui.flashMessages;
            },
            show:function (data) {
                var t = this;
                if (t.isVisible === true) {
                    t.msg.slideUp(app.settings.animationSpeed, function () {
                        clearTimeout(t.timer);
                        t.timer = null;
                        t.msg.stop(true, true).removeClass().addClass('flash-' + data.type).html(data.msg).slideDown(app.settings.animationSpeed, function () {
                            t.isVisible = true;
                            t.timer = setTimeout(function () {
                                t.hide();
                            }, app.settings.flashMessageInterval);
                        });
                    });
                }
                else {
                    t.msg.html(data.msg).attr('class', '').addClass('flash-' + data.type).slideDown(app.settings.animationSpeed, function () {
                        t.isVisible = true;
                        t.timer = setTimeout(function () {
                            t.hide();
                        }, app.settings.flashMessageInterval);
                    });
                }
                return app.ui.flashMessages;
            },
            hide:function () {
                var t = this;
                t.msg.slideUp(app.settings.animationSpeed, function () {
                    t.isVisible = false;
                    clearTimeout(t.timer);
                    t.timer = null;
                    return app.ui.flashMessages;
                });
            }
        },

        dialog:{

            domElement:null,
            isVisible:true,

            // e - element that has to be used to build dialog window
            prep:function (e) {
                var _t = this;
                if (e == null) {
                	return confirm('Вы уверены?');
                } else {
                    _t.domElement = $(e);
                    _t.domElement.dialog({
                        closeOnEscape: false,
                        show: 'fade',
                        stack: true,
                        modal: true,
                        buttons: {
                            'OK': function(){
                                _t.domElement.dialog('close');
                                return (function(){true})();
                            }
                        }
                    });
                }

                return _t;
            },
            show: function () {
                var _t = this;
                if (window.jQuery != 'undefined' && _t.domElement != null) {
                    if (window.jQuery != 'undefined') {
                        $(_t.domElement).dialog('show');
                    } else {
                        app.error("[app.ui.dialog.show()]: не указан элемент для построения диалогового окна");
                        return false;
                    }
                } else {
                    alert("Извините!\nПроизошла ошибка сети при загрузке страницы\nПопробуйте перезагрузить страницу.");
                }
            },
            close:function () {
                var _t = this;
                if (window.jQuery != 'undefined' && _t.domElement != null) {
                    app.error("[app.ui.dialog.close()]: не указан элемент для построения диалогового окна");
                } else {
                    _t.domElement.dialog('close');
                }
            },
            alertion:function (msg, _buttons) {
                var _t = this;
                if (window.jQuery != 'undefined' && _t.domElement != null) {
                    _t.show();
                } else {
                    alert(msg);
                }
            },
            confirmation:function (msg) {
                var _t = this;
                if (window.jQuery != 'undefined' && _t.domElement != null) {
                    $(_t.domElement).dialog({
                        buttons:$.extend( _t.domElement.dialog("option", "buttons"), {
                            'Нет':function () {
                                _t.close();
                                return false;
                            }
                        })
                    });
                } else {
                    return confirm(msg);
                }
            },
            promtion:function (msg, _input, _defaultValue) {
                if (window.jQuery != 'undefined' && _t.domElement != null) {
                    return prompt(msg, defaultValue);
                }
            }
        }, // <- End of `Dialog` module

        calendar: {
            init: function(elem) {
                if($(elem).length == 0) {
                    app.debug('Calendar.init: element for found');
                } else {
                	$(elem).datetimepicker({
                        dateFormat: "yy-mm-dd",
                        timeFormat: 'hh:mm:ss',
                        firstDay: 1,
                        numberOfMonths: 1,
                        showButtonPanel: true,
                    });
                    return app.ui.calendar;
                }
            },
            connect: function(from, to) {
                var self = this;
                $(from).datepicker('option', 'onSelect', function(selectedDate ){
                    $(to).datepicker("option", "minDate", selectedDate);
                });
                $(to).datepicker('option', 'onSelect', function(selectedDate ){
                    $(from).datepicker("option", "maxDate", selectedDate);
                });
                return self;
            },
            setDate: function(element, date) {
            	$(element).val( date );
            }
        }, // <- End of `calendar`-module

        editor: {
            show: function(e){
                var config = {
                    language: 'ru'
                };
                app.tools.loadScript('/js/editor/ckeditor.js', function(){
                    app.tools.loadScript('/js/editor/adapters/jquery.js', function(){
                        app.tools.loadScript('/js/editor/ckfinder/ckfinder.js', function(){
                            if ( typeof CKEDITOR == 'undefined' ) {
                                document.write('<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.') ;
                            } else {
                                for (var editorName in CKEDITOR.instances) {
                                    CKFinder.setupCKEditor(CKEDITOR.instances[editorName], '/js/editor/ckfinder/') ;
                                }
                                $(e).ckeditor();
                            }
                        });
                    });
                });
            }
        },

		shadowBox : {

			backGroundOpaciy: 0.5,
			container : null,
			shadow : null,
			box : null,
            status : 'none',
            settings : {
                shadow : {
                    opacity: '0',
                    display: 'block'
                },
                box : {
                    width: '500px',
                    opacity: '0',
                    display: 'block',
                    top: 0
                }
            },

			init: function(width) {
                var self = this;
                if(self.status == 'none')
                {
                    app.ui.shadowBox.settings.box.width = (width || app.ui.shadowBox.settings.box.width);
                    self.shadow = document.createElement('div');
                    self.box = document.createElement('div');

                    $(self.shadow).addClass('shadowbox-shadow');
                    $(self.box).addClass('shadowbox-box');
                    var ofst = parseInt(app.ui.shadowBox.settings.box.width) / (-2);
                    $(self.box).css('marginLeft', ofst+'px');

                    $(self.shadow).click(function(){
                        self.hide();
                    });

                    $('body').append(self.shadow);
                    $('body').append(self.box);
                    self.status = 'inited';
                }
                return self;
			},
			show: function() {
                var self = this;
                app.ui.shadowBox.settings.box.top = $(window).scrollTop()+20+'px';
                if(self.status == 'inited') {
                    $(self.shadow)
                        .css(app.ui.shadowBox.settings.shadow)
                        .animate({'opacity': self.backGroundOpaciy}, app.settings.animationSpeed);
                }
                $(self.box)
                    .css(app.ui.shadowBox.settings.box)
                    .animate({opacity: 1}, app.settings.animationSpeed);
                self.status = 'allvisible';
                return self;
			},
			hide: function() {
                var self = this;
                $(self.shadow).fadeOut(app.settings.animationSpeed, function(){
                    $(this).remove();
                    self.shadow = null;
                });
                $(self.box).fadeOut(app.settings.animationSpeed, function(){
                    $(this).remove();
                    self.box = null;
                    self.status = 'none';
                });
				return self;
			},
            hideBox: function(callback) {
                var self = this;
                $(self.box).fadeOut(app.settings.animationSpeed, function(){
                    self.status = 'boxhidden';
                    if(typeof callback == 'function')
                        callback();
                });
                return self;
            },
            showBox: function(callback) {
                var self = this;
                $(self.box).fadeIn(app.settings.animationSpeed, function(){
                    self.status = 'allvisible';
                    if(typeof callback == 'function')
                        callback();
                });
                return self;
            },
            clear: function() {
                var self = this;
                $(self.box).html('');
                return self;
            },
            getBox: function() {
                return this.box;
            },
			appendContentFromURL : function(url) {
                var self = this;
				app.ui.ajaxer.toDOM($(self.box), url);
                return self;
			},
            appendElementContent : function(elem) {
                var self = this;
                $(self.box).html($(_wrapper).html());
                return self;
            },
            appendElement : function(elem) {
                var self = this;
                $(self.box).html('').append(elem);
                return self;
            }
		} // <- End of `shadowBox`-module

	} // <- End of `Ui`-module
	// Init
	env.ui = ui;
})(app);

var Collection = function(listOfItems) {
    var list = listOfItems;
    var currentIndex = 0;
    return {
        next: function() {
            if( currentIndex < (list.length-1) )
                var item = list[++currentIndex];
            else {
                currentIndex = 0;
                var item = list[currentIndex];
            }
            return item;
        },
        prev: function(){
            if( currentIndex > 0 )
                return list[--currentIndex];
            else {
                currentIndex = 0;
                return list[currentIndex];
            }
        },
        getAll: function(){
            return list;
        },
        setIndex: function(i){
            currentIndex = i;
        },
        getIndex: function(){
            return currentIndex;
        }
    }
};

var ScrollerBox = function(holder, shoe) {

    var _leftArrow, _rightArrow = null;
    var _busy = false;
    var _scrollStep = 0;
    var _holder = holder;
    var _shoe = shoe;

    function __checkArrowsVisibility() {
        var lstop = parseInt( $(_shoe).css('left') ) == 0;
        var rstop = parseInt( $(_shoe).css('left') )*(-1) >= $(_shoe).width() - $(_holder).width();
        _busy = true;
        if(lstop)
        {
            $(_leftArrow).fadeOut(app.settings.animationSpeed, function(){
                _busy = false;
            });
        }
        else if(rstop)
        {
            $(_rightArrow).fadeOut(app.settings.animationSpeed, function(){
                _busy = false;
            });
        }
        else
        {
            _busy = false;
        }
    }
    function __calcSlideOffset(dir)
    {
        if(dir=='R')
        {
            var w = $(_shoe).width()+parseInt($(_shoe).css('left'));
            var g = w / $(_holder).width();
            if( g <= 1 ) {
                _scrollStep = 0;
            } else if( g > 1 && g <=2 ) {
                _scrollStep = w - $(_holder).width();
            } else if( g > 2 ) {
                _scrollStep = $(_holder).width() - 180;
            }
        }
        if(dir=='L')
        {
            var l = parseInt($(_shoe).css('left')) * (-1);
            var w = $(_holder).width();
            if((l/w) > 2)
                _scrollStep = w - 180;
            if((l/w) < 2 && (l/w) > 1)
                _scrollStep = l;
        }
    }

    return {
        init: function()
        {
            var self = this;
            $(_holder).addClass('scrollerbox-holder');
            var t = $(_holder).prev();
            if(t.hasClass('contest-winners'))
            {
                var w = 0;
                t.find('img').each(function(i){
                    w += ($(this).width() + 10);
                });
                $(_holder).width($(_holder).parents('.contest').width() - w - 2);
            }
            _scrollStep = 0;
            if( $(_shoe).width() > $(_holder).width() )
            {
                _leftArrow = $(document.createElement('div'));
                $(_leftArrow).addClass('left-arrow').hide();
                $(_leftArrow).click(function(){
                    self.scroll('L');
                });

                _rightArrow = $(document.createElement('div'));
                $(_rightArrow).addClass('right-arrow').fadeTo(app.settings.animationSpeed, 0.7);
                $(_rightArrow).click(function(){
                    self.scroll('R');
                });

                _holder.prepend(_leftArrow);
                _holder.append(_rightArrow);
            }
        },

        scroll: function(dir)
        {
            if(_busy == false)
            {
                __calcSlideOffset(dir);
                _busy = true;
                if(dir == 'R')
                {
                    _shoe.animate({'left':'-='+_scrollStep+'px'}, parseInt(app.settings.animationSpeed*1.5), function(){
                        _busy = false;
                        __checkArrowsVisibility();
                    });
                    $(_leftArrow).fadeTo(app.settings.animationSpeed, 0.7);
                }
                if(dir == 'L')
                {
                    _shoe.animate({'left':'+='+_scrollStep+'px'}, parseInt(app.settings.animationSpeed*1.5), function(){
                        _busy = false;
                        __checkArrowsVisibility();
                    });
                    $(_rightArrow).fadeTo(app.settings.animationSpeed, 0.7);
                }
            }
        }
    }
};