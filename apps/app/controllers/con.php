<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/28/14
 * Time: 14:41
 */

namespace app\controllers;


use Lib\FastPhp\AbstractController;

class con extends AbstractController{

    public function index(){
        return array('title'=>'FastPhp');
    }
} 