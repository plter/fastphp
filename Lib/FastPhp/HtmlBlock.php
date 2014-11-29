<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/29/14
 * Time: 16:18
 */

namespace Lib\FastPhp;


class HtmlBlock {

    function setData(array $data){
        $this->_data = $data;
    }

    public function getData(){
        return $this->_data;
    }

    function setContext(Context $context){
        $this->_context = $context;
    }

    /**
     * @return Context
     */
    public function getContext(){
        return $this->_context;
    }

    public function __toString(){
        return "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>FastPhp</title>
</head>
<body>
FastPhp
</body>
</html>";
    }

    private $_data = null;
    private $_context = null;
} 