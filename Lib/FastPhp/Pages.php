<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/28/14
 * Time: 15:35
 */

namespace Lib\FastPhp;


class Pages {
    public static function controllerNotFound($theName){
        //TODO write custom 404 page
        echo "Controller $theName not found";
    }

    public static function actionNotFound($theName){
        //TODO write custom 404 page
        echo "Action $theName not found";
    }

    public static function viewNotFound($theName){
        //TODO write custom 404 page
        echo "View $theName not found";
    }
}