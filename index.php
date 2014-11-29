<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/27/14
 * Time: 16:07
 */

//default config
define('FASTPHP_ROOT',__DIR__);
define('FASTPHP_HTTP_ROOT',dirname($_SERVER['SCRIPT_NAME']));
define('APPS_ROOT',FASTPHP_ROOT.'/apps');
define('APPS_HTTP_ROOT',FASTPHP_HTTP_ROOT.'/apps');
define('DEFAULT_APP_NAME','app');
define('DEFAULT_CONTROLLER_NAME','con');
define('DEFAULT_ACTION_NAME','index');



require_once __DIR__.'/Lib/FastPhp/Loader.php';

use \Lib\FastPhp\Loader;
Loader::getInstance()->getInstance()->run();
