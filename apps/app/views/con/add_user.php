<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 12/3/14
 * Time: 21:39
 */

namespace app\views\con;

require_once dirname(__DIR__).'/RootView.php';

use app\views\RootView;
use Lib\FastPhp\Dbc\Db;

class add_user extends RootView{

    public function getContent(){
        /**
         * @var \PDOStatement
         */
        $statement = Db::getInstance()->query("SELECT * FROM `users`");
        $result = $statement->fetchAll();
        $first = $result[0];
        return $first['name'];
    }
} 