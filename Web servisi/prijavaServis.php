<?php

require 'Konekcija.php';
include 'ModeliZaWebServise/RadnikModel.php';
if(
    isset($_REQUEST['ime']) and
    isset($_REQUEST['sifra'])
)
{
    $radnik = new RadnikModel();
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM radnik WHERE radnik.RADNIK_KorisnickoIme='" . $_REQUEST['ime'] . "' AND radnik.RADNIK_LOZINKA='" . md5($_REQUEST['sifra']) . "'");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $radnik->postaviRadnikID($row['RADNIK_ID']);
            $radnik->postaviIme($row['RADNIK_KorisnickoIme']);
            $radnik->postaviPoslovnicaID($row['POS_ID']);
        }

    }

    $json = json_encode( $radnik->jsonSerialize());
    echo $json;

}