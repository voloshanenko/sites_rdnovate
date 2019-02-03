<?php $this->load->helper('tools'); ?>
<div id="content">
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/utabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<h2>Специальные предложения</h2>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Обратите внимание</a></li>
			<li><a href="#tabs-3">Новинки</a></li>
			<li><a href="#tabs-2">Товары со скидкой</a></li>
			<li><a href="#tabs-4">Распродажа</a></li>
			<li><a href="#tabs-5">Маркетинг</a></li>
		</ul>
		<div id="tabs-1">
			<?php echo $recommended; ?>
		</div>
		<div id="tabs-3">
			<?php echo $new; ?>
		</div>
		<div id="tabs-2">
			<?php echo $discounted; ?>
		</div>
		<div id="tabs-4">
			<?php echo $sale; ?>
		</div>
		<div id="tabs-5">
			<p>Нам важно знать Ваше мнение по поводу данных препаратов. Примите участие в маркетинговых исследованиях.</p>
			<br clear="all" />
			<?php echo $marteking; ?>
		</div>
	</div>
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/btabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>

	<h2>Актуальные статьи</h2>
	<?php foreach ($content['articles'] as $art) { ?>
		<h3><a href="/page/<?= $art['url'] ?>"><?= $art['title'] ?></a></h3>
		<?= $art['intro'] ?>
	<?php } ?>

	<h2>Актуальные Отзывы и Комментарии</h2>
	<?= $feedbacks ?>

	<?php $cont = file_get_contents(getcwd().'/textblocks/ads_bottom.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	<div>
		<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="link" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed"></div>
	</div>
</div>