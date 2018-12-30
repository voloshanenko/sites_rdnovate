/**
* @version		$Id: popup-filemanager.js 10702 2008-08-21 09:31:31Z eddieajau $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

/**
 * JFileManager behavior for media component
 *
 * @package		Joomla.Extensions
 * @subpackage	Media
 * @since		1.5
 */
var FileManager = {
	initialize: function()
	{
		o = this._getUriObject(window.self.location.href);
		//console.log(o);
		q = $H(this._getQueryObject(o.query));
		this.editor = decodeURIComponent(q.get('e_name'));

		// Setup file manager fields object
		this.fields		= new Object();
		this.fields.url		= $("f_url");
		this.fields.align	= $("f_align");
		this.fields.title	= $("f_title");
		this.fields.title_text	= $("f_text");
		this.fields.caption	= $("f_caption");

		// Setup file listing objects
		this.folderlist = $('folderlist');

		this.frame		= window.frames['fileframe'];
		this.frameurl	= this.frame.location.href;

		// Setup imave listing frame
		this.fileframe = $('fileframe');
		this.fileframe.manager = this;
		this.fileframe.addEvent('load', function(){ FileManager.onloadfileview(); });

		// Setup folder up button
		this.upbutton = $('upbutton');
		this.upbutton.removeEvents('click');
		this.upbutton.addEvent('click', function(){ FileManager.upFolder(); });
	},

	onloadfileview: function()
	{
		// Update the frame url
		this.frameurl = this.frame.location.href;

		var folder = this.getFileFolder();
		for(var i = 0; i < this.folderlist.length; i++)
		{
			if(folder == this.folderlist.options[i].value) {
				this.folderlist.selectedIndex = i;
				break;
			}
		}

		a = this._getUriObject($('uploadForm').getProperty('action'));
		//console.log(a);
		q = $H(this._getQueryObject(a.query));
		q.set('folder', folder);
		var query = [];
		q.each(function(v, k){
			if ($chk(v)) {
				this.push(k+'='+v);
			}
		}, query);
		a.query = query.join('&');
		$('uploadForm').setProperty('action', a.scheme+'://'+a.domain+a.path+'?'+a.query);
	},

	getFileFolder: function()
	{
		var url 	= this.frame.location.search.substring(1);
		var args	= this.parseQuery(url);

		return args['folder'];
	},

	onok: function()
	{
		extra = '';
		// Get the file tag field information
		var url		= this.fields.url.getValue();
		var align	= this.fields.align.getValue();
		var title	= this.fields.title.getValue();
		var title_text	= this.fields.title_text.getValue();
		var caption	= this.fields.caption.getValue();
		if (url != '' && title_text != '') {
			// Set align attribute
			if (align != '') {
				text_align = '<p style="text-align: '+align+';">';
			} else {
				text_align = '<p>';
			}
			// Set align attribute
			if (title != '') {
				extra = extra + 'title="'+title+'" ';
			}
			// Set align attribute
			if (caption != '') {
				extra = extra + 'class="caption" ';
			}

			var tag = text_align+"<a href=\""+url+"\" "+extra+">"+title_text+"</a></p>";
		}
		window.parent.jInsertEditorText(tag, this.editor);
		return false;
	},

	setFolder: function(folder)
	{
		//this.showMessage('Loading');

		for(var i = 0; i < this.folderlist.length; i++)
		{
			if(folder == this.folderlist.options[i].value) {
				this.folderlist.selectedIndex = i;
				break;
			}
		}
		this.frame.location.href='index.php?option=com_media&view=filesList&tmpl=component&folder=' + folder;
	},

	getFolder: function() {
		return this.folderlist.getValue();
	},

	upFolder: function()
	{
		var currentFolder = this.getFolder();
		if(currentFolder.length < 2) {
			return false;
		}

		var folders = currentFolder.split('/');
		var search = '';

		for(var i = 0; i < folders.length - 1; i++) {
			search += folders[i];
			search += '/';
		}

		// remove the trailing slash
		search = search.substring(0, search.length - 1);

		for(var i = 0; i < this.folderlist.length; i++)
		{
			var thisFolder = this.folderlist.options[i].value;

			if(thisFolder == search)
			{
				this.folderlist.selectedIndex = i;
				var newFolder = this.folderlist.options[i].value;
				this.setFolder(newFolder);
				break;
			}
		}
	},

	populateFields: function(file)
	{
		$("f_url").value = file_base_path+file;
	},

	showMessage: function(text)
	{
		var message  = $('message');
		var messages = $('messages');

		if(message.firstChild)
			message.removeChild(message.firstChild);

		message.appendChild(document.createTextNode(text));
		messages.style.display = "block";
	},

	parseQuery: function(query)
	{
		var params = new Object();
		if (!query) {
			return params;
		}
		var pairs = query.split(/[;&]/);
		for ( var i = 0; i < pairs.length; i++ )
		{
			var KeyVal = pairs[i].split('=');
			if ( ! KeyVal || KeyVal.length != 2 ) {
				continue;
			}
			var key = unescape( KeyVal[0] );
			var val = unescape( KeyVal[1] ).replace(/\+ /g, ' ');
			params[key] = val;
	   }
	   return params;
	},

	refreshFrame: function()
	{
		this._setFrameUrl();
	},

	_setFrameUrl: function(url)
	{
		if ($chk(url)) {
			this.frameurl = url;
		}
		this.frame.location.href = this.frameurl;
	},

	_getQueryObject: function(q) {
		var vars = q.split(/[&;]/);
		var rs = {};
		if (vars.length) vars.each(function(val) {
			var keys = val.split('=');
			if (keys.length && keys.length == 2) rs[encodeURIComponent(keys[0])] = encodeURIComponent(keys[1]);
		});
		return rs;
	},

	_getUriObject: function(u){
		var bits = u.match(/^(?:([^:\/?#.]+):)?(?:\/\/)?(([^:\/?#]*)(?::(\d*))?)((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[\?#]|$)))*\/?)?([^?#\/]*))?(?:\?([^#]*))?(?:#(.*))?/);
		return (bits)
			? bits.associate(['uri', 'scheme', 'authority', 'domain', 'port', 'path', 'directory', 'file', 'query', 'fragment'])
			: null;
	}
};

window.addEvent('domready', function(){
	FileManager.initialize();
});
