<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 at 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr
namespace app\kernel\db;
use PDO;


class Database {

private $_host = "localhost";
private $_user = "root";
private $_password = "************";
private $_bdd = "garage";
public $_pdo;

    public function __construct (){

            try {
                    $dsn = new \PDO("mysql:host=".$this->_host, $this->_user, $this->_password);
                    $sql = "CREATE DATABASE IF NOT EXISTS `$this->_bdd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
                    $dsn->query($sql);

                } catch (PDOException $e) {
                    die("DB ERROR: ". $e->getMessage());
                }


    }


    public function dbn() {
        try { 

            $this->_pdo = new \PDO("mysql:dbname=".$this->_bdd.";host=".$this->_host, $this->_user, $this->_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $this->_pdo;
        }
        catch (Exception $e) {die("impossible de se connecter a la base de données ");
        
        }
    }
}

