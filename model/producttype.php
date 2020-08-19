<?php

class ProductType
{
	private $_id_tpro;
    private $_name_tpro;
	private $_state_tpro;
    private $_logo;
    function __construct()
    {
        
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


    public function getNameTpro()
    {
        return $this->_name_tpro;
    }


    public function setNameTpro($_name_tpro)
    {
        $this->_name_tpro = $_name_tpro;

        return $this;
    }

    public function getStateTpro()
    {
        return $this->_state_tpro;
    }


    public function setStateTpro($_state_tpro)
    {
        $this->_state_tpro = $_state_tpro;

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