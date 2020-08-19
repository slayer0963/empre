<?php

class UserType
{
	private $_id_ustp;
    private $_name_ustp;
	private $_state_ustp;

    function __construct()
    {
        
    }



    public function getIdUstp()
    {
        return $this->_id_ustp;
    }


    public function setIdUstp($_id_ustp)
    {
        $this->_id_ustp = $_id_ustp;

        return $this;
    }


    public function getNameUstp()
    {
        return $this->_name_ustp;
    }


    public function setNameUstp($_name_ustp)
    {
        $this->_name_ustp = $_name_ustp;

        return $this;
    }


    public function getStateUstp()
    {
        return $this->_state_ustp;
    }


    public function setStateUstp($_state_ustp)
    {
        $this->_state_ustp = $_state_ustp;

        return $this;
    }
}
?>