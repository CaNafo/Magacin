<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 17.50
 */

require_once "../PomocneKlase/ApiPoziv.php";
require_once "../PomocneKlase/ApiReferenca.php";
$parameter;

if(isset($_REQUEST['q']))
    $parameter = array("q"=>$_REQUEST['q']);

if($_REQUEST['q']!="listaRadnika")
    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuRadnika.php", $parameter);
else
    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuRadnika.php", "");

$jsonArray = json_decode($result,true);

echo "<table>";
echo "<tr>
      <th>Ime radnika</th>
      <th>Naziv poslovnice</th>
      <th>Ima ulogu</th>
      </tr>";
if($jsonArray!=null)
    foreach($jsonArray as $item) {
        $json = json_decode($item,true);
        echo "<tr>";
        echo "<td>".$json['Ime']."</td>";
        echo "<td>".$json['PoslovnicaNaziv']."</td>";
        echo "<td>";
        foreach ($json['Uloge'] as $uloga)
            echo $uloga."<br>";
        echo "</td>";
        echo "<td style='background-color: transparent; text-align: center;'><a class='btn btn-warning' onclick='obrisiRadnika(this.id);' href='#' id='" . $json['ID'] . "'>Obriši</a></td>";
        echo "</tr>";
    }
echo "</table>";