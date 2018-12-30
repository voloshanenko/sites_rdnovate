<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$count = count($select);

?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/modules/mod_maasobi2search-sort/style.css" type="text/css" />
<script src="<?php echo $this->baseurl ?>/modules/mod_maasobi2search-sort/jquery.js" language="javascript" type="text/javascript"></script>
<script language="javascript">
	jQuery.noConflict();
	jr_expandImg_url = "' . JB_URLIMAGESPATH . '";
	
	jQuery(function($){	
		$('#maamaasobi2eSobi2Sort .search_more').click(function(){
			$("body").find(".free_search").toggle();
		});
	});	
</script>

<div id="maamaasobi2eSobi2Sort">
<form name="sobiSearchFormContainer" method="get" action="index.php" accept-charset="utf-8" id="sobiSearchFormContainer">
<input type="hidden" value="com_sobi2" name="option"/>
<input type="hidden" value="axSearch" name="sobi2Task"/>
<input type="hidden"  name="sobi2Search" id="sobi2Search" value=""  />
<input type="hidden"  name="searchphrase" id="searchphraseall" value="all"  />
<input type="hidden"  name="Itemid" value="<?php echo $_GET["Itemid"] ?>"  />

<table class="maamaasobi2eSearchForm" width="100%">
			<?php if( $params->get('search') == "1") { ?>
			<tr>
				<td width="170">
				<span class="SearchLabel">Поик по каталогу</span>
				</td>		
				<td id="maasobi2eSearchBox">		
						<input name="sobi2Search" id="sobi2Search" class="inputbox" value="<?php echo $String; ?>" onclick="if (this.value == '<?php echo _SOBI2_SEARCH_INPUTBOX; ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php echo _SOBI2_SEARCH_INPUTBOX; ?>';"/>
				
					<input type="submit" value="<?php echo $params->get('search_button') ?>" class="button" onkeydown="$('SobiSearchPage').value = 0" onmousedown="$('SobiSearchPage').value = 0" name="search" id="sobiSearchSubmitBt"/>
				</td>
			</tr>
			<tr>
				<td> </td>
				<td id="maasobi2eSearchPhrases">
				<?php $phrase = sobi2Config::request($_REQUEST, "searchphrase", $phrase); ?>
				<?php if( $params->get('searchphrase_any', 1) == "1") { ?>
					<input type="radio" <?php if($phrase == 'any' || $phrase != 'all' || $phrase != 'exact' ) echo "checked=\"checked\"" ?> name="searchphrase" id="searchphraseany" value="any"   />
					<label for="searchphraseany"><?php echo _SOBI2_SEARCH_ANY ?></label>
				<?php } ?>
				<?php if( $params->get('searchphrase_all', 1) == "1") { ?>
					<input type="radio" <?php if($phrase == 'all') echo "checked=\"checked\"" ?> name="searchphrase" id="searchphraseall" value="all"  />
					<label for="searchphraseall"><?php echo _SOBI2_SEARCH_ALL ?></label>
				<?php } ?>
				<?php if( $params->get('searchphrase_exact', 1) == "1") { ?>
					<input type="radio" <?php if($phrase == 'exact') echo "checked=\"checked\"" ?> name="searchphrase" id="searchphraseexact" value="exact"  />
					<label for="searchphraseexact"><?php echo _SOBI2_SEARCH_EXACT ?></label>
				<?php } ?>
				</td>
			</tr>
			<tr><td colspan="2"><span class="search_more"><span>Расширенные опции поиска</span></span></td></tr>
			<?php } ?>
			<?php if( $params->get('search_for_cat', 1) == "1") { ?>
			<tr class="free_search">
				<td style="vertical-align:top;"><?php echo _SOBI2_SEARCH_TOOGLE_CATS; ?></td>
				<td colspan='2'>
				
					<div id="sobiSearchFormCatsSelection" <?php if($config->ajaxSearchUseSlider) { ?> style="height:<?php echo $config->ajaxSearchCatsContHeight;?>px;" <?php } ?>>
		
						<?php
							$catid = $_GET["catid"];
							//$cid = sobi2Config::request($_REQUEST, "sobiCid", -9);
							$cid = "-9";
							$selectedCats = modSobi2SortHelper::searchSobi($catid , $cid);
							echo modSobi2SortHelper::axSearchCatChooser( $selectedCats, $cid );
							
							
						?>
					</div>
				</td>
			</tr>
<?php 
}
if( $params->get('sort') == "1") { 
	for ($i = 0; $i < $count; $i++) {
		echo "<tr class='free_search'>";
		foreach ($selectName[$i] AS $rowName) {
			echo "<td><label>".$rowName->langValue."</label></td>";
		 ?>
	<td><select name="<?php echo $rowName->langKey ?>">
	<?php } ?>
	<option value=""> </option>
	<?php
	foreach ($select[$i] AS $row) {
				echo "<option value='".$row->langKey."'>".$row->langValue."</option>";
				//echo "<option value='".$row->langValue."'>".$row->langValue."</option>";
			} ?>
	</select></td></tr>
	<?php 
	}		
}
if( $params->get('search') == "0") { ?>
			<tr>
				<td id="SearchButton" colspan="2">		
					<input type="submit" value="<?php echo $params->get('search_button') ?>" class="button" onkeydown="$('SobiSearchPage').value = 0" onmousedown="$('SobiSearchPage').value = 0" name="search" id="sobiSearchSubmitBt"/>
				</td>
			</tr>
<?php } ?>			
</table>
<div class="clr"> </div>
<input type="hidden" id="SobiSearchPage" name="SobiSearchPage" value="<?php echo $page;?>"/>
</form>
</div>

<script type="text/javascript">
		 /* <![CDATA[ */
			var Sobi2FieldNames = new Array();
			
			function sobiSearchRes(page) {
	 			$('SobiSearchPage').value = page;
				$('sobiSearchSubmitBt').click();
			}
		/* ]]> */
		</script>


			