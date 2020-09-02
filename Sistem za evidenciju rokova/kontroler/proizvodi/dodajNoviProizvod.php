<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.32
 */
include "../../PomocneKlase/ApiPoziv.php";
session_start();

if(isset($_REQUEST['DOB_ID']) and
    isset($_REQUEST["naziv"]) and
    isset($_REQUEST["datum"])
 ){

    $parameter = array("DOB_ID"=>$_REQUEST['DOB_ID'],
                        "naziv"=>$_REQUEST["naziv"],
                        "datum"=>$_REQUEST["datum"],
                        "POS_ID"=>$_SESSION['POSLOVNICA_ID']);

    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", "http://localhost/Rokovi/Web%20servisi/dodajNoviProizvod.php", $parameter);
}