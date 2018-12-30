var Photo = function(thumb, contest, index){

    var $ = jQuery,
    	_img = $(thumb).find('img'),
    	_contest = contest,
    	_thumb = $(thumb),
    	_voteable = false,
    	_bigImageReady = false,
    	_id = 0,
    	_title, _sponsorBox = '',
    	_index = index,
    	_bigImage = $(document.createElement('img')),
    	_photoData = null,
    	_wrapper = null,
    	_voteBox = null,
    	_owner = null,
    	_ads_bottom = null,
    	_ads_left = null,
    	_ads_right = null,
    	_id = $(_img).attr('id'),
    	_title = $(_img).attr('alt');

    return {
        getThumb: function() {
            return _thumb;
        },
        getThumbImage: function() {
            return _img;
        },
        getBigImage: function() {
            return _bigImage;
        },
        getContest: function() {
            return _contest;
        },
        getIndex: function(){
            return _index;
        },
        getId: function(){
            return _id;
        },
        prepare: function(photoData) {
            var self = this;

            if( photoData == 'undefined' )
                app.debug('Photo.prepare: no data about photo is received');
            else
                _photoData = photoData;

            _wrapper = $(document.createElement('div'));
            _voteBox = $(document.createElement('div'));
            _owner = $(document.createElement('div'));
            _voteable = _photoData.voteable;
            
            _ads_bottom = $(document.createElement('div')).attr('id', 'foto-ad-bottom');
            _ads_left = $(document.createElement('div')).attr('id', 'foto-ad-left');
            _ads_right = $(document.createElement('div')).attr('id', 'foto-ad-right');
            
            self.getContest().setActivePhoto(self);

            app.ui.shadowBox.init('640px');

            if(!_bigImageReady) {
                $(_bigImage).load(function(){
                    _bigImageReady = true;
                    self.show();
                });
            } else {
                self.show();
            }
            $(_bigImage).attr('src', $(_img).attr('trueimage'));
            $(_bigImage).click(function(){
                self.getContest().nextPhoto();
            });

            var headerHTML = '<table id="photo-header"><tr>';
            if( _photoData.contest != null )
                headerHTML += '<td id="photo-header-title">Фотоконкурс:<br /><strong>'+_photoData.contest.title+'</strong></td>';
            else
                headerHTML += '<td id="photo-header-title"></td>';

            if( _photoData.contestPartner != null )
                headerHTML += '<td id="photo-header-partner">Партнер:<br /><strong><a target="_blank" href="/photos/partners/view/id/'+_photoData.contestPartner.id+'">'+_photoData.contestPartner.name+'</a></strong>.<br />'+_photoData.contestPartner.slogan+'</td>';

            if( _photoData.contestSponsor != null )
                headerHTML += '<td id="photo-header-sponsor">Спонсор:<br /><strong><a target="_blank" href="/photos/sponsor/view/id/'+_photoData.contestSponsor.id+'">'+_photoData.contestSponsor.name+'</a></strong>.<br />'+_photoData.contestSponsor.slogan+'</td>';

            headerHTML += '</tr></table>';
            _voteBox.addClass('photo-item-votes');
            if (_photoData.contest != null && !self.getContest().isPlaned(_photoData.contest.date_start)) {
                _voteBox.append('<span class="has-icon white-star">Рейтинг: <span id="rating-counter" class="photo-item-votes-counter">'+_photoData.photo.rating+'</span></span>');
            }
            _voteBox.append('<span class="has-icon white-lupa">Просмотров: <span id="views-counter" class="photo-item-votes-counter">'+_photoData.photo.views+'</span></span>');
            if (_voteable) {
                if( self.getContest().isFinished(_photoData.contest.date_end) ) {
                    _voteBox.append('<br /><small>Голосование уже закрыто,<br />фотоконкурс закончился '+self.getContest().getDateEnd()+'</small>');
                } else if ( self.getContest().isPlaned(_photoData.contest.date_start) ) {
                    _voteBox.append('<br /><small>Голосование еще закрыто,<br />фотоконкурс начнется '+self.getContest().getDateStart()+'</small>');
                } else {
                    _voteBox.append('<br /><a class="has-icon white-thumbs-up" href="#">Голосую!</a>');
                }
            } else {
                _voteBox.append('<br /><small>Вы уже голосовали за это фото.</small>');
            }

            _owner.addClass('photo-item-owner').append('Фото загрузил(а): <strong>'+_photoData.owner.first_name+' '+_photoData.owner.last_name+'</strong><br />'+_photoData.owner.address)

            _wrapper.addClass('shadowbox-content').html('')
                .append(headerHTML)
                .append(_bigImage)
                .append('<div id="photo-description">'+_title+'</div>')
                .append(_voteBox)
                .append(_owner);

            $(_bigImage).wrap('<div id="big-image-holder" />');
            $(_bigImage).after('<a class="new-window icon" target="_blank" title="Постоянная ссылка на фото. Откроется в новом окне." href="/photos/item/view/id/'+_id+'"></a>');

            $(_voteBox.find('a')).click(function(e){
                $(this).replaceWith('<small id="one-minute">Минуточку!..</small>');
                e.preventDefault();
                self.vote();
            });
            
            if(_photoData.ads_bottom != null) {
            	var d = _photoData.ads_bottom;
				$.each(d, function(i, v){
					_ads_bottom.append('<a href="'+v.url+'" target="_blank"><img src="'+v.image+'" title="'+v.title+'" alt="'+v.title+'" border="0" /></a>');
				});
			}
			_wrapper.append(_ads_bottom);
    		
    		if(_photoData.ads_left != null) {
    			var d = _photoData.ads_left;
				$.each(d, function(i, v){
					_ads_left.append('<a href="'+v.url+'" target="_blank"><img src="'+v.image+'" title="'+v.title+'" alt="'+v.title+'" border="0" /></a>');
				});
			}
			_wrapper.append(_ads_left);
			
    		if(_photoData.ads_right != null) {
    			var d = _photoData.ads_right;
				$.each(d, function(i, v){
					_ads_right.append('<a href="'+v.url+'" target="_blank"><img src="'+v.image+'" title="'+v.title+'" alt="'+v.title+'" border="0" /></a>');
				});
			}
			_wrapper.append(_ads_right);
        },
        show: function(callback){
            $(_bigImage).css('opacity', 1);
            app.ui.shadowBox.appendElement(_wrapper);

            app.ui.spinner.hide();
            if( app.ui.shadowBox.status == 'none' || app.ui.shadowBox.status == 'inited' )
			    app.ui.shadowBox.show();
            if( app.ui.shadowBox.status == 'boxhidden' )
			    app.ui.shadowBox.showBox();

	        if( typeof callback == 'function' ) callback();
        },
        hide: function(callback){
            $(_bigImage).animate({opacity: 0}, app.settings.animationSpeed, function(){
                if( typeof callback == 'function' ) callback();
            });
        },
        vote : function(){
            var self = this;
            app.ui.ajaxer.send('/photos/item/vote/', 'post', {id: _id}, function(data){
                $(self.getThumb()).find('img').attr('rating', data.newRating);
                $(self.getThumb()).find('img').attr('voteable', 'false');
                _voteable = false;
                _rating = data.newRating;
                $(self.getThumb()).find('.photo-item-votes').find('a').replaceWith('Рейтинг:')
                $(self.getThumb()).find('.photo-item-votes-counter').html(data.newRating);
                $(_voteBox).find('#one-minute').replaceWith('<small>Спасибо за Ваш голос!</small>');
                $(_voteBox).find('#rating-counter').html(data.newRating);
            });
            return false;
        },
        voteFromPage : function(photoId) {
        	var self = this;
        	$('#photo-vote-box .white-thumbs-up').replaceWith('<span id="one-minute">Минуточку...</span>');
            app.ui.ajaxer.send('/photos/item/vote/', 'post', {id: photoId}, function(data){
                $('#photo-vote-box #one-minute').replaceWith('Спасибо за Ваш голос!');
                $('#photo-vote-box #rating-counter').html(data.newRating);
            });
            return false;
        }
    }
};

/** Contest
 *
 * This is an object for contest div. It has 2 states: Simple and Full.
 * If it's simple we don't have sponsor and title. In other words, it is just a collection of photos
 */
var Contest = function(wrapper, scrollerBoxNeeded, simplyfied){

    var wrapper = $(wrapper);
    var _list = null;
    var contestId = $(wrapper).attr('id') || null;
    var isSimple = simplyfied;
    var isScrollable = scrollerBoxNeeded;
    var dateStart = '';
    var dateEnd = '';
    if(isScrollable) {
        var _scrollerBox = null;
    }
    if(!isSimple) {
        var _title = $(wrapper).find('.contest-info').find('h3').html();
        var _sponsor = $(wrapper).find('.sponsor-info');
    }
    var _photos = $(wrapper).find('.photo-item');
    var _activePhoto = null;

    function prepareContest(self) {
    	$(".photo-item a").click(function(e){
    		e.preventDefault();
    	});
        var photos = [];
        $(_photos).each(function(index){
            var p = new Photo(this, self, index);
            $(p.getThumbImage()).live('click', function(){
                app.ui.spinner.show(function(){
                    app.ui.ajaxer.send('/photos/item/view/id/'+p.getId(), 'get', {}, function(photo) {
                        p.prepare(photo);
                    });
                });
            });
            photos[index] = p;
        });
        _list = new Collection(photos);
        if(isScrollable) {
            _scrollerBox = new ScrollerBox( $(wrapper).find('.contest-wall'), $(wrapper).find('.contest-wall-wrapper') );
            _scrollerBox.init();
        }
    }

	return {
		init : function() {
            var self = this;
            if(contestId != null)
            {
                // Receive info about Contest, setting up
                // dates and activate Contest
                // -----------------------------------------
                app.ui.ajaxer.send('/photos/contest/view/id/'+contestId, 'post', {}, function(contestData){
                    self.setDateStart(contestData.date_start);
                    self.setDateEnd(contestData.date_end);
                    prepareContest(self);
                    $(wrapper).animate({opacity: 1}, app.settings.animationSpeed);
                });
            } else {
                prepareContest(self);
            }
		},
        setActivePhoto: function(photo){
            _activePhoto = photo;
            _list.setIndex(photo.getIndex());
        },
        nextPhoto: function() {
            var nextItem = _list.next();
            this.setActivePhoto(nextItem);
			app.ui.spinner.show(function(){
                nextItem.hide(function(){
					app.ui.ajaxer.send('/photos/item/view/id/'+nextItem.getId(), 'get', {}, function(photo){
						app.ui.shadowBox.hideBox(function(){
							nextItem.prepare(photo);
						});
					});
				});
			});
        },
        prevPhoto: function() {
            var prevPhoto = _list.prev();
            this.setActivePhoto(prevPhoto);
            app.ui.spinner.show(function(){
                prevPhoto.hide(function(){
                    app.ui.ajaxer.send('/photos/item/view/id/'+prevPhoto.getId(), 'get', {}, function(photo){
                        app.ui.shadowBox.hideBox(function(){
                            prevPhoto.prepare(photo);
                        });
                    });
                });
            });
        },
        getId: function() {
            return contestId;
        },
        setDateStart: function(date) {
            dateStart = app.tools.date.format(date);
        },
        setDateEnd: function(date) {
            dateEnd = app.tools.date.format(date);
        },
        getDateStart: function() {
            return dateStart;
        },
        getDateEnd: function() {
            return dateEnd;
        },
        isPlaned: function(date) {
            var d = date || this.getDateStart();
            var res = app.tools.date.inFuture(d);
            return res;
        },
        isFinished: function(date) {
            var d = date || this.getDateEnd();
            var res = app.tools.date.inPast(d);
            return res;
        }
	}
};

/** Module initializing function.
 *
 * - It creates Contests objects, initializes them.
 * - Each Contest has a ScrollBox (from UI library)
 *   for visual effects.
 * - Also, each Contest has a Photo object, which implements
 *   all we need from photo.
 *
 * This also works for page with photos, but without
 * of certain contest. In this case it creates simple
 * version of Contest for each collection of photos.
 */
(function(){

    // Initial event listeners.
    // ------------------------------------------------
    $(".photo-item").live({
        mouseenter: function(){
            $(this).find('.photo-item-votes').css({'opacity':0, 'display':'block'}).stop().animate({
                'opacity': .8
            }, app.settings.animationSpeed);
        },
        mouseleave: function(e){
            $(this).find('.photo-item-votes').animate({
                'opacity': 0
            }, app.settings.animationSpeed, function(){
                $(this).css({'opacity':0, 'display':'none'})
            });
        }
    });

    // Counting Widths of Elements
    // ------------------------------------------------
    if( $(".contest-wall").length > 0 ) {
        $(".contest-wall").each(function(i){
            var cnt = $(this).children().eq(0).find('.contest-image').length;
            var w = 80*Math.ceil(cnt/3);
            $(this).children().eq(0).css('width', w+'px');
        });
    } else {
        $(".contest-wall").each(function(i){
            $(this).children().eq(0).css('width', '100%');
        });
    }
    
    //$(".contest-wall-wrapper").draggable({axis: 'x', snap: ".contest-wall"});

    // Collecting Contests and initialize them
    // ------------------------------------------------
    app.modules.contestsArray = [];
    if( $(".contest").length > 0 ) {
        $(".contest").each(function(i){
            var contest = new Contest(this, true, false);
            contest.init();
            app.modules.contestsArray.push(contest);
        });
    }
    else
    {
        $(".image-collection").each(function(i){
            var collection = new Contest(this, false, true);
            collection.init();
            app.modules.contestsArray.push(collection);
        });
    }
})();