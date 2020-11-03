<?php

define('SITENAME', 'YouTab Brand');
define('URLROOT', 'http://localhost:8888/YouTab');

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('VIEW', APP . 'views' . DIRECTORY_SEPARATOR);
define('MODEL', APP . 'models' . DIRECTORY_SEPARATOR);
define('CONTROLLER', APP . 'controllers' . DIRECTORY_SEPARATOR);
define('LIB', APP . 'libs' . DIRECTORY_SEPARATOR);

$modules = [ROOT, APP, VIEW, MODEL, CONTROLLER, LIB];
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload', false);
