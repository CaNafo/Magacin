<?php


class ProizvodModel implements JsonSerializable
{
    private $proizvodID;
    private $naziv;
    private $datumIsteka;
    private $dobavljacNaziv;
    private $granicaPovratka;


    public function dobijProizvodID()
    {
        return $this->proizvodID;
    }


    public function postaviProizvodID($proizvodID): void
    {
        $this->proizvodID = $proizvodID;
    }


    public function dobijNaziv()
    {
        return $this->naziv;
    }


    public function postaviNaziv($naziv): void
    {
        $this->naziv = $naziv;
    }

    public function dobijdobavljacNaziv()
    {
        return $this->dobavljacNaziv;
    }


    public function postavidobavljacNaziv($dobavljacNaziv): void
    {
        $this->dobavljacNaziv = $dobavljacNaziv;
    }

    public function dobijgranicaPovratka()
    {
        return $this->granicaPovratka;
    }


    public function postavigranicaPovratka($granicaPovratka): void
    {
        $this->granicaPovratka = $granicaPovratka;
    }

    public function dobijDatumIsteka()
    {
        return $this->datumIsteka;
    }


    public function postaviDatumIsteka($datumIsteka): void
    {
        $this->datumIsteka = $datumIsteka;
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
            'ID'=> $this->dobijProizvodID(),
            'naziv'=> $this->dobijNaziv(),
            'dobavljacNaziv' => $this->dobijdobavljacNaziv(),
            'datumIsteka' => $this->dobijDatumIsteka(),
            'granicaPovratka' => $this->dobijgranicaPovratka()
        ];
    }
}