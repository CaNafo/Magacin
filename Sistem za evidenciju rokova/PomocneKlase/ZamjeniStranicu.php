<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 17.22
 */

switch ($_REQUEST['q']){
    case "listaPoslovnica":
        echo include('..\pogledi\listaPoslovnica.php');
        break;

    case "listaRadnika":
        echo include('..\pogledi\listaRadnika.php');
        break;

    case "listaDobavljaca":
        echo include('..\pogledi\listaDobavljaca.php');
        break;

    case "dodajRadnika":
        echo include('..\pogledi\dodajRadnika.php');
        break;

    case "dodajProizvod":
        echo include('..\pogledi\dodajProizvod.php');
        break;

    case "dodajDobavljaca":
        echo include('..\pogledi\dodajDobavljaca.php');
        break;
}