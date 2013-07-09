<?php

require_once LIBS_PATH.'smarty/Smarty.class.php';

$_S = new Smarty();

$_S->template_dir = TPL_PATH;
$_S->compile_dir = LIBS_PATH.'smarty/template_c/';
$_S->config_dir = LIBS_PATH.'smarty/configs/';
$_S->cache_dir = LIBS_PATH.'smarty/cache/';

?>