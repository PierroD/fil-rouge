<?php

abstract class SingletonIni
{
    protected $ini;
    /*
  public $cnx;
  // TODO : mettre les paramètres dans un fichier .ini ou .env
  private static $dsn = 'mysql:host=127.0.0.1;dbname=worlddb';
  private static $username = "worlduser";
  private static $password = "123+aze";*/

    //private $dsn = "mysql:host=$this->DbHost;dbname=$this->DbName" ;

    public function __construct()
    {
        $this->ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini', false);
        // var_dump($this->ini);

        // $this->cnx = new PDO('mysql:host=$this->getValue("DbHost");dbName=$this->getValue("DbName")', $this->DbUsername, $this->DbPassword);

    }


    public function getValue(string $key, string $section = null)
    {
        if ($section == null) {
            if (array_key_exists($key, $this->ini)) {
                return $this->ini[$key];
            }
        } else {
            if (array_key_exists($section, $key)) {
                return $this->ini[$section][$key];
            }
        }
    }
}
