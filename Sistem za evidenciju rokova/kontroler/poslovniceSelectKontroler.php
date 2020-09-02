<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 17.50
 */

require_once "../PomocneKlase/ApiPoziv.php";

$result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", "http://localhost/Rokovi/Web%20servisi/dobijListuPoslovnica.php", "");


$jsonArray = json_decode($result,true);

if($jsonArray!=null)
    foreach($jsonArray as $item) {
        $json = json_decode($item,true);
        echo "<option value='".$json["ID"]."'>".$json['naziv']."</option>";
    }
