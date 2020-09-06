<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.32
 */
include "../PomocneKlase/ApiPoziv.php";
include "../PomocneKlase/ApiReferenca.php";

if(isset($_REQUEST['ime']) and
    isset($_REQUEST["sifra"]) and
    isset($_REQUEST["poslovnicaID"]) and
    isset($_REQUEST["uloge"])
 ){

    $parameter = array("ime"=>$_REQUEST['ime'],
                        "sifra"=>$_REQUEST["sifra"],
                        "poslovnicaID"=>$_REQUEST["poslovnicaID"],
                        "uloge"=>$_REQUEST['uloge']);

    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dodajNovogRadnika.php", $parameter);
}
