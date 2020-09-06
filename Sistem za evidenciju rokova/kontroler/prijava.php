<?php
include("../includes/session.php");
include "../PomocneKlase/ApiPoziv.php";
include "../PomocneKlase/ApiReferenca.php";
if(
    isset($_REQUEST['ime']) and
    isset($_REQUEST['sifra'])
) {
    $data = array("ime" => $_REQUEST['ime'],
        "sifra" => $_REQUEST['sifra']);

    $result = ApiPoziv::dajInstancu()->
                        pozoviApiServis("post", ApiReferenca::dajInstancu()->dajReferencu()."Web%20servisi/prijavaServis.php", $data);

    if(json_decode($result,true)['ID']!=null){
        $_SESSION['ime']=json_decode($result,true)['Ime'];
        $_SESSION['RADNIK_ID']=json_decode($result,true)['ID'];
        $_SESSION['POSLOVNICA_ID']=json_decode($result,true)['POS_ID'];

        header("Location: ../index.php");
    }else{
        header("Location: ../pogledi/prijavaForma.php");
    }

}
