<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 7.9.2020.
 * Time: 00.13
 */

class ApiReferenca
{
    private static $isntanca;

    private function __construct()
    {
    }

    public static function dajInstancu()
    {
        if(static::$isntanca==null)
        {
            static::$isntanca=new static();
        }
        return static::$isntanca;
    }

    public function dajReferencu(){
        $referenca = "http://localhost/magacin/";
        return $referenca;
    }
}