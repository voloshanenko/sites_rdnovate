<?php
  $page = $this->uri->segment(3);
  $salesman = $this->session->userdata('r') == 'salesman';
  $allowedit = !($page == 'user' && $salesman) || ($page != 'goods' && $salesman);
?>
<div class="container">
  <?php $this->load->helper('tools'); ?>
  <h1>{page_h1}</h1>
  <div style="text-align: right"><a href="/" target="_blank">Перейти на сайт</a></div>
  <div><strong>Внимание!</strong> Поля, отмеченные <span style="color:#40E">синим</span> цветом, обязательны для заполения.</div>
  <form method="post" action="" name="add_edit_form" enctype="multipart/form-data">
    <input type="hidden" name="action" value="" />
    <table class="item_edit">
    <tr>
      <td colspan="2">
      <?php if($allowedit) { ?>
        <button class="green" onclick="document.forms['add_edit_form'].elements['action'].value='save'">Сохранить</button>
        <button class="green" onclick="document.forms['add_edit_form'].elements['action'].value='save_new'">Сохранить и Создать</button>
      <?php } ?>
        <button onclick="document.forms['add_edit_form'].elements['action'].value='cancel'">Отмена</button>
      <?php if($allowedit && isset($del_button_url)) { ?>
        <a class="del_link backtolist tools-button red" href="<?=$del_button_url?>">Удалить</a>
      <?php } ?>
      </td>
    </tr>
    <?php foreach ($form as $k=>$field) { ?>
      <tr>
      <?php make_form_element($k, $field); ?>
      </tr>
    <?php } ?>
    <tr>
            <td colspan="2">
            <?php if($allowedit) { ?>
                <button class="green" onclick="document.forms['add_edit_form'].elements['action'].value='save'">Сохранить</button>
                <button class="green" onclick="document.forms['add_edit_form'].elements['action'].value='save_new'">Сохранить и Создать</button>
            <?php } ?>
                <button onclick="document.forms['add_edit_form'].elements['action'].value='cancel'">Отмена</button>
            <?php if($allowedit && isset($del_button_url)) { ?>
                <a class="del_link backtolist tools-button red" href="<?=$del_button_url?>">Удалить</a>
            <?php } ?>
            </td>
        </tr>
    </table>
  </form>
</div>
