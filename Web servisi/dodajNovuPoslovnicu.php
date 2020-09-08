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
    isset($_REQUEST["gradID"])
){

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "INSERT INTO poslovnica(POS_ID, GRAD_ID, POS_Naziv) 
         VALUES (NULL,".intval($_REQUEST["gradID"]).",'".$_REQUEST["naziv"]."')"
        );

}else
    echo 'dadas';