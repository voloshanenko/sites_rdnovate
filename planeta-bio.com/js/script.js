/**
 * Author: Demchenko Ivan
 * Year: 2012
 * ----------------------------------------------------------------------------
 * Planeta Bio.
 * Application namespace
 */
var DEBUG = false;
var app = (app === undefined) ? {} : app;

app.settings = {
    animationSpeed:333,
    flashMessageInterval:4000,
    modulesPath:'/js/modules/',
    mergedLibs:'/js/libs/libs_merged.js?'+TS,
    jqueryCdn:'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?'+TS,
    jqueryUiCdn:'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js?'+TS,
    jqueryLocal:'/js/libs/jquery.1.7.1.min.js?'+TS,
    jqueryUiLocal:'/js/libs/jquery-ui-1.8.16.min.js?'+TS
};

app.modules = {};

app.tools = {

    isDefined:function (e) {
        return ( (typeof e != "undefined") || (typeof e != null) );
    },

    date: {
        inPast: function(date) {
            return (Date.today().compareTo(Date.parse(date)) == 1);
        },
        inFuture: function(date) {
            return (Date.today().compareTo(Date.parse(date)) == -1);
        },
        isNow: function(date) {
            return ( Date.today().compareTo(Date.parse(date)) == 0 );
        },
        format: function(date, format) {
            if( arguments.length == 1 )
                return Date.parse(date).toString('dd.MM.yyyy');
            else
                return Date.parse(date).toString(format);
        }
    },

    loadScript:function (sURL, onLoad) {
        var oS = document.createElement('script');
        oS.type = 'text/javascript';
        if (onLoad) {
            oS.onreadystatechange = function() {
                var rs = oS.readyState;
                if (rs == 'loaded' || rs == 'complete') {
                    this.onreadystatechange = null;
                    this.onload = null;
                    if (onLoad) {
                        onLoad();
                    }
                }
            };
            oS.onload = function() {
                window.setTimeout(onLoad, 1);
            };
        }
        oS.src = sURL;
        document.getElementsByTagName('head')[0].appendChild(oS);
    },

    loadCss:function (path) {
        var head = document.getElementsByTagName('head')[0];
        var fileref = document.createElement("link");
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", '/css/' + path + '.css');
        head.appendChild(fileref, null);
    },

    loadModule:function (name, ready) {
        app.tools.loadScript(app.settings.modulesPath + name + '.js', ready);
    }
};

app.debug = function (msg) {
    if(DEBUG) console.log(msg);
    return false;
};

// First preLoad function is fired, after that loaded function is fired.
// Using this way I can be sure, that all important things are loaded and then, I can do other important things.

app.preloadCompleted = false;
app.preLoaded = function(after){
    if(!app.preloadCompleted) {
        app.tools.loadScript(app.settings.mergedLibs, function(){
            app.tools.loadModule('ui', function(){
                app.preloadCompleted = true;
			    //window.$ = jQuery;
		        $(".ajax-link").click(function(e){ e.preventDefault(); });
		        checkBrowser();
		        after();
            });
        });
    }
};
var arr = [];
app.loaded = function(func){
	if(typeof func === 'function') {
		arr.push(func);
	}
};
app.preLoaded(function(){
	$(document).ready(function(){
		$.each(arr, function(i, func){
			func();
		})
	});
});
var checkBrowser = function() {
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
	var ieversion=new Number(RegExp.$1)
	if (ieversion<8)
		alert("Предупреждение!\nВы используете устаревшую версию браузера Internet Explorer!\nПо этой причине некоторые страницы сайта могут отображаться не корректно.\nРекомендуем Вам обновить браузер или использовать более совершенные программы, такие как, Google Chrome, Opera или Mozilla Firefox.\nС уважением,\nАдминистрация.")
	}
}