<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 10.23
 */
require 'Konekcija.php';
require 'ModeliZaWebServise/DobavljacModel.php';

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM dobavljaci");

$dobavljac = new DobavljacModel();
$listaDobavljaca = array();

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        $dobavljac->setDobavljacID($row['DOB_ID']);
        $dobavljac->setNaziv($row['DOB_Naziv']);
        $dobavljac->setGranicaPovratka($row['DOB_GranicaPovratka']);


        $json = json_encode( $dobavljac->jsonSerialize());

       $listaDobavljaca[]=$json;
    }

    //echo var_dump($listaDobavljaca);
    $jsonArray = json_encode($listaDobavljaca,true);

    echo $jsonArray;
}
