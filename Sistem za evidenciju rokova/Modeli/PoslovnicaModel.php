<?php


class PoslovnicaModel
{
    private $naziv;
    private $spisakRadnika = array(RadnikModel::class);
    private $spisakDobavljaca = array(DobavljacModel::class);
    private $proizvodiZaVracanje = array(ProizvodModel::class);

    public function __construct(){

    }

    public function dobijNaziv()
    {
        return $this->naziv;
    }


    public function postaviNaziv($naziv): void
    {
        $this->naziv = $naziv;
    }

    public function dobijSpisakRadnika(): array
    {
        return $this->spisakRadnika;
    }


    public function postaviSpisakRadnika(array $spisakRadnika): void
    {
        $this->spisakRadnika = $spisakRadnika;
    }

    public function dobijSpisakDobavljaca(): array
    {
        return $this->spisakDobavljaca;
    }


    public function postaviSpisakDobavljaca(array $spisakDobavljaca): void
    {
        $this->spisakDobavljaca = $spisakDobavljaca;
    }

    public function dobijProizvodiZaVracanje(): array
    {
        return $this->proizvodiZaVracanje;
    }


    public function postaviProizvodiZaVracanje(array $proizvodiZaVracanje): void
    {
        $this->proizvodiZaVracanje = $proizvodiZaVracanje;
    }


    public function dodajNovogRadnika(RadnikModel $radnik) {

    }
    public function izmeniRadnika(RadnikModel $radnik) {

    }
    public function dodajNoviProizvod(ProizvodModel $proizvod) {

    }
    public function dodajNovogDobavljaca(DobavljacModel $dobavljac) {

    }

}