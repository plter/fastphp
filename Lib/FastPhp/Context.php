<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/28/14
 * Time: 12:12
 */

namespace Lib\FastPhp;

class Context{

    /**
     * @param string $adapterPath
     */
    public function __construct($adapterPath){
        $this->adapterPath = $adapterPath;

        $this->adapterPathSplitArr = explode('/',$adapterPath);
        if(isset($this->adapterPathSplitArr[0])&&
            !empty($this->adapterPathSplitArr[0])){
            $this->appName = $this->adapterPathSplitArr[0];
        }
        if(isset($this->adapterPathSplitArr[1])&&
            !empty($this->adapterPathSplitArr[1])){
            $this->controllerName = $this->adapterPathSplitArr[1];
        }
        if(isset($this->adapterPathSplitArr[2])&&
            !empty($this->adapterPathSplitArr[2])){
            $this->actionName = $this->adapterPathSplitArr[2];
        }

        $this->appUrlRoot = APPS_HTTP_ROOT.$this->appName;
    }

    public function getPathArr(){
        return $this->adapterPathSplitArr;
    }

    public function getPathArrCount(){
        return count($this->getPathArr());
    }

    public function getAppName(){
        return $this->appName;
    }

    public function getControllerName(){
        return $this->controllerName;
    }

    public function getActionName(){
        return $this->actionName;
    }

    public function getAppUrlRoot(){
        return $this->appUrlRoot;
    }

    private $adapterPath = null;
    private $appName = DEFAULT_APP_NAME;
    private $controllerName = DEFAULT_CONTROLLER_NAME;
    private $actionName = DEFAULT_ACTION_NAME;
    private $adapterPathSplitArr = null;
    private $appUrlRoot = null;
}
