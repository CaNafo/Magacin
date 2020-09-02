<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 10.23
 */
include 'ModeliZaWebServise/UlogaModel.php';
require 'Konekcija.php';

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM uloga");


$uloga = new UlogaModel();
$listaUloga = array();

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        $uloga->setUlogaID($row['UL_ID']);
        $uloga->setUlogaNaziv($row['UL_Naziv']);

        $json = json_encode( $uloga->jsonSerialize());
        $listaUloga[]=$json;
    }

    $jsonArray = json_encode($listaUloga,true);
    echo $jsonArray;
}
