<?php
/**
* Created by PhpStorm.
* User: Ca
* Date: 8.1.2020.
* Time: 17.50
*/

require_once "../../PomocneKlase/ApiPoziv.php";
require_once "../../PomocneKlase/ApiReferenca.php";
$parameter;


if(isset($_REQUEST['q'])){
    $parameter = array("q"=>$_REQUEST['q']);
}

if($_REQUEST['q']=="listaDobavljaca")
    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuDobavljaca.php", "");
else
    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuDobavljaca.php", $parameter);



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
        echo "<td style='background-color: transparent; text-align: center;'><a class='btn btn-warning' onclick='obrisiDobavljaca(this.id);' href='#' id='" . $json['ID'] . "'>Obriši</a></td>";
        echo "</tr>";
    }
    echo "</table>";