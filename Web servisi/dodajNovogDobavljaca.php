<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.35
 */
require 'Konekcija.php';

if(
    isset($_REQUEST["naziv"]) and
    isset($_REQUEST["brojDana"])
){
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "INSERT INTO dobavljaci(DOB_ID, DOB_Naziv, DOB_GranicaPovratka) 
         VALUES (NULL,'".$_REQUEST["naziv"]."',".intval($_REQUEST["brojDana"]).")"
        );

}