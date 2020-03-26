<?php

class Product
{
	private $_id_pro;
	private $_name_pro;
	private $_descr_pro;
	private $_id_cat;
	private $_id_tpro;
	private $_state_pro;
	function __construct()
    {
        
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


    public function getStatePro()
    {
        return $this->_state_pro;
    }


    public function setStatePro($_state_pro)
    {
        $this->_state_pro = $_state_pro;

        return $this;
    }
}
?>