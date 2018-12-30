<div id="content">
	<h1>{page_h1}</h1>
	<p>Спасибо! Ваш заказ принят и отправлен на Ваш контактный e-mail.</p>
	<p>
		<ul>
			<li><a href="/">Перейти на главную</a></li>
			<li><a href="/user/cabinet">Перейти в свой кабинет</a></li>
		</ul>
	</p>
	<h3>Помогите нам стать лучше!</h3>
	<div id="ask-box">
	<p>Если у Вас есть какие-либо замечания по работе интернет-магазина или просто пожелания, пришлите их пожалуйста!</p>
	<form action="/ask" method="post" id="ask-from">
		<input type="hidden" id="subject" name="subject" value="Замечания и пожелания" />
		<input type="hidden" id="from_name" name="from_name" value="<?=$this->session->userdata('real_name')?>" />
		<input type="hidden" id="from_email" name="from_email" value="<?=$this->session->userdata('email')?>" />
		<table width="100%" border="0" cellspacing="5">
		<tr>
			<td>
				Ваши замечания, предложения или пожелания:
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