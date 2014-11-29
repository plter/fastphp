<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/29/14
 * Time: 16:36
 */

namespace app\views\con;

require_once dirname(__DIR__).'/RootView.php';

use app\views\RootView;

class index extends RootView{

    public function getContent(){
        return 'Hello FastPhp';
    }
}
