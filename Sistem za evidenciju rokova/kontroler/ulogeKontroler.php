<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 14.1.2020.
 * Time: 20.54
 */

require_once "../PomocneKlase/ApiPoziv.php";
require_once "../PomocneKlase/ApiReferenca.php";

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuUloga.php", "");


$jsonArray = json_decode($result,true);

if($jsonArray!=null)
    foreach($jsonArray as $item) {
        $json = json_decode($item,true);
        echo "<input type='checkbox' value='".$json['ID']."'>&nbsp".$json['naziv'].'&nbsp&nbsp';
    }
