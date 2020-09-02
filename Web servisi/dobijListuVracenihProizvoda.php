<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 10.23
 */
require 'Konekcija.php';
include 'ModeliZaWebServise/ProizvodModel.php';

if (!isset($_REQUEST['q']))
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM proizvodi LEFT JOIN dobavljaci on proizvodi.DOB_ID=dobavljaci.DOB_ID  WHERE proizvodi.vracen=1");
else
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM proizvodi LEFT JOIN dobavljaci on proizvodi.DOB_ID=dobavljaci.DOB_ID WHERE (proizvodi.vracen=1) AND (PROIZ_Naziv LIKE \"" . $_REQUEST['q'] . "%\" or DOB_Naziv LIKE \"" . $_REQUEST['q'] . "%\")");

$proizvod = new ProizvodModel();
$listaProizvoda = array();

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        $proizvod->postaviProizvodID($row['PROIZ_ID']);
        $proizvod->postaviNaziv($row['PROIZ_Naziv']);
        $proizvod->postaviDatumIsteka($row['PROIZ_DatumIsteka']);
        $proizvod->postavidobavljacNaziv($row['DOB_Naziv']);
        $proizvod->postavigranicaPovratka($row['DOB_GranicaPovratka']);

        $json = json_encode( $proizvod->jsonSerialize());
        $listaProizvoda[]=$json;
    }

    $jsonArray = json_encode($listaProizvoda,true);

    echo $jsonArray;
}
