<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 14.50
 */

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuGradova.php", "");

$jsonArray = json_decode($result,true);

foreach($jsonArray as $item){
    $json = json_decode($item,true);
    echo "<option value='".$json['ID']."'>".$json['naziv']."</option>";
}