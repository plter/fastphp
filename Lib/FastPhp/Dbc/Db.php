<?php
/**
 * Created by PhpStorm.
 * User: plter
 * Date: 11/30/14
 * Time: 15:30
 */

namespace Lib\FastPhp\Dbc;


class Db{


    /**
     * @param $dsn
     * @param null $uname
     * @param null $pw
     * @return boolean
     */
    public function connect($dsn,$uname=null,$pw=null){
        try {
            $this->pdo = new \PDO($dsn, $uname, $pw, array(
                \PDO::ATTR_PERSISTENT => true
            ));
            return true;
        }catch (\PDOException $e){
            return false;
        }
    }

    /**
     * @return \PDO
     */
    public function getPdo(){
        return $this->pdo;
    }

    /**
     * Run sql with no result data
     * @param $sql
     * @return int
     */
    public function exec($sql){
        return $this->pdo->exec($sql);
    }

    /**
     * Run sql and get the result data
     * @param $sql
     * @return \PDOStatement
     */
    public function query($sql){
        return $this->pdo->query($sql);
    }


    /**
     * @var \PDO
     */
    private $pdo = null;

    /**
     * @return Db
     */
    public static function getInstance(){
        if(Db::$__dbconn==null){
            Db::$__dbconn=new Db();
        }
        return Db::$__dbconn;
    }

    private static $__dbconn = null;
}
