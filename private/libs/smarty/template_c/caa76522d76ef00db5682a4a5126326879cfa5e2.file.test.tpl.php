<?php /* Smarty version Smarty3rc4, created on 2011-04-13 12:33:09
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243714da59805abeb59-17492221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caa76522d76ef00db5682a4a5126326879cfa5e2' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/test.tpl',
      1 => 1302697988,
    ),
  ),
  'nocache_hash' => '243714da59805abeb59-17492221',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>
select tavu
</p><br /><br />
<div id="toto">
<button name="toto-plage" id="plage" >toto à la plage</button><br />
<button name="toto-montagne" id="montagne" >toto à la montagne</button><br /><br /><br />
</div>
<div id="valuetoto">
toto il va dtc
</div>
<script type="text/javascript">
<!--
window.onload = function() {
	
	$("#toto button").click(function() {
		$.ajax({
			url: ROOT_URL+'?act=test&xml=1&toto='+$(this).text(),
			dataType:"xml",
			success:function(msg){
				$('#valuetoto').text($(msg).find('info').text());
			}
		});
	});

};
//-->
</script>
