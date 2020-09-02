<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 10.23
 */
require 'Konekcija.php';
include 'ModeliZaWebServise/RadnikModel.php';

if (!isset($_REQUEST['q']))
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM radnik LEFT JOIN poslovnica on radnik.POS_ID = poslovnica.POS_ID ");
else
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM radnik LEFT JOIN poslovnica on radnik.POS_ID = poslovnica.POS_ID WHERE RADNIK_KorisnickoIme LIKE \"" . $_REQUEST['q'] . "%\"");

$listaRadnika = array();

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        $radnik = new RadnikModel();
        $id = $row['RADNIK_ID'];
        $radnik->postaviRadnikID($id);
        $radnik->postaviIme($row['RADNIK_KorisnickoIme']);
        $radnik->postaviPoslovnicaID($row['POS_ID']);
        $radnik->postaviPoslovnicaNaziv($row['POS_Naziv']);

        $resultUloge = Konekcija::dajInstancu()->izvrsiUpit(
          "SELECT * FROM listauloga LEFT JOIN uloga on uloga.UL_ID = listauloga.UL_ID WHERE listauloga.RADNIK_ID =".$id
        );
        while ($redUloge = $resultUloge->fetch_assoc()) {
            $radnik->dodajUlogu($redUloge['UL_Naziv']);
        }

        $json = json_encode( $radnik->jsonSerialize());
        $listaRadnika[]=$json;
    }

    $jsonArray = json_encode($listaRadnika,true);

    echo $jsonArray;
}
