<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.32
 */
include "../PomocneKlase/ApiPoziv.php";
include "../PomocneKlase/ApiReferenca.php";

if(
    isset($_REQUEST["naziv"]) and
    isset($_REQUEST["nazivGrada"])
 ){

    $parameter = array(
                        "naziv"=>$_REQUEST["naziv"],
                        "nazivGrada"=>$_REQUEST['nazivGrada']
                        );

    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dodajNovuPoslovnicuIGrad.php", $parameter);
}
