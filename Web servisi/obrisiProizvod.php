<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 22.57
 */

require 'Konekcija.php';

if(isset($_REQUEST['ID'])){
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "DELETE from proizvodi WHERE PROIZ_ID=".$_REQUEST['ID']);
}