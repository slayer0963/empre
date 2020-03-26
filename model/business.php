<?php

class Business
{
	private $_id_bus;
	private $_name_bus;
	private $_pic_logo_bus;
    private $_id_user;
	private $_state_bus;

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


    public function getNameBus()
    {
        return $this->_name_bus;
    }


    public function setNameBus($_name_bus)
    {
        $this->_name_bus = $_name_bus;

        return $this;
    }


    public function getPicLogoBus()
    {
        return $this->_pic_logo_bus;
    }


    public function setPicLogoBus($_pic_logo_bus)
    {
        $this->_pic_logo_bus = $_pic_logo_bus;

        return $this;
    }


    public function getStateBus()
    {
        return $this->_state_bus;
    }


    public function setStateBus($_state_bus)
    {
        $this->_state_bus = $_state_bus;

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
}

