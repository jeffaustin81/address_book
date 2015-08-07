<?php
class Contact
{
    private $name;
    private $phone;
    private $address;

    function __construct($new_name, $new_phone, $new_address)
    {
        $this->name = $new_name;
        $this->phone = $new_phone;
        $this->address = $new_address;
    }

    function setName($set_name)
    {
        $this->name = (string) $set_name;
    }
    function getName($get_name)
    {
        return $this->name;
    }
    function setPhone($set_phone)
    {
        $this->phone = (string) $set_phone;
    }
    function getPhone($get_phone)
    {
        return $this->phone;
    }
    function setAddress($set_address)
    {
        $this->address = (string) $set_address;
    }
    function getAddress($get_address)
    {
        return $this->address;
    }






}
?>
