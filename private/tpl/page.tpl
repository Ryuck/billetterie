<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>Billetterie</title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="fr" />
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_URL}jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="{$smarty.const.CSS_URL}style.css" />
	</head>
	<body>

		<div id="conteneur">

			{if $view != "accueil"}<div id="header">{include file="header.tpl"}</div>{/if}
			<div class="separator"></div>
			<div id="page">{include file="{$view}.tpl"}</div>
			<div class="separator"></div>
			<div id="footer">{include file="footer.tpl"}</div>

		</div>

		{* inclusion des js *}
		<script type="text/javascript" src="{$smarty.const.JS_URL}jquery.js"></script>
		<script type="text/javascript" src="{$smarty.const.JS_URL}jquery-ui.js"></script>
		<script type="text/javascript" src="{$smarty.const.JS_URL}jquery.form.js"></script>
		<script type="text/javascript" src="{$smarty.const.JS_URL}jquery.validate.js"></script>
		<script type="text/javascript" src="{$smarty.const.JS_URL}jquery.livequery.js"></script>
		<script type="text/javascript" src="{$smarty.const.JS_URL}common.js"></script>
		<script type="text/javascript" src="{$smarty.const.JS_URL}main.js"></script>

	</body>
</html>