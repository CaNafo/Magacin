<?php


class ProizvodZaVracanjeModel
{
    private static $proizvodID;
    private static $naziv;


    public static function getProizvodID()
    {
        return self::$proizvodID;
    }


    public static function setProizvodID($proizvodID): void
    {
        self::$proizvodID = $proizvodID;
    }


    public static function getNaziv()
    {
        return self::$naziv;
    }


    public static function setNaziv($naziv): void
    {
        self::$naziv = $naziv;
    }

    public static function vratiProizvod() {

    }
}