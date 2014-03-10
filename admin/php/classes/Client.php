<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/03/14
 * Time: 21:32
 */

class Client implements JsonSerializable{

    const IS_ANONYMOUS = 0;
    const IS_AUTHENTIFIED = 1;

    protected $statusString = [
        self::IS_ANONYMOUS=>"anonymous",
        self::IS_AUTHENTIFIED=>"authentified",
    ];
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $status;

    public function __construct()
    {

    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }



    public function statusToString($num = 0)
    {
        return array_key_exists($num, $this->statusString) ? $this->statusString[$num] : $this->statusString[self::IS_ANONYMOUS];
    }


    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return [
            "id"=>$this->id,
            "status"=>$this->status,
            "statusName"=>$this->statusToString($this->status),
        ];
    }
}
