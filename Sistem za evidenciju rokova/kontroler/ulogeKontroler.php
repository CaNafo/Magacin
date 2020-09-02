<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 14.1.2020.
 * Time: 20.54
 */

require_once "../PomocneKlase/ApiPoziv.php";

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", "http://localhost/Rokovi/Web%20servisi/dobijListuUloga.php", "");


$jsonArray = json_decode($result,true);

if($jsonArray!=null)
    foreach($jsonArray as $item) {
        $json = json_decode($item,true);
        echo "<input type='checkbox' value='".$json['ID']."'>".$json['naziv'];
        echo "<br>";
    }
