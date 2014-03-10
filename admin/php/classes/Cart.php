<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/03/14
 * Time: 21:42
 */

class Cart implements JsonSerializable{

    protected $items = [];

    protected $amount = 0;

    public function __construct()
    {

    }

    public function updateItem($itemId, $quantity=1)
    {
        if(!array_key_exists($itemId, $this->items) && $quantity > 0){
            $this->items[$itemId] = ["id"=>$itemId, "quantity"=>$quantity];
            return true;
        }
        if(array_key_exists($itemId, $this->items) ) {
            if($quantity > 0 || $quantity < 0){
                $this->items[$itemId]["quantity"]+= $quantity;
            } else {
                unset($this->items[$itemId]);
            }
        }
        return true;
    }

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    public function getItem($id)
    {
        return array_key_exists($id, $this->items) ? $this->items[$id] : null;
    }

    public function getNumItems()
    {
        $num = 0;

        foreach($this->items as $item){
            $num += $item["quantity"];
        }

        return $num;
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
        return $this->items;
    }
}
