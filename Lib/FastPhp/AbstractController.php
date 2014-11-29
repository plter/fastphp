<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/28/14
 * Time: 16:19
 */

namespace Lib\FastPhp;

require_once __DIR__.'/Context.php';

class AbstractController {

    private $context = null;

    function setContext(Context $context){
        $this->context = $context;
    }

    /**
     * @return Context
     */
    public function getContext(){
        return $this->context;
    }
} 