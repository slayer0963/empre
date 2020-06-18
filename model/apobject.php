<?php

class Apobject
{
	private $_id_prices;
	private $_id_pro;
	private $_pur_price;
	private $_sal_price;
	private $_quantity ;
	private $_state_prices_pro;
	
	function __construct()
    {
        
    }



 
    public function getIdPrices()
    {
        return $this->_id_prices;
    }


    public function setIdPrices($_id_prices)
    {
        $this->_id_prices = $_id_prices;

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

    public function getPurPrice()
    {
        return $this->_pur_price;
    }


    public function setPurPrice($_pur_price)
    {
        $this->_pur_price = $_pur_price;

        return $this;
    }


    public function getSalPrice()
    {
        return $this->_sal_price;
    }


    public function setSalPrice($_sal_price)
    {
        $this->_sal_price = $_sal_price;

        return $this;
    }


    public function getQuantity()
    {
        return $this->_quantity;
    }


    public function setQuantity($_quantity)
    {
        $this->_quantity = $_quantity;

        return $this;
    }


    public function getStatePricesPro()
    {
        return $this->_state_prices_pro;
    }


    public function setStatePricesPro($_state_prices_pro)
    {
        $this->_state_prices_pro = $_state_prices_pro;

        return $this;
    }
}


?>