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
    isset($_REQUEST["nazivGrada"])
){
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "INSERT INTO grad(GRAD_ID, GRAD_Naziv) 
         VALUES (NULL,'".$_REQUEST["nazivGrada"]."')"
    );

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "INSERT INTO poslovnica(POS_ID, GRAD_ID, POS_Naziv) 
         VALUES (NULL,".Konekcija::dajInstancu()->poslednjiID().",'".$_REQUEST["naziv"]."')"
        );

}else
    echo 'dadas';