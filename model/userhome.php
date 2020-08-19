<?php

class Userhome
{
	private $_id_bus;
    private $_id_pro;
    private $_id_user;
    private $_id_color;
    private $_id_mat;
    private $_id_size;
    private $_name_pro;
    private $_descr_pro;
    private $_id_cat;
    private $_id_tpro;
    private $_pur_price;
    private $_sal_price;
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

 
    public function getIdUser()
    {
        return $this->_id_user;
    }

 
    public function setIdUser($_id_user)
    {
        $this->_id_user = $_id_user;

        return $this;
    }


    public function getIdColor()
    {
        return $this->_id_color;
    }


    public function setIdColor($_id_color)
    {
        $this->_id_color = $_id_color;

        return $this;
    }


    public function getIdMat()
    {
        return $this->_id_mat;
    }


    public function setIdMat($_id_mat)
    {
        $this->_id_mat = $_id_mat;

        return $this;
    }


    public function getIdSize()
    {
        return $this->_id_size;
    }


    public function setIdSize($_id_size)
    {
        $this->_id_size = $_id_size;

        return $this;
    }




    public function getNamePro()
    {
        return $this->_name_pro;
    }


    public function setNamePro($_name_pro)
    {
        $this->_name_pro = $_name_pro;

        return $this;
    }

  
    public function getDescrPro()
    {
        return $this->_descr_pro;
    }


    public function setDescrPro($_descr_pro)
    {
        $this->_descr_pro = $_descr_pro;

        return $this;
    }


    public function getIdCat()
    {
        return $this->_id_cat;
    }


    public function setIdCat($_id_cat)
    {
        $this->_id_cat = $_id_cat;

        return $this;
    }


    public function getIdTpro()
    {
        return $this->_id_tpro;
    }


    public function setIdTpro($_id_tpro)
    {
        $this->_id_tpro = $_id_tpro;

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
}
?>