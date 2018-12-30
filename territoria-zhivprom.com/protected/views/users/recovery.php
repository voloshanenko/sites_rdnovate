<?php
$this->breadcrumbs=array(
	'Восстановление пароля',
);
?>

<h1>Восстановление пароля</h1>
<p>
	Укажите свой e-mail. На него будет выслан новый пароль для учетной записи,
	которая закреплена за указанным e-mail адресом.
</p>
<form method="post">
	<div class="form">
		<div class="row">
			<?=CHtml::label('Ваш e-mail', 'email')?>
			<?=CHtml::textField('email', isset($email)?$email:'')?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Отправить пароль'); ?>
		</div>
	</div>
</form>
