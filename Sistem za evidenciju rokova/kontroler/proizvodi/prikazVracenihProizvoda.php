<?php

session_start();
include "../../privilegije.php";

$result = ApiPoziv::dajInstancu()->
pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/dobijListuVracenihProizvoda.php", "");

$jsonArray = json_decode($result,true);

echo "<table>";
echo "<tr>
    <th>Naziv proizvoda</th>
    <th>Ime dobavljača</th>
    <th>Datum isteka</th>
  </tr>";
if($jsonArray!=null)
    foreach($jsonArray as $item) {
        $json = json_decode($item,true);

        $date1=date_create(date("Y-m-d")); // or your date as well
        $date2=date_create($json['datumIsteka']);
        $diff=date_diff($date1,$date2);

        echo "<tr>";
        echo "<td>" . $json['naziv'] . "</td>";
        echo "<td>" . $json['dobavljacNaziv'] . "</td>";
        if($diff->days>($json['granicaPovratka']*31))
            echo "<td>".$json['datumIsteka']."</td>";
        else
            echo "<td style='color: red;'>".$json['datumIsteka']."</td>";
        foreach ($privilegije->dobijDozvole() as $dozvola)
            if($dozvola == "brisanje_proizvoda") {
                echo "<td name='sakrivenaKolona' style='text-align: center; background-color: transparent;'><a class='btn btn-danger' onclick='obrisiProizvod(this.id)' href='#' id='" . $json['ID'] . "'>Obriši</a></td>";
            }
        echo "</tr>";


}
echo "</table>";