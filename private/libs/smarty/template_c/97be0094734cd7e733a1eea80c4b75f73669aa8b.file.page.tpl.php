<?php /* Smarty version Smarty3rc4, created on 2011-04-18 12:56:34
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229254dac350232eee4-75307094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97be0094734cd7e733a1eea80c4b75f73669aa8b' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/page.tpl',
      1 => 1303131334,
    ),
  ),
  'nocache_hash' => '229254dac350232eee4-75307094',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>Test voiture moins chere [dot] com</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="fr" />
		<meta name="robots" content="noindex" />
		<link rel="icon" type="image/x-icon" href="<?php echo @ROOT_URL;?>
favicon.png" />
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
style.css" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
ie6.css" /><![endif]-->

	</head>
	<body>

		<div id="conteneur">

			<div id="header"><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
			<div class="separator"></div>
			<div id="page"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('view')->value).".tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
			<div class="separator"></div>
			<div id="footer"><?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>

		</div>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
jquery.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
jquery.form.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
common.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
main.js"></script>

	</body>
</html>