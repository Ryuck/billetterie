<?php /* Smarty version Smarty3rc4, created on 2013-06-06 00:14:27
         compiled from "/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6600865995159c2f64bb508-74764939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5345b1a2eac0dc5816f6a7bf1e5a5ce92c6ee4fc' => 
    array (
      0 => '/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/page.tpl',
      1 => 1364834977,
    ),
  ),
  'nocache_hash' => '6600865995159c2f64bb508-74764939',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>Billetterie</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="fr" />
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
style.css" />
	</head>
	<body>

		<div id="conteneur">

			<?php if ($_smarty_tpl->getVariable('view')->value!="accueil"){?><div id="header"><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div><?php }?>
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
jquery.livequery.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
common.js"></script>
		<script type="text/javascript" src="<?php echo @JS_URL;?>
main.js"></script>

	</body>
</html>