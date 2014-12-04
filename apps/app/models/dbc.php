<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/30/14
 * Time: 13:21
 */

use \Lib\FastPhp\Dbc\Db;

if(Db::getInstance()->connect('mysql:host=localhost;dbname=test','root','')){
    //TODO implement db connection
}else{
    die("<div style='color: red'>Can't connect db service</div>");
}

require_once __DIR__.'/users.php';
