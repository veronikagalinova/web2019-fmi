<?php
define('WEBROOT', str_replace("webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'core/Controller.php');

require(ROOT . 'router.php');
require(ROOT . 'request.php');
require(ROOT . 'dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();
