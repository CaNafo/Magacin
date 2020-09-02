<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 01.42
 */

require 'Konekcija.php';
include 'ModeliZaWebServise/PrivilegijeModel.php';
if(
    isset($_REQUEST['ID'])
)
{
    $privilegije = new PrivilegijeModel();
    $result = Konekcija::dajInstancu()->izvrsiUpit(
        "SELECT * FROM listauloga LEFT JOIN uloga on uloga.UL_ID=listauloga.UL_ID WHERE listauloga.RADNIK_ID='".$_REQUEST['ID']."'");

    if($result->num_rows>0)
    {
        while($row = $result->fetch_assoc()) {
            $privilegije->dodajUlogu($row["UL_Naziv"]);

            $odgovor_lista_dozvola = Konekcija::dajInstancu()->izvrsiUpit(
                "SELECT * FROM listadozvola WHERE UL_ID='".$row['UL_ID']."'");

            if( $odgovor_lista_dozvola->num_rows>0){
                while ($red_lista_dozvola = $odgovor_lista_dozvola->fetch_assoc()){

                    $odgovor_naziv_dozvole = Konekcija::dajInstancu()->izvrsiUpit(
                        "SELECT * FROM dozvola WHERE DOZ_ID='".$red_lista_dozvola["DOZ_ID"]."'");

                    if( $odgovor_naziv_dozvole->num_rows>0){
                        while ($red_naziv_dozvole = $odgovor_naziv_dozvole->fetch_assoc()){

                            $privilegije->dodajDozvolu($red_naziv_dozvole["DOZ_Naziv"]);
                        }
                    }
                }
            }
        }

    }

    $json = json_encode( $privilegije->jsonSerialize());
    echo $json;

}