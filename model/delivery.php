<?php


class Delivery
{
	private $_id_delivery;
	private $_status_delivery;


	function __construct()
	{
		
	}


    public function getIdDelivery()
    {
        return $this->_id_delivery;
    }


    public function setIdDelivery($_id_delivery)
    {
        $this->_id_delivery = $_id_delivery;

        return $this;
    }


    public function getStatusDelivery()
    {
        return $this->_status_delivery;
    }


    public function setStatusDelivery($_status_delivery)
    {
        $this->_status_delivery = $_status_delivery;

        return $this;
    }
}

?>