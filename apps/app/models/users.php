<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 12/3/14
 * Time: 21:06
 */

\Lib\FastPhp\Dbc\Db::getInstance()->exec("CREATE TABLE IF NOT EXISTS `users`(
`id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(255) NOT NULL DEFAULT '',
`age` INTEGER NOT NULL DEFAULT 0
) DEFAULT CHARSET=UTF8");