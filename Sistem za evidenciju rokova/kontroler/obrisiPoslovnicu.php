<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 23.54
 */

include "../PomocneKlase/ApiPoziv.php";
include "../PomocneKlase/ApiReferenca.php";
$parameter = array("ID"=>$_REQUEST['q']);

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/obrisiPoslovnicu.php", $parameter);