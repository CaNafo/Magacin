<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 10.23
 */
require 'Konekcija.php';
include 'ModeliZaWebServise/GradModel.php';

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM grad WHERE 1");


$listaRadnika = array();

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        $grad = new GradModel();
        $id = $row['GRAD_ID'];
        $grad->postaviGradID($id);
        $grad->postaviGradNaziv($row['GRAD_Naziv']);

        $json = json_encode( $grad->jsonSerialize());
        $listaRadnika[]=$json;
    }

    $jsonArray = json_encode($listaRadnika,true);

    echo $jsonArray;
}
