<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Model/SingletonIni.php';
class Singleton extends SingletonIni
{
    private static $instance;
    public $cnx;
    /*
  public $cnx;
  // TODO : mettre les paramètres dans un fichier .ini ou .env
  private static $dsn = 'mysql:host=127.0.0.1;dbname=worlddb';
  private static $username = "worlduser";
  private static $password = "123+aze";*/
    //private $dsn = "mysql:host=$this->DbHost;dbname=$this->DbName" ;

    private function __construct()
    {
        parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
        parent::__construct();
        $this->cnx = new PDO("mysql:host=" . $this->getValue("DbHost") . ";dbname=" . $this->getValue("DbName"), $this->getValue("DbUsername"), $this->getValue("DbPassword"));
    }

    public function getInstance(): Singleton
    {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
