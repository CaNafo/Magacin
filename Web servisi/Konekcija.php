<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "rokovi");

class Konekcija
{
    private static $isntanca;
    private static $konekcija;

    private function __construct()
    {
        static::$konekcija = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_set_charset(static::$konekcija, "UTF-8");
        if(static::$konekcija->connect_error){
            die("Greksa pri konekciji na bazu: ".static::$konekcija->connect_error);
        }
    }

    public static function dajInstancu()
    {
        if(static::$isntanca==null)
        {
            static::$isntanca=new static();
        }
        return static::$isntanca;
    }

    public function izvrsiUpit($upit)
    {
        static::$konekcija->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        return static::$konekcija->query($upit);
    }

    public function poslednjiID()
    {
        return static::$konekcija->insert_id;
    }

    public function dajKonekciju()
    {
        return static::$konekcija;
    }

    public static function zatvori()
    {
        static::$konekcija->zatvori();
    }
}