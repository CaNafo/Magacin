<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 01.38
 */

class PrivilegijeModel
{
    private $listaUloga;
    private $listaDozvola;

    public function __construct()
    {
        $this->listaUloga = array();
        $this->listaDozvola = array();
    }

    public function dobijDozvole(): array
    {
        return $this->listaDozvola;
    }


    public function dodajDozvole($dozvole): void
    {
        $this->listaDozvola=$dozvole;
    }

    public function dobijUloge(): array
    {
        return $this->listaUloga;
    }


    public function dodajUloge($uloge): void
    {
        $this->listaUloga = $uloge;
    }

}