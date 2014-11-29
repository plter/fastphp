<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/27/14
 * Time: 16:02
 */

namespace Lib\FastPhp;

require_once __DIR__.'/Context.php';
require_once __DIR__.'/Pages.php';
require_once __DIR__.'/AbstractController.php';
require_once __DIR__.'/HtmlBlock.php';

class Loader {


    public function __construct(){

    }


    public function run(){
        //main adapter
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $scriptDir = dirname($scriptName);
        $requestUri = $_SERVER['REQUEST_URI'];

        //Read adapter path >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $adapterPath = substr($requestUri,strlen($scriptDir));

        $indexFile = '/index.php';
        $indexFileStrlen = strlen($indexFile);
        if(strlen($adapterPath)>$indexFileStrlen &&
            substr($adapterPath,0,$indexFileStrlen)==$indexFile){
            $adapterPath = substr($adapterPath,$indexFileStrlen);
        }
        //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        //Parse adapter >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $context = new Context($adapterPath);

        $appName = $context->getAppName();
        $controllerName = $context->getControllerName();
        $actionName = $context->getActionName();
        //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        //Load the controller and run action >>>>>>>>>>>>>>>>>>>>
        $theConFilePath = APPS_ROOT."/$appName/controllers/$controllerName.php";
        if(file_exists($theConFilePath)){
            require_once $theConFilePath;

            $theControllerClass = "$appName\\controllers\\$controllerName";
            if(class_exists($theControllerClass)){
                $theController = new $theControllerClass();
                $theController->setContext($context);

                if(method_exists($theController,$actionName)){
                    $result = call_user_func(array($theController,$actionName));
                    if(is_array($result)){
                        $theViewFilePath = APPS_ROOT."/$appName/views/$controllerName/$actionName.php";
                        if(file_exists($theViewFilePath)){
                            require_once $theViewFilePath;

                            $theViewClass = "$appName\\views\\$controllerName\\$actionName";
                            if(class_exists($theViewClass)){
                                $theView = new $theViewClass();
                                $theView->setData($result);
                                $theView->setContext($context);
                                echo $theView;
                            }else{
                                Pages::viewNotFound("/$appName/$controllerName/$actionName");
                            }
                        }else{
                            Pages::viewNotFound("/$appName/$controllerName/$actionName");
                        }

                    }elseif(is_string($result)){
                        echo $result;
                    }else{
                        echo 'Error: Actions must return array or string';
                    }
                }else{
                    Pages::actionNotFound("/$appName/$controllerName/$actionName");
                }
            }else{
                Pages::controllerNotFound("/$appName/$controllerName");
            }
        }else{
            Pages::controllerNotFound("/$appName/$controllerName");
        }
        //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
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
