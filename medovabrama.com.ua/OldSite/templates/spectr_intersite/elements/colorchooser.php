<?php
defined('_JEXEC') or die();
define('TEMPLATE', 'spectr_intersite');

class JElementColorChooser extends JElement {
	

	function fetchElement($name, $value, &$node, $control_name)
	{
		global $stylesList;
		$output = '';
		$document 	=& JFactory::getDocument();
		
		if (!defined('MOORAINBOW')) {
			
			$document->addStyleSheet('../templates/'.TEMPLATE.'/moorainbow/mooRainbow.css');
			$document->addScript('../templates/'.TEMPLATE.'/moorainbow/mooRainbow.js');
			$document->addStyleSheet('../templates/'.TEMPLATE.'/admin/preview/preview.css');
			
			$scriptconfig  = $this->populateStyles($stylesList);
			$scriptconfig .= $this->rainbowInit();
			
			$document->addScriptDeclaration($scriptconfig);
			
			define('MOORAINBOW',1);
		}
	
		$scriptconfig = $this->newRainbow($name);
		
		$document->addScriptDeclaration($scriptconfig);

		

		$output .= "<input class=\"picker-input\" id=\"".$control_name.$name."\" name=\"".$control_name."[".$name."]\" type=\"text\" size=\"7\" maxlength=\"7\" value=\"".$value."\" />";
		$output .= "<div class=\"picker\" id=\"myRainbow_".$name."_input\"><div class=\"overlay\"></div></div>\n";
		
		return $output;
	}
	
	function newRainbow($name)
	{
		return "window.addEvent('domready', function() {		
			var input = $('params".$name."');
			var r_".$name." = new MooRainbow('myRainbow_".$name."_input', {
				id: 'myRainbow_".$name."',
				startColor: $('params".$name."').getValue().hexToRgb(true),
				imgPath: '../templates/".TEMPLATE."/moorainbow/images/',
				onChange: function(color) {
					input.getNext().getFirst().setStyle('background-color', color.hex);
					input.value = color.hex;
					
					if (this.visible) this.okButton.focus();
				}
			});
			r_".$name.".okButton.setStyle('outline', 'none');
			$('myRainbow_".$name."_input').addEvent('click', function() {
				r_".$name.".okButton.focus();
			});
			input.addEvent('keyup', function(e) {
				e = new Event(e);
				if ((this.value.length == 4 || this.value.length == 7) && this.value[0] == '#') {
					var rgb = new Color(this.value);
					var hex = this.value;
					var hsb = rgb.rgbToHsb();
					var color = {
						'hex': hex,
						'rgb': rgb,
						'hsb': hsb
					}
					r_".$name.".fireEvent('onChange', color);
					r_".$name.".manualSet(color.rgb);
				};
			});
			input.getNext().getFirst().setStyle('background-color', r_".$name.".sets.hex);
			rainbowLoad('myRainbow_".$name."');
		});\n";
	}
	
	function populateStyles($list)
	{	
		return '';
	}
	
	function rainbowInit()
	{
		return "var rainbowLoad = function(name, hex) {				
				if (hex) {
					$(name.replace('params', '')+'_input').getPrevious().value = hex;
					$(name.replace('params', '')+'_input').getFirst().setStyle('background-color', hex);
				}
			};
			
						/* START_DEBUG ONLY */
			var debug_only = function() {
				var td = new Element('td', {'id': 'toolbar-colorstyle', 'class': 'button'}).inject('toolbar-preview', 'before');
				var a = new Element('a', {'class': 'toolbar', 'href': '#'}).inject(td).setText('Custom style');
				new Element('span', {'class': 'icon-32-colorstyle', 'title': 'Output custom style'}).inject(a, 'top');
				
				var tr = new Element('tr').inject($('paramsprimaryColor').getParent().getParent(), 'after');
				var td1 = new Element('td', {'class': 'paramlist_key', 'styles': 'width: 40%;'}).inject(tr);
				var span = new Element('span', {'class': 'editlinktip'}).inject(td1).setHTML('Custom style output');
				
				var td2 = new Element('td', {'class': 'paramlist_value'}).inject(tr);
				var tarea = new Element('textarea', {'styles': 'width: 100%; height: 100px'}).inject(td2);
				
				var scroll = new Fx.Scroll(window, {offset: {x: false, y: -5}});
				a.addEvent('click', function(e) {
					new Event(e).stop();
					var arr = [];

				});
			};
			
			/* END_DEBUG ONLY */

			
			window.addEvent('domready', function() {
				
			
			});
		";
	}
}

?>