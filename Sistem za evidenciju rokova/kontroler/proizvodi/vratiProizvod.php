<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 23.54
 */

include "../../PomocneKlase/ApiPoziv.php";
$parameter = array("ID"=>$_REQUEST['q']);

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", "http://localhost/Rokovi/Web%20servisi/vratiProizvod.php", $parameter);