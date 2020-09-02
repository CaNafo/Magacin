<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 12.1.2020.
 * Time: 15.35
 */
require 'Konekcija.php';

if(isset($_REQUEST['ime']) and
    isset($_REQUEST["sifra"]) and
    isset($_REQUEST["poslovnicaID"]) and
    isset($_REQUEST["uloge"])
){
    $query = "CALL dodajNovogRadnika(?,?,?)";
    $db = Konekcija::dajInstancu()->dajKonekciju();
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssi', $_REQUEST['ime'], md5($_REQUEST['sifra']), $_REQUEST['poslovnicaID']);
    $stmt->execute();

    echo "radi";
    $jsonArray = json_decode($_REQUEST["uloge"],true);

    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT RADNIK_ID FROM radnik ORDER BY RADNIK_ID DESC");

    $id;

    while($row = $result->fetch_assoc()){
        $id = $row["RADNIK_ID"];
        break;
    }

    foreach ($jsonArray as $uloga){
        $result = Konekcija::dajInstancu()->izvrsiUpit(
            "INSERT INTO listauloga (UL_ID, RADNIK_ID) VALUES (".$uloga.",".$id.")");
    }

}