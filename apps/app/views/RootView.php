<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/29/14
 * Time: 16:44
 */

namespace app\views;


use Lib\FastPhp\HtmlBlock;

class RootView extends HtmlBlock{

    public function getTitle(){
        $data = $this->getData();
        return $data['title'];
    }

    public function getContent(){
        return '';
    }

    public function __toString(){
        $theContent = $this->getContent();
        $theTitle = $this->getTitle();
        $jqueryFile = $this->getContext()->getAppUrlRoot().'/js/jquery.min.js';
        return "<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>$theTitle</title>
<script src='$jqueryFile'></script>
</head>
<body>
$theContent
</body>
</html>";
    }
} 