(function($){
	if($.browser.opera)
	{
		$("#bionova_placeholder").html('<iframe seamless hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no" width="960px" height="147" frameborder="0" src="http://bionova.com.ua/feed/export_goods"></iframe>');
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
					$usb("#bionova_placeholder").html(xdr.responseText);
				};
				xdr.open("get", 'http://bionova.com.ua/feed/export_goods');
				xdr.send();
			} else {
				console.log('Failed to create new XDR object. Stupid IE.');
			}
		}
		else
		{
			$.ajax({
				url: 'http://bionova.com.ua/feed/export_goods',
				type: 'GET',
				crossDomain: true,
				success: function(res) {
					$("#bionova_placeholder").html(res);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus);
				}
			});
		}
	}
})(jQuery);