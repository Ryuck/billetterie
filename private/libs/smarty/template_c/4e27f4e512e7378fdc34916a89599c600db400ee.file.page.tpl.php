<?php /* Smarty version Smarty3rc4, created on 2011-09-15 09:14:16
         compiled from "C:/wamp/www/ikys-project/ikys/private/tpl/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201264e71c1e8451ce9-01579216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e27f4e512e7378fdc34916a89599c600db400ee' => 
    array (
      0 => 'C:/wamp/www/ikys-project/ikys/private/tpl/page.tpl',
      1 => 1316077682,
    ),
  ),
  'nocache_hash' => '201264e71c1e8451ce9-01579216',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="fr">
	<head>
		<title>Ikys</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="fr" />
		<meta name="robots" content="noindex" />
		<!--<link rel="icon" type="image/x-icon" href="<?php echo @ROOT_URL;?>
favicon.png" />-->
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
		<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php"></script>
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