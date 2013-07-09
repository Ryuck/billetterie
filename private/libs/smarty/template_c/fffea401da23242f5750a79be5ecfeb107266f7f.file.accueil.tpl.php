<?php /* Smarty version Smarty3rc4, created on 2011-06-15 06:32:19
         compiled from "C:/wamp/www/test/private/tpl/accueil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239314df851f36e69d2-57251705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fffea401da23242f5750a79be5ecfeb107266f7f' => 
    array (
      0 => 'C:/wamp/www/test/private/tpl/accueil.tpl',
      1 => 1305269409,
    ),
  ),
  'nocache_hash' => '239314df851f36e69d2-57251705',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="coordonnees"></div>

<div id="map">
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, null);?>
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['name'] = 'fo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['loop'] = is_array($_loop=6) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['fo']['total']);
?>
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('i')->value+1, null, null);?>
<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable(0, null, null);?>
	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['name'] = 'foo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] = is_array($_loop=12) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total']);
?>
	<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_variable($_smarty_tpl->getVariable('j')->value+1, null, null);?>
	<div class="case" id="<?php echo $_smarty_tpl->getVariable('i')->value;?>
.<?php echo $_smarty_tpl->getVariable('j')->value;?>
">
	<?php if ($_smarty_tpl->getVariable('i')->value==1&&$_smarty_tpl->getVariable('j')->value==1){?>
		<img id='perso1' class="<?php echo $_smarty_tpl->getVariable('i')->value;?>
.<?php echo $_smarty_tpl->getVariable('j')->value;?>
" src='http://localhost/test/front/css/image/perso.png' alt='' />
	<?php }?>
	</div>	    
	<?php endfor; endif; ?>
	<div class="separator"></div>
<?php endfor; endif; ?>
</div>

<script type="text/javascript">
<!--
window.onload=function(){
$(".case").click(function(){
	casearrivee = $(this).attr('id');
	$.ajax({
		url: 'http://localhost/test/?act=clickcase&xml=1&casedepart='+$("#perso1").attr('class')+'&casearrivee='+$(this).attr('id'),
		dataType:"xml",
		success:function(xml){
				$('#coordonnees').html($(xml).find('coordonnees').text());
				$("#perso1").remove("img");
				$(this).html("<img id='perso1' class='"+casearrivee+"' src='http://localhost/test/front/css/image/perso.png' alt='' />");
		}
	});
});
};
-->
</script>