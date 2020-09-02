<?php


class ProizvodModel
{
    private static $proizvodID;
    private static $naziv;
    private static $datumIsteka;


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


    public static function getDatumIsteka()
    {
        return self::$datumIsteka;
    }


    public static function setDatumIsteka($datumIsteka): void
    {
        self::$datumIsteka = $datumIsteka;
    }

    public static function dodajProizvodNaListuZaVracanje() {

    }

    public static function promeniDobavljaca(DobavljacModel $dobavljac){

    }

    public static function izmjeniProizvod(ProizvodModel $proizvodZaIzmenu) {

    }
}