		<div id="header">
			<div id="logo"></div>
			<div id="search-box">
				<form action="/search/byword" method="POST">
					<input type="text" name="searchword" id="search-word"
					  placeholder="Поиск по коду, названию или описанию..."
					  value="<?php echo (isset($searchword))?$searchword:''; ?>" />
					<input type="submit" id="search-button" value="Найти" />
				</form>
			</div>
			<div id="alphabet">
				<span>Поиск по первой букве</span>
				<a href="/search/byletter/а">а</a>
				<a href="/search/byletter/б">б</a>
				<a href="/search/byletter/в">в</a>
				<a href="/search/byletter/г">г</a>
				<a href="/search/byletter/д">д</a>
				<a href="/search/byletter/е">е</a>
				<a href="/search/byletter/ж">ж</a>
				<a href="/search/byletter/з">з</a>
				<a href="/search/byletter/и">и</a>
				<a href="/search/byletter/к">к</a>
				<a href="/search/byletter/л">л</a>
				<a href="/search/byletter/м">м</a>
				<a href="/search/byletter/н">н</a>
				<a href="/search/byletter/о">о</a>
				<a href="/search/byletter/п">п</a>
				<a href="/search/byletter/р">р</a>
				<a href="/search/byletter/с">с</a>
				<a href="/search/byletter/т">т</a>
				<a href="/search/byletter/у">у</a>
				<a href="/search/byletter/ф">ф</a>
				<a href="/search/byletter/х">х</a>
				<a href="/search/byletter/ц">ц</a>
				<a href="/search/byletter/ч">ч</a>
				<a href="/search/byletter/ш">ш</a>
				<a href="/search/byletter/щ">щ</a>
				<a href="/search/byletter/э">э</a>
				<a href="/search/byletter/ю">ю</a>
				<a href="/search/byletter/я">я</a>
			</div>
			<?php echo $mainmenu; ?>
		</div>