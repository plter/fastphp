<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/27/14
 * Time: 16:02
 */

namespace Lib\FastPhp;


class Loader {


    public function __construct(){

    }


    public function run(){

    }


    /**
     * @return Loader
     */
    public static function getInstance(){
        if(Loader::$__instance==null){
            Loader::$__instance = new Loader();
        }
        return Loader::$__instance;
    }

    private static $__instance = null;
} 