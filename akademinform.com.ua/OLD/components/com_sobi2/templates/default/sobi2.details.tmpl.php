<?php defined( '_SOBI2_' ) || exit("Restricted access"); ?>
<?php HTML_SOBI::renewal( $config,$mySobi ); ?>
<h1><?php echo $mySobi->title; ?></h1>
<div class="item-img"><?php echo $img; ?></div>
<?php echo HTML_SOBI::customFieldsData( $fieldsFormatted );?>
<!--<table class="sobi2DetailsFooter" width="100%">
  <tr>
    <td>
    <?php HTML_SOBI::addedDate($config,$mySobi); ?>
      &nbsp;&nbsp;
    <?php HTML_SOBI::showHits($config,$mySobi);?>
    </td>
    <td><?php HTML_SOBI::editButtons($config,$mySobi); ?></td>
  </tr>
</table>-->