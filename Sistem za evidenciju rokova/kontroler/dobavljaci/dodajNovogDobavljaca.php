<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.32
 */
include "../../PomocneKlase/ApiPoziv.php";
include "../../PomocneKlase/ApiReferenca.php";
session_start();

if(
    isset($_REQUEST["naziv"]) and
    isset($_REQUEST["brojDana"])
 ){

    $parameter = array(
                        "naziv"=>$_REQUEST["naziv"],
                        "brojDana"=>$_REQUEST["brojDana"]
                        );

    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dodajNovogDobavljaca.php", $parameter);
}