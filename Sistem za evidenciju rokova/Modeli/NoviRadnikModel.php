<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 14.1.2020.
 * Time: 20.09
 */

class NoviRadnikModel implements JsonSerializable
{
    private $ime;
    private $uloge;
    private $lozinka;
    private $idPoslovnice;

    public function __construct()
    {
        $this->uloge = array();
    }

    /**
     * @param mixed $lozinka
     */
    public function postaviLozinku($lozinka): void
    {
        $this->lozinka = $lozinka;
    }

    /**
     * @return mixed
     */
    public function dobijLozinku()
    {
        return $this->lozinka;
    }

    public function dobijIme()
    {
        return $this->ime;
    }

    /**
     * @return mixed
     */
    public function dobijIdPoslovnice()
    {
        return $this->idPoslovnice;
    }

    /**
     * @param mixed $idPoslovnice
     */
    public function postaviIdPoslovnice($idPoslovnice): void
    {
        $this->idPoslovnice = $idPoslovnice;
    }

    public function postaviIme($ime): void
    {
        $this->ime = $ime;
    }


    public function dobijuloge(): array
    {
        return $this->uloge;
    }


    public function postaviuloge($uloge): void
    {
        $this->uloge = $uloge;
    }

    public function izmjeniIme($novoIme) {

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
            'ime'=> $this->dobijIme(),
            'uloge'=> $this->dobijuloge(),
            'sifra' => $this->dobijLozinku(),
            'idPoslovnice' => $this->dobijIdPoslovnice()
        ];
    }
}