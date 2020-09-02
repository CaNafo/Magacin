<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.35
 */
require 'Konekcija.php';

if(isset($_REQUEST['DOB_ID']) and
    isset($_REQUEST["naziv"]) and
    isset($_REQUEST["datum"]) and
    isset($_REQUEST["POS_ID"])
){
    $ymd = DateTime::createFromFormat('m/d/Y', $_REQUEST["datum"])->format('Y-m-d');

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "INSERT INTO proizvodi(PROIZ_ID, DOB_ID, POS_ID, PROIZ_Naziv, PROIZ_DatumIsteka, zaVracanje, vracen) 
         VALUES (NULL,".$_REQUEST['DOB_ID'].",".$_REQUEST["POS_ID"].",'".$_REQUEST["naziv"]."','".$ymd."',0,0)");

}