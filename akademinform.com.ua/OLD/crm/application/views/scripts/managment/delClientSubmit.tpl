<div style="padding:0px 40px 0px 40px;">
<b>{t}Менеджеры{/t}</b><br>

{if isset($error)}
{if isset($error.username)}
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;">{$error.username}</span><br>
{/if}

{if isset($error.nickname)}
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;">{$error.nickname}</span><br>
{/if}

{if isset($error.password)}
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;">{$error.password}</span><br>
{/if}

{if isset($error.email)}
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;">{$error.email}</span><br>
{/if}

{/if}

<div style="float:left;margin-top:10px;">
{include file="managment/managers.tpl"}

{include file="managment/leftmenu.tpl"}
</div>


<div style="float:left;margin-left:40px;margin-top:5px;">

{foreach from=$errors item=error}
{$error}<br>
{/foreach}
{if sizeof($errors)>0}<br>{/if}

<div class="managerControl">

<div style="padding:11px">
<b>{t}Удаление клиентов{/t}</b><br><br>

<form method="POST" action="{$siteurl}/managment/delClientSubmit">

<div class="managerInputLabel">&nbsp;</div>
<div style="float:left;">
 {t %client=$company[0].name escape=no}Вы хотите удалить из базы следующего клиента: <b>%client</b><br />
 Вы уверены?{/t}

<input type="hidden" name="id" value="{$company[0].id}"/>

<input style="float:left; background-color:#68c248; border-right: 1px solid #2c6d15; border-bottom: 1px solid #2c6d15; margin-top:6px; cursor:pointer;color:#fff;font-weight: bold" type="submit" value="{t}Удалить{/t}" class="IEremoteBorder"/>    

</div>


<div id="clear"></div>

</form>

<form method="GET" actions="{$siteurl}/managment/delclient" style="position:absolute; left: 370px; top:250px;">
	<input style="float:left; background-color:#68c248; border-right: 1px solid #2c6d15; border-bottom: 1px solid #2c6d15; margin-top:	6px; margin-left: 7px; cursor:pointer;color:#fff;font-weight: bold" type="submit" value="{t}Отмена{/t}" class="IEremoteBorder"/> 
</form>


</div>


</div>
</div>

</div>