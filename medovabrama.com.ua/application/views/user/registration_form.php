<?php
$this->load->helper('captcha');
$this->load->helper('string');
$vals = array(
    'img_path' => './captcha/',
    'img_url' => base_url().'/captcha/',
    'img_width' => '150',
	'word' => random_string('numeric', 8)
    );

$cap = create_captcha($vals);

$data = array(
    'captcha_time' => $cap['time'],
    'ip_address' => $this->input->ip_address(),
    'word' => $cap['word']
    );

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);
?>
	<h1>Регистрация</h1>
	<?php if(isset($msg)) { echo "<p style=\"color: red\"><big>$msg</big></p>"; } ?>
	<form id="registration-form" action="/user/registration" method="post" id="registration-form">
		<table>
			<tr>
				<td class="user-info-caption">Логин:</td>
				<td><input type="text" name="login" value="<?php echo (isset($login)) ? $login : '' ?>" /><br /><?=form_error('login')?></td>
				<td><small>Логин может состоянить только из латинских символов, цифр, знака подчеркивания и точки и иметь длину от 4 до 15 символов</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Пароль:</td>
				<td><input type="password" name="password" value="<?php echo (isset($password)) ? $password : '' ?>" /><br /><?=form_error('password')?></td>
				<td><small>Парль может состоянить только из латинских символов, цифр, знака подчеркивания и точки и иметь длину от 4 до 15 символов</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">E-mail:</td>
				<td><input type="text" name="email" value="<?php echo (isset($email)) ? $email : '' ?>" /><br /><?=form_error('email')?></td>
				<td><small>E-mail требуется только для того, что бы с Вами смогли связаться в дальнейшем</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Ф. И. О.:</td>
				<td><input type="text" name="name" value="<?php echo (isset($name)) ? $name : '' ?>" /><br /><?=form_error('name')?></td>
				<td><small>Укажите, пожалуйста, Ваше имя, фамилию и отчество полностью</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Контактный телефон:</td>
				<td><input type="text" name="phone" value="<?php echo (isset($phone)) ? $phone : '' ?>" /><br /><?=form_error('phone')?></td>
				<td><small>Укажите, пожалуйста, контактный телефон для уточнения нюансов по заказу</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Куда и чем доставлять:</td>
				<td><textarea name="delivery_addr" cols="60" rows="3"><?php echo (isset($delivery_addr)) ? $delivery_addr : '' ?></textarea></td>
				<td><small>Требуется в случае, если Вы будете заказывать доставку товара</small></td>
			</tr>
			<tr>
				<td>Введите, пожалуйста, изображенные числа.</td>
				<td><?php echo $cap['image']; ?><input type="text" name="captcha" value="" style="width: 65px" /></td>
				<td><?php if(isset($captcha_msg)) { echo "<p style=\"color: red\"><big>$captcha_msg</big></p>"; } ?></td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" value="Регистрация" /> | <a id="cancel-registration" href="">Отмена</a>
				</td>
			</tr>
		</table>
	</form>
