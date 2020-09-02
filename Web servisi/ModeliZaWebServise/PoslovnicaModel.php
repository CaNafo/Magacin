<?php


class PoslovnicaModel implements JsonSerializable
{
    private $poslovnicaID;
    private $naziv;
    private $gradNaziv;

    
    public function getPoslovnicaID()
    {
        return $this->poslovnicaID;
    }


    public function setPoslovnicaID($poslovnicaID): void
    {
        $this->poslovnicaID = $poslovnicaID;
    }

    public function getNaziv()
    {
        return $this->naziv;
    }


    public function setNaziv($naziv): void
    {
        $this->naziv = $naziv;
    }

    public function getGradNaziv()
    {
        return $this->gradNaziv;
    }


    public function setGradNaziv($gradNaziv): void
    {
        $this->gradNaziv = $gradNaziv;
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
            'ID'=> $this->getPoslovnicaID(),
            'naziv'=> $this->getNaziv(),
            'gradNaziv' => $this->getGradNaziv()
        ];
    }
}