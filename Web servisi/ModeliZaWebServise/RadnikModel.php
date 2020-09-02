<?php


class RadnikModel implements \JsonSerializable
{
    private $radnikID;
    private $poslovnicaID;
    private $ime;
    private $uloge;
    private $poslovnicaNaziv;

    public function __construct()
    {
        $this->uloge = array();
    }

    /**
     * @return mixed
     */
    public function dobijPoslovnicaNaziv()
    {
        return $this->poslovnicaNaziv;
    }

    /**
     * @param mixed $poslovnicaNaziv
     */
    public function postaviPoslovnicaNaziv($poslovnicaNaziv): void
    {
        $this->poslovnicaNaziv = $poslovnicaNaziv;
    }



    public function dobijRadnikID()
    {
        return $this->radnikID;
    }

    public function dobijUloge(): array
    {
        return $this->uloge;
    }


    public function dodajUlogu($uloga): void
    {
        array_push($this->uloge, $uloga);
    }


    public function postaviRadnikID($radnikID): void
    {
        $this->radnikID = $radnikID;
    }

    public function dobijPoslovnicaID()
    {
        return $this->poslovnicaID;
    }

    public function postaviPoslovnicaID($poslovnicaID): void
    {
        $this->poslovnicaID = $poslovnicaID;
    }


    public function dobijIme()
    {
        return $this->ime;
    }


    public function postaviIme($ime): void
    {
        $this->ime = $ime;
    }

    public function izmeniIme($novoIme) {

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
            'ID'=> $this->dobijRadnikID(),
            'POS_ID'=> $this->dobijPoslovnicaID(),
            'Ime' => $this->dobijIme(),
            'Uloge' => $this->dobijUloge(),
            'PoslovnicaNaziv' => $this->dobijPoslovnicaNaziv()
        ];
    }
}