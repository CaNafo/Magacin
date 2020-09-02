<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 8.1.2020.
 * Time: 01.38
 */

class PrivilegijeModel implements JsonSerializable
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


    public function dodajDozvolu($uloga): void
    {
        //Provjera da li je identicna dozvola vec upisana
        if(!in_array($uloga,$this->listaDozvola))
            array_push($this->listaDozvola, $uloga);
    }

    public function dobijUloge(): array
    {
        return $this->listaUloga;
    }


    public function dodajUlogu($uloga): void
    {
        array_push($this->listaUloga, $uloga);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'Uloge' => $this->dobijUloge(),
            'Dozvole' => $this->dobijDozvole()
        ];
    }
}