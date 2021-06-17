<?php

class Connexion
{
    // TODO retourner instance de PDO
    // Ca doit etre singleton

    private static $instance;
    private $type = "mysql";
    private $host = "mysql";
    private $dbname = "eurovent";
    private $username = "root";
    private $password = 'password';
    private $db;

    private function __construct()
    {
            $this->db = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$this->dbname,
                $this->username,
                $this->password,
                array(PDO::ATTR_PERSISTENT => true)
            );
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getDbh()
    {
        return $this->db;
    }

}

