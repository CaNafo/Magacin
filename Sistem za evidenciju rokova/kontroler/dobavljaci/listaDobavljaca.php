<?php
/**
* Created by PhpStorm.
* User: Ca
* Date: 8.1.2020.
* Time: 17.50
*/
include "../PomocneKlase/ApiPoziv.php";
include "../PomocneKlase/ApiReferenca.php";


$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuDobavljaca.php", "");

$jsonArray = json_decode($result,true);

echo "<table>";
    echo "<tr>
        <th>Naziv dobavljača</th>
        <th>Granica povratka</th>
    </tr>";
    if($jsonArray!=null)
    foreach($jsonArray as $item) {
    $json = json_decode($item,true);
    echo "<tr>";
        echo "<td>".$json['ime']."</td>";
        echo "<td>".$json['granica']." dana</td>";
        echo "</tr>";
    }
    echo "</table>";