<?php
$this->load->config('site'); 
$allow_comments = ($this->config->item('allow_comments') == 1) ? true : $this->session->userdata('id');
?>
<div id="content">
	<?php $cont = file_get_contents(getcwd().'/textblocks/utabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<h1 id="article-header"><?php echo $content['title']; ?></h1>
	<?php echo htmlspecialchars_decode($content['intro']); ?>
	<?php echo htmlspecialchars_decode($content['fulltext']); ?>
	
	<!-- Tags -->
	
	<?php if($content['tags']) { ?>
		<div class="page-tags">
			<?php $ts = explode(',', $content['tags']); foreach($ts as $t) { ?>
					<a class="items-tag" href="/pages/bytag/<?=$t?>"><?=$t?></a>
			<?php } ?>
		</div>
	<?php } ?>
	<div>
		<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="link" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed"></div>
	</div>
	<!-- Comments -->
	<?php if($content['need_comments'] == '1') { ?>	
		<h3>Отзывы и комментарии</h3>
			<?php if( $allow_comments ) { ?>
					<form action="/page/leavecomment" id="goods-сomments-form">
						<input type="hidden" name="user_id" value="<?=$this->session->userdata('id') ? $this->session->userdata('id') : ''?>" />
						<input type="hidden" name="page_url" value="<?=$content['url']?>" />
						<p>
							<?php if($this->session->userdata('real_name')) { ?>
								Вы: <?=$this->session->userdata('real_name')?>
							<?php } else { ?>
								<table width="100%" border="0">
									<tr>
										<td width="50%">Ваше Ф. И. О.: <br /><input type="text" style="width: 280px" name="author_name" maxlength="60" /></td>
										<td>Ваш e-mail: <br /><input type="text" style="width: 280px" name="author_email" maxlength="100" /></td>
									</tr>
									<tr>
										<td colspan="2">Пару слов о себе (например, место жительства, возраст, род занятий или профессия, возможно другая интересная для читателей информация): <br /><input type="text" style="width: 563px" name="author_about" maxlength="100" /></td>
									</tr>
								</table>
							<?php } ?>
							<br /><textarea name="text" style="width: 98%; height: 70px"></textarea><br />
							<input type="submit" value="Отправить" />
						</p>
					</form>
			<?php } else {?>
				<p>Извините, но комментарии могут оставлять только авторизированные пользователи.</p>	
			<?php } ?>
				<hr />
				<?php if( !empty($feedbacks) ) { ?>
					<?php foreach($feedbacks as $f) { ?>
						<div class="feedback">
							<div class="feedback-sign">
								Отзыв от:
								<?php
								if($f['user_name']) { 
									echo $f['user_name'].'<br />('.$f['user_line'].', '.$f['user_from'].')'; 
								} else {
									echo $f['author_name'];
									if($f['author_about']) {
										echo "<br />($f[author_about])";
									} 
								}
								?>
							</div>
							<em><?=$f['text']?></em><br />
						</div>
					<?php } ?>
				<?php } else { ?>
					<p>Отзывов о препарате пока нет.</p>
				<?php } ?>
	<?php } ?>
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/btabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/ads_bottom.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?> 
</div> 