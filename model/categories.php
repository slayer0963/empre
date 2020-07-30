<?php

class Categories
{
	private $_id_cat;
    private $_name_cat;
	private $_state_cat;
    private $_logo;

    function __construct()
    {
        
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


    public function getNameCat()
    {
        return $this->_name_cat;
    }


    public function setNameCat($_name_cat)
    {
        $this->_name_cat = $_name_cat;

        return $this;
    }


    public function getStateCat()
    {
        return $this->_state_cat;
    }


    public function setStateCat($_state_cat)
    {
        $this->_state_cat = $_state_cat;

        return $this;
    }


    public function getLogo()
    {
        return $this->_logo;
    }


    public function setLogo($_logo)
    {
        $this->_logo = $_logo;

        return $this;
    }
}
?>