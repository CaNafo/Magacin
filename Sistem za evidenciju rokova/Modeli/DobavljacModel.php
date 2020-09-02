<?php


class DobavljacModel
{

    private static $dobavljacID;
    private static $naziv;
    private static $granicaPovratka;


    public static function getDobavljacID()
    {
        return self::$dobavljacID;
    }


    public static function setDobavljacID($dobavljacID): void
    {
        self::$dobavljacID = $dobavljacID;
    }


    public static function getNaziv()
    {
        return self::$naziv;
    }


    public static function setNaziv($naziv): void
    {
        self::$naziv = $naziv;
    }


    public static function getGranicaPovratka()
    {
        return self::$granicaPovratka;
    }


    public static function setGranicaPovratka($granicaPovratka): void
    {
        self::$granicaPovratka = $granicaPovratka;
    }



}