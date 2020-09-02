<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 9.1.2020.
 * Time: 00.52
 */
include "PomocneKlase/ApiPoziv.php";
include "Modeli/PrivilegijeModel.php";

$data = array("ID" => $_SESSION['RADNIK_ID']);

$result = ApiPoziv::dajInstancu()->
    pozoviApiServis("post", "http://localhost/Rokovi/Web%20servisi/dobijPrivilegijeServis.php", $data);

$json = json_decode($result,true);

$privilegije = new PrivilegijeModel();
$privilegije->dodajUloge($json['Uloge']);
$privilegije->dodajDozvole($json['Dozvole']);
