<?php

class Userhome
{
	private $_id_bus;
    private $_id_pro;

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


    public function getIdPro()
    {
        return $this->_id_pro;
    }

 
    public function setIdPro($_id_pro)
    {
        $this->_id_pro = $_id_pro;

        return $this;
    }
}
?>