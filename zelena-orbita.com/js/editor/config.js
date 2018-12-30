/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.filebrowserBrowseUrl = '/js/editor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/js/editor/ckfinder/ckfinder.html?Type=Images';
    config.filebrowserFlashBrowseUrl = '/js/editor/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserUploadUrl = '/js/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/js/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/js/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
