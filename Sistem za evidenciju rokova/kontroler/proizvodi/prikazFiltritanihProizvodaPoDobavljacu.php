<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 11.01
 */
session_start();
include "../../privilegije.php";

$parameter = array("q"=>$_REQUEST['q']);

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuProizvodaPoDobavljacu.php", $parameter);

$jsonArray = json_decode($result,true);

echo "<table>";
echo "<tr>
    <th>Naziv proizvoda</th>
    <th>Ime dobavljača</th>
    <th>Datum isteka</th>
    <th>Granica povratka</th>
  </tr>";
if($jsonArray!=null) {
    $brojac = 1;
    foreach ($jsonArray as $item) {
        $json = json_decode($item, true);
        echo "<tr>";
        echo "<td>" . $json['naziv'] . "</td>";
        echo "<td>" . $json['dobavljacNaziv'] . "</td>";

        $date1=date_create(date("Y-m-d")); // or your date as well
        $date2=date_create($json['datumIsteka']);
        $datumVracanja= date('Y-m-d', strtotime($date2->format('Y-m-d'). ' - '.$json['granicaPovratka'].' days'));
        $datumVracanjaDateObject = date_create($datumVracanja);
        $diff=date_diff($date1,$datumVracanjaDateObject);

        if($diff->days>5 && $date1<$datumVracanjaDateObject)
            echo "<td>".$json['datumIsteka']." za ".date_diff($date1,$date2)->days." dana</td>";
        else
            if($date1<$datumVracanjaDateObject)
                echo "<td style='color: #ff6526;'>" .$json['datumIsteka']." (još " . $diff->days. " dana za povratak)</td>";
            else
                echo "<td style='color: red;'>".$json['datumIsteka']." (rok za povratak je istekao)</td>";

        echo "<td>" . $json['granicaPovratka'] . " dana</td>";
        foreach ($privilegije->dobijDozvole() as $dozvola)
            if ($dozvola == "brisanje_proizvoda") {
                echo "<td name='sakrivenaKolona' style='background-color: transparent;'><a class='btn btn-warning' onclick='vratiProizvod(this.id);' href='#' id='" . $json['ID'] . "'>Vrati proizvod</a></td>";
            }
        echo "<td name='sakrivenaKolona' style='background-color: transparent; text-align: center;'><button class='btn btn-secondary' id='" . $brojac . "' onclick='otvoriModalniDialog(this.id," . $json['ID'] . ");'>Izmjeni</button></td>";
        $brojac++;
        echo "</tr>";


    }
    echo "</table>";
}