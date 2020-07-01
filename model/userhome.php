<?php

class Userhome
{
	private $_id_bus;
    private $_id_pro;
    private $_id_user;
    private $_id_color;
    private $_id_mat;
    private $_id_size;

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
}
?>