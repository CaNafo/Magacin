<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 17.50
 */

include "../PomocneKlase/ApiPoziv.php";
include "../PomocneKlase/ApiReferenca.php";
$parameter;

if(isset($_REQUEST['q']))
    $parameter = array("q"=>$_REQUEST['q']);

if($_REQUEST['q']=="listaPoslovnica")
    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuPoslovnica.php", "");
else
    $result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuPoslovnica.php", $parameter);

$jsonArray = json_decode($result,true);

echo "<table>";
echo "<tr>
      <th>Naziv poslovnice</th>
      <th>Grad</th>
      </tr>";
if($jsonArray!=null)
    foreach($jsonArray as $item) {
        $json = json_decode($item,true);
        echo "<tr>";
        echo "<td>".$json['naziv']."</td>";
        echo "<td>".$json['gradNaziv']."</td>";
        echo "</tr>";
    }
echo "</table>";