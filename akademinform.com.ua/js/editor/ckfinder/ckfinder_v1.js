﻿/*
 Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */

(function () {
    window.CKFinder = function (a, b, c, d) {
        var e = this;
        e.BasePath = a || CKFinder.DEFAULT_BASEPATH;
        e.Width = b || '100%';
        e.Height = c || 400;
        e.SelectFunction = d || null;
        e.SelectFunctionData = null;
        e.SelectThumbnailFunction = d || null;
        e.SelectThumbnailFunctionData = null;
        e.DisableThumbnailSelection = false;
        e.ClassName = 'CKFinderFrame';
        e.StartupPath = null;
        e.StartupFolderExpanded = false;
        e.RememberLastFolder = true;
        e.ResourceType = null;
        e.Id = null;
        e.Skin = null;
        e.ConnectorLanguage = 'php';
    };
    CKFinder.DEFAULT_BASEPATH = '/ckfinder/';
    CKFinder.prototype = {Create:function () {
        document.write(this.CreateHtml());
    }, CreateHtml:function () {
        var c = this;
        var a = c.ClassName;
        if (a && a.length > 0)a = ' class="' + a + '"';
        var b = c.Id;
        if (b && b.length > 0)b = ' id="' + b + '"';
        return '<iframe src="' + c._BuildUrl() + '" width="' + c.Width + '" ' + 'height="' + c.Height + '"' + a + b + ' frameborder="0" scrolling="no"></iframe>';
    }, Popup:function (a, b) {
        a = a || '80%';
        b = b || '70%';
        if (typeof a == 'string' && a.length > 1 && a.substr(a.length - 1, 1) == '%')a = parseInt(window.screen.width * parseInt(a, 10) / 100, 10);
        if (typeof b == 'string' && b.length > 1 && b.substr(b.length - 1, 1) == '%')b = parseInt(window.screen.height * parseInt(b, 10) / 100, 10);
        if (a < 200)a = 200;
        if (b < 200)b = 200;
        var c = parseInt((window.screen.height - b) / 2, 10), d = parseInt((window.screen.width - a) / 2, 10), e = 'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes,resizable=yes,width=' + a + ',height=' + b + ',top=' + c + ',left=' + d, f = window.open('', 'CKFinderPopup', e, true);
        if (!f)return false;
        var g = this._BuildUrl().replace(/&amp;/g, '&');
        try {
            f.moveTo(d, c);
            f.resizeTo(a, b);
            f.focus();
            f.location.href = g;
        } catch (h) {
            f = window.open(g, 'CKFinderPopup', e, true);
        }
        return true;
    }, _BuildUrl:function (a) {
        var d = this;
        a = a || d.BasePath;
        var b = '';
        if (!a || a.length === 0)a = CKFinder.DEFAULT_BASEPATH;
        if (a.substr(a.length - 1, 1) != '/')a += '/';
        a += 'ckfinder.html';
        var c;
        if (d.SelectFunction) {
            c = d.SelectFunction;
            if (typeof c == 'function')c = c.toString().match(/function ([^(]+)/)[1];
            b += '?action=js&amp;func=' + c;
        }
        if (d.Skin) {
            b += b ? '&amp;' : '?';
            b += 'skin=' + encodeURIComponent(d.Skin);
        }
        if (d.SelectFunctionData) {
            b += b ? '&amp;' : '?';
            b += 'data=' + encodeURIComponent(d.SelectFunctionData);
        }
        if (d.ResourceType) {
            b += b ? '&amp;' : '?';
            b += 'type=' + encodeURIComponent(d.ResourceType);
        }
        if (d.DisableThumbnailSelection) {
            b += b ? '&amp;' : '?';
            b += 'dts=1';
        } else if (d.SelectThumbnailFunction || d.SelectFunction) {
            c = d.SelectThumbnailFunction || d.SelectFunction;
            if (typeof c == 'function')c = c.toString().match(/function ([^(]+)/)[1];
            b += b ? '&amp;' : '?';
            b += 'thumbFunc=' + c;
            if (d.SelectThumbnailFunctionData)b += '&amp;tdata=' + encodeURIComponent(d.SelectThumbnailFunctionData);
            else if (!d.SelectThumbnailFunction && d.SelectFunctionData)b += '&amp;tdata=' + encodeURIComponent(d.SelectFunctionData);
        }
        if (d.StartupPath) {
            b += b ? '&amp;' : '?';
            b += 'start=' + encodeURIComponent(d.StartupPath + (d.StartupFolderExpanded ? ':1' : ':0'));
        }
        if (!d.RememberLastFolder) {
            b += b ? '&amp;' : '?';
            b += 'rlf=0';
        }
        if (d.Id) {
            b += b ? '&amp;' : '?';
            b += 'id=' + encodeURIComponent(d.Id);
        }
        return a + b;
    }};
    CKFinder.Create = function (a, b, c, d) {
        var e;
        if (a !== null && typeof a == 'object') {
            e = new CKFinder();
            for (var f in a)e[f] = a[f];
        } else e = new CKFinder(a, b, c, d);
        e.Create();
    };
    CKFinder.Popup = function (a, b, c, d) {
        var e;
        if (a !== null && typeof a == 'object') {
            e = new CKFinder();
            for (var f in a)e[f] = a[f];
        } else e = new CKFinder(a, b, c, d);
        e.Popup(b, c);
    };
    CKFinder.SetupFCKeditor = function (a, b, c, d) {
        var e;
        if (b !== null && typeof b == 'object') {
            e = new CKFinder();
            for (var f in b) {
                e[f] = b[f];
                if (f == 'Width') {
                    var g = e[f] || 800;
                    if (typeof g == 'string' && g.length > 1 && g.substr(g.length - 1, 1) == '%')g = parseInt(window.screen.width * parseInt(g, 10) / 100, 10);
                    a.Config.LinkBrowserWindowWidth = g;
                    a.Config.ImageBrowserWindowWidth = g;
                    a.Config.FlashBrowserWindowWidth = g;
                } else if (f == 'Height') {
                    var h = e[f] || 600;
                    if (typeof h == 'string' && h.length > 1 && h.substr(h.length - 1, 1) == '%')h = parseInt(window.screen.height * parseInt(h, 10) / 100, 10);
                    a.Config.LinkBrowserWindowHeight = h;
                    a.Config.ImageBrowserWindowHeight = h;
                    a.Config.FlashBrowserWindowHeight = h;
                }
            }
        } else e = new CKFinder(b);
        var i = e.BasePath;
        if (i.substr(0, 1) != '/' && i.indexOf('://') == -1)i = document.location.pathname.substring(0, document.location.pathname.lastIndexOf('/') + 1) + i;
        i = e._BuildUrl(i);
        var j = i.indexOf('?') !== -1 ? '&amp;' : '?';
        a.Config.LinkBrowserURL = i;
        a.Config.ImageBrowserURL = i + j + 'type=' + (c || 'Images');
        a.Config.FlashBrowserURL = i + j + 'type=' + (d || 'Flash');
        var k = i.substring(0, 1 + i.lastIndexOf('/'));
        a.Config.LinkUploadURL = k + 'core/connector/' + CKFinder.config.connectorLanguage + '/connector.' + CKFinder.config.connectorLanguage + '?command=QuickUpload&type=Files';
        a.Config.ImageUploadURL = k + 'core/connector/' + CKFinder.config.connectorLanguage + '/connector.' + CKFinder.config.connectorLanguage + '?command=QuickUpload&type=' + (c || 'Images');
        a.Config.FlashUploadURL = k + 'core/connector/' + CKFinder.config.connectorLanguage + '/connector.' + CKFinder.config.connectorLanguage + '?command=QuickUpload&type=' + (d || 'Flash');
    };
    CKFinder.SetupCKEditor = function (a, b, c, d) {
        if (a === null) {
            for (var e in CKEDITOR.instances)CKFinder.SetupCKEditor(CKEDITOR.instances[e], b, c, d);
            CKEDITOR.on('instanceCreated', function (m) {
                CKFinder.SetupCKEditor(m.editor, b, c, d);
            });
            return;
        }
        var f;
        if (b !== null && typeof b == 'object') {
            f = new CKFinder();
            for (var g in b) {
                f[g] = b[g];
                if (g == 'Width') {
                    var h = f[g] || 800;
                    if (typeof h == 'string' && h.length > 1 && h.substr(h.length - 1, 1) == '%')h = parseInt(window.screen.width * parseInt(h, 10) / 100, 10);
                    a.config.filebrowserWindowWidth = h;
                } else if (g == 'Height') {
                    var i = f[g] || 600;
                    if (typeof i == 'string' && i.length > 1 && i.substr(i.length - 1, 1) == '%')i = parseInt(window.screen.height * parseInt(i, 10) / 100, 10);
                    a.config.filebrowserWindowHeight = h;
                }
            }
        } else f = new CKFinder(b);
        var j = f.BasePath;
        if (j.substr(0, 1) != '/' && j.indexOf('://') == -1)j = document.location.pathname.substring(0, document.location.pathname.lastIndexOf('/') + 1) + j;
        j = f._BuildUrl(j);
        var k = j.indexOf('?') !== -1 ? '&amp;' : '?';
        a.config.filebrowserBrowseUrl = j;
        a.config.filebrowserImageBrowseUrl = j + k + 'type=' + (c || 'Images');
        a.config.filebrowserFlashBrowseUrl = j + k + 'type=' + (d || 'Flash');
        var l = j.substring(0, 1 + j.lastIndexOf('/'));
        a.config.filebrowserUploadUrl = l + 'core/connector/' + CKFinder.config.connectorLanguage + '/connector.' + CKFinder.config.connectorLanguage + '?command=QuickUpload&type=Files';
        a.config.filebrowserImageUploadUrl = l + 'core/connector/' + CKFinder.config.connectorLanguage + '/connector.' + CKFinder.config.connectorLanguage + '?command=QuickUpload&type=' + (c || 'Images');
        a.config.filebrowserFlashUploadUrl = l + 'core/connector/' + CKFinder.config.connectorLanguage + '/connector.' + CKFinder.config.connectorLanguage + '?command=QuickUpload&type=' + (d || 'Flash');
    };
})();
