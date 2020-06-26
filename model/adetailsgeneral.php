<?php

class Adetailsgeneral
{
	private $_id_prices;
	private $_id_color;
	private $_id_material;
	private $_id_size;
    private $_img;
	private $_quantity;
    private $_extraprice;
    private $_discount;
	private $_state;
	
	function __construct()
    {
        
    }

    


    /**
     * @return mixed
     */
    public function getIdPrices()
    {
        return $this->_id_prices;
    }

    /**
     * @param mixed $_id_prices
     *
     * @return self
     */
    public function setIdPrices($_id_prices)
    {
        $this->_id_prices = $_id_prices;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdColor()
    {
        return $this->_id_color;
    }

    /**
     * @param mixed $_id_color
     *
     * @return self
     */
    public function setIdColor($_id_color)
    {
        $this->_id_color = $_id_color;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMaterial()
    {
        return $this->_id_material;
    }

    /**
     * @param mixed $_id_material
     *
     * @return self
     */
    public function setIdMaterial($_id_material)
    {
        $this->_id_material = $_id_material;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSize()
    {
        return $this->_id_size;
    }

    /**
     * @param mixed $_id_size
     *
     * @return self
     */
    public function setIdSize($_id_size)
    {
        $this->_id_size = $_id_size;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->_img;
    }

    /**
     * @param mixed $_img
     *
     * @return self
     */
    public function setImg($_img)
    {
        $this->_img = $_img;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param mixed $_quantity
     *
     * @return self
     */
    public function setQuantity($_quantity)
    {
        $this->_quantity = $_quantity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtraprice()
    {
        return $this->_extraprice;
    }

    /**
     * @param mixed $_extraprice
     *
     * @return self
     */
    public function setExtraprice($_extraprice)
    {
        $this->_extraprice = $_extraprice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->_discount;
    }

    /**
     * @param mixed $_discount
     *
     * @return self
     */
    public function setDiscount($_discount)
    {
        $this->_discount = $_discount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $_state
     *
     * @return self
     */
    public function setState($_state)
    {
        $this->_state = $_state;

        return $this;
    }
}


?>