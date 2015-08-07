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
    function getName()
    {
        return $this->name;
    }
    function setPhone($set_phone)
    {
        $this->phone = (string) $set_phone;
    }
    function getPhone()
    {
        return $this->phone;
    }
    function setAddress($set_address)
    {
        $this->address = (string) $set_address;
    }
    function getAddress()
    {
        return $this->address;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }

}
?>
