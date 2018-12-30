	</div>
	<br clear="all" />
	<div id="footer">
		<div id="foot-copys">
			<?=file_get_contents(getcwd().'/textblocks/copyrights.php')?>
		</div>
		<div id="foot-counters">

		</div>
	</div>
<?php if(isset($js)) { foreach($js as $file) { ?>
	<script type="text/javascript" src="/js/<?=$file?>.js?<?=mktime()?>"></script>
<?php } } ?>
	<div id="ask-us-window">
		<div style="text-align: right"><a href="" onclick="close_ask_window();return false;">Закрыть</a></div>
		<div id="ask-box">
		<h2>Задайте вопрос специалисту</h2>
		<form action="/ask" method="post" id="ask-from">
			<table width="100%" border="0" cellspacing="5">
			<input type="hidden" name="subject" value="Вопрос специалисту" />
			<?php if( $this->session->userdata('id') ) { ?>
				<input type="hidden" name="from_name" value="<?=$this->session->userdata('real_name')?>" />
				<input type="hidden" name="from_email" value="<?=$this->session->userdata('email')?>" />
				<tr>
					<td>
						Ваше имя: 
						<strong><?=$this->session->userdata('real_name')?></strong><br />
					</td>
				</tr>
				<tr>
					<td>
						Контактный e-mail: 
						<strong><?=$this->session->userdata('email')?></strong><br />
					</td>
				</tr>
			<?php } else { ?>
				<tr>
					<td>
						Ваше имя:<br />
						<input type="text" name="from_name" id="from_name" />
					</td>
				</tr>
				<tr>
					<td>
						Контактный e-mail:<br />
						<input type="text" name="from_email" id="from_email" />
					</td>
				</tr>
			<?php } ?>
			<tr>
				<td>
					Ваш вопрос:
					<textarea name="message" id="message" style="width: 98%; height: 80px"></textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="Отправить" /></td>
			</tr>
			</table>
		</form>
		</div>
	</div>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter12523132 = new Ya.Metrika({id:12523132, enableAll: true, webvisor:true});
        } catch(e) { }
    });
   
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
 
    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/12523132" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26040746-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>
</body>
</html>