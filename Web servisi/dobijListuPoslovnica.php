<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 10.23
 */
require 'Konekcija.php';
include 'ModeliZaWebServise/PoslovnicaModel.php';

if (!isset($_REQUEST['q']))
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM poslovnica LEFT JOIN grad on poslovnica.GRAD_ID=grad.GRAD_ID");
else
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM poslovnica LEFT JOIN grad on poslovnica.GRAD_ID=grad.GRAD_ID WHERE POS_Naziv LIKE \"" . $_REQUEST['q'] . "%\"");

$poslovnica = new PoslovnicaModel();
$listaPoslovnica = array();

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc()) {
        $poslovnica->setPoslovnicaID($row['POS_ID']);
        $poslovnica->setNaziv($row['POS_Naziv']);

        if($row['GRAD_Naziv']!=null)
            $poslovnica->setGradNaziv($row['GRAD_Naziv']);
        else
            $poslovnica->setGradNaziv("Grad nije unijet");

        $json = json_encode( $poslovnica->jsonSerialize());
        $listaPoslovnica[]=$json;
    }

    $jsonArray = json_encode($listaPoslovnica,true);

    echo $jsonArray;
}
