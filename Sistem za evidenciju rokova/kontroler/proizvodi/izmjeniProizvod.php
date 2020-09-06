<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.32
 */
include "../../PomocneKlase/ApiPoziv.php";
include "../../PomocneKlase/ApiReferenca.php";

if(isset($_REQUEST['ID']) and
    isset($_REQUEST['DOB_ID']) and
    isset($_REQUEST["naziv"]) and
    isset($_REQUEST["datum"])
 ){
    $parameter = array("ID"=>$_REQUEST['ID'],
                        "DOB_ID"=>$_REQUEST['DOB_ID'],
                        "naziv"=>$_REQUEST["naziv"],
                        "datum"=>$_REQUEST["datum"]);

    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/izmjeniProizvod.php", $parameter);
}