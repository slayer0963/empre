<?php

class Userhome
{
	private $_id_bus;


    function __construct()
    {
        
    }




    public function getIdBus()
    {
        return $this->_id_bus;
    }


    public function setIdBus($_id_bus)
    {
        $this->_id_bus = $_id_bus;

        return $this;
    }
}
?>