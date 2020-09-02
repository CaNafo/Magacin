<?php

class RadnikModel
{
    private static $radnikID;
    private static $ime;
    private static $dozvole;

    public function __construct()
    {
        self::$dozvole = array();
    }

    public static function dobijRadnikID()
    {
        return self::$radnikID;
    }


    public static function postaviRadnikID($radnikID): void
    {
        self::$radnikID = $radnikID;
    }


    public static function dobijIme()
    {
        return self::$ime;
    }


    public static function postaviIme($ime): void
    {
        self::$ime = $ime;
    }


    public static function dobijDozvole(): array
    {
        return self::$dozvole;
    }


    public static function postaviDozvole($dozvole): void
    {
        self::$dozvole = $dozvole;
    }

    public static function izmjeniIme($novoIme) {

    }

}