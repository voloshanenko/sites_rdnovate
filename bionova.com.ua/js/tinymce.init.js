$(document).ready(function(){
	if ( typeof CKEDITOR == 'undefined' )
	{
		document.write(
				'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
				'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
				'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
				'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
				'value (line 32).' ) ;
	} else {
		for (var editorName in CKEDITOR.instances)
		{
			CKFinder.SetupCKEditor(CKEDITOR.instances[editorName], '/js/ckfinder/') ;
		}
	}
})
