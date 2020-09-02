<?php


class DobavljacModel implements JsonSerializable
{

    private  $dobavljacID;
    private  $naziv;
    private  $granicaPovratka;


    public function getDobavljacID()
    {
        return $this->dobavljacID;
    }


    public function setDobavljacID($dobavljacID): void
    {
        $this->dobavljacID = $dobavljacID;
    }


    public function getNaziv()
    {
        return $this->naziv;
    }


    public function setNaziv($naziv): void
    {
        $this->naziv = $naziv;
    }


    public function getGranicaPovratka()
    {
        return $this->granicaPovratka;
    }


    public function setGranicaPovratka($granicaPovratka): void
    {
        $this->granicaPovratka = $granicaPovratka;
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
            'ID'=> $this->getDobavljacID(),
            'ime'=> $this->getNaziv(),
            'granica' => $this->getGranicaPovratka()
        ];
    }
}