(function($){
	if($.browser.opera)
	{
		$("#akvariumistika_placeholder").html('<iframe seamless hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no" width="960px" height="147" frameborder="0" src="http://akvariumistika-nova.com.ua/feed/export_goods"></iframe>');
	}
	else
	{
		//$.noConflict();
		if($.browser.msie && window.XDomainRequest)
		{
			//Fuck... ie again...
			xdr = new XDomainRequest();
			if(xdr) {
				xdr.onload = function(){
					$usb("#akvariumistika_placeholder").html(xdr.responseText);
				};
				xdr.open("get", 'http://akvariumistika-nova.com.ua/feed/export_goods');
				xdr.send();
			} else {
				console.log('Failed to create new XDR object. Stupid IE.');
			}
		}
		else
		{
			$.ajax({
				url: 'http://akvariumistika-nova.com.ua/feed/export_goods',
				type: 'GET',
				crossDomain: true,
				success: function(res) {
					$("#akvariumistika_placeholder").html(res);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus);
				}
			});
		}
	}
})(jQuery);