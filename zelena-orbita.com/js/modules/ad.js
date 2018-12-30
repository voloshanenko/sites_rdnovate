/**
 * Ad module
 * 
 * It is used to manage all JS-iterations with Ads.
 */
(function(env, $){
	
	var ad = {
		autocomplete : {
			focusedAutocompleteBox : null,
			cache : [],
			resp : null
		},
		initAdPage : function() {
			$(".rekl-img-container").click(function(evt){
				evt.preventDefault();
				env.ad.enlargeImage(this);
			});
			return this;
		},
		enlargeImage : function(elem) {
			var img = document.createElement('img');
			img.src = $(elem).attr('href');
			app.ui.shadowBox.init('640px').appendElement(img).show();
			return this;
		},
		initializeFilter : function() {
			$('#ads-filter').animate({
				opacity: 1
			});
			// Autocompleme for form's inputs
			var aca = new Array();
			$(".autocomplete").each(function(i, Element){
				aca[i] = new app.ui.autocomplete(Element).init('/ads/default/lookup');
			});
			// ------ ------ ------ ------ ------ ------ ------ ------ ------
			return this;
		},
		initializeAdsList : function(){
			$(".rekl-img-container").click(function(evt){
				evt.preventDefault();
				env.ad.enlargeImage(this);
			});
			return this;
		},
		initializePostPage : function() {
			var aca = new Array();
			$(".autocomplete").each(function(i, Element){
				aca[i] = new app.ui.autocomplete(Element).init('/ads/default/lookup');
			});
			var startDate = $("#Ads_publishing_date").val();
			var endDate = $("#Ads_end_publishing_date").val();
			
			app.ui.calendar.init($("#Ads_publishing_date")).init($("#Ads_end_publishing_date")).connect($("#Ads_publishing_date"), $('#Ads_end_publishing_date'));
			
			app.ui.calendar.setDate($("#Ads_publishing_date"),startDate);
			app.ui.calendar.setDate($("#Ads_end_publishing_date"),endDate);
		}
	}

    env.ad = ad;
}(app.modules, jQuery))