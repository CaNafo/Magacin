<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 20.25
 */

require 'Konekcija.php';

if( isset($_REQUEST['ID']) and
    isset($_REQUEST['DOB_ID']) and
    isset($_REQUEST["naziv"])  and
    isset($_REQUEST["datum"])
){
    $ymd = DateTime::createFromFormat('m/d/Y', $_REQUEST["datum"])->format('Y-m-d');

    Konekcija::dajInstancu()->izvrsiUpit("
    UPDATE proizvodi set DOB_ID=".$_REQUEST['DOB_ID'].", PROIZ_Naziv='".$_REQUEST["naziv"]."', PROIZ_DatumIsteka='".$ymd."'
    WHERE PROIZ_ID=".$_REQUEST['ID']);
}