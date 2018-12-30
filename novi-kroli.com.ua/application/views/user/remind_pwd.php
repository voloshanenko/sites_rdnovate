<div id="content">
	<h1>{page_h1}</h1>
	<?php if(!isset($success)) { ?>
    	<p>Для восстановления пароля, впишите в поле свой E-mail, затем на указанный ящик придет новый пароль.</p>
        <?php if(isset($wrongEmail)) { ?>
            <div class="info-msg">
                <p><strong>Пользователь с таким адресом не найден.</strong></p>
                Возможно вы ввели не верный адрес. Попробуйте, пожалуйста, снова.
            </div>
        <?php } ?>
    	<form action="/user/remind" method="post">
    		<input type="text" name="email" size="40" value="<?=isset($useremail)?$useremail:''?>" />
    		<input type="submit" value="Отправить" />
    	</form>
	<?php } ?>
	<?php if(isset($success)) { ?>
	   <div class="info-msg">
            <p><strong>Пароль восстановлен!</strong></p>
            <p>Новый пароль выслан на указанный Вами e-mail: <?=isset($useremail)?$useremail:''?>.<br />
            Теперь, Вы можете воспользоваться формой авторизации справа, что бы зайти под своим аккаунтом.</p>
            <strong>Приятных Вам покупок!</strong>
        </div>
    <?php } ?>  
</div>