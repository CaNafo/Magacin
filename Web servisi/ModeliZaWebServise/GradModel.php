<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 14.1.2020.
 * Time: 20.49
 */

class GradModel implements JsonSerializable
{
    private $gradID;
    private $gradNaziv;

    /**
     * @return mixed
     */
    public function dobijGradID()
    {
        return $this->gradID;
    }

    /**
     * @param mixed $gradID
     */
    public function postaviGradID($gradID): void
    {
        $this->gradID = $gradID;
    }

    /**
     * @return mixed
     */
    public function dobijGradNaziv()
    {
        return $this->gradNaziv;
    }

    /**
     * @param mixed $gradNaziv
     */
    public function postaviGradNaziv($gradNaziv): void
    {
        $this->gradNaziv = $gradNaziv;
    }


    public function jsonSerialize()
    {
        return [
            "ID"=>$this->dobijGradID(),
            "naziv"=>$this->dobijGradNaziv()
                ];
    }
}