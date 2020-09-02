<?php
/**
 * Created by PhpStorm.
 * User: Ca
 * Date: 14.1.2020.
 * Time: 20.49
 */

class UlogaModel implements JsonSerializable
{
    private $ulogaID;
    private $ulogaNaziv;

    /**
     * @return mixed
     */
    public function getUlogaID()
    {
        return $this->ulogaID;
    }

    /**
     * @param mixed $ulogaID
     */
    public function setUlogaID($ulogaID): void
    {
        $this->ulogaID = $ulogaID;
    }

    /**
     * @return mixed
     */
    public function getUlogaNaziv()
    {
        return $this->ulogaNaziv;
    }

    /**
     * @param mixed $ulogaNaziv
     */
    public function setUlogaNaziv($ulogaNaziv): void
    {
        $this->ulogaNaziv = $ulogaNaziv;
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
            "ID"=>$this->getUlogaID(),
            "naziv"=>$this->getUlogaNaziv()
                ];
    }
}