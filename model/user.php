<?php

class User
{
	private $_id_user;
	private $_fullname_user;
	private $_phone_user;
	private $_imagen;
	private $_email_user;
	private $_user_user;
	private $_pass_user;
	private $_id_ustp;
	private $_state_user;

	function __construct()
    {
        
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

    public function getFullnameUser()
    {
        return $this->_fullname_user;
    }


    public function setFullnameUser($_fullname_user)
    {
        $this->_fullname_user = $_fullname_user;

        return $this;
    }


    public function getPhoneUser()
    {
        return $this->_phone_user;
    }


    public function setPhoneUser($_phone_user)
    {
        $this->_phone_user = $_phone_user;

        return $this;
    }


    public function getImagen()
    {
        return $this->_imagen;
    }


    public function setImagen($_imagen)
    {
        $this->_imagen = $_imagen;

        return $this;
    }


    public function getEmailUser()
    {
        return $this->_email_user;
    }


    public function setEmailUser($_email_user)
    {
        $this->_email_user = $_email_user;

        return $this;
    }


    public function getUserUser()
    {
        return $this->_user_user;
    }


    public function setUserUser($_user_user)
    {
        $this->_user_user = $_user_user;

        return $this;
    }


    public function getPassUser()
    {
        return $this->_pass_user;
    }


    public function setPassUser($_pass_user)
    {
        $this->_pass_user = $_pass_user;

        return $this;
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


    public function getStateUser()
    {
        return $this->_state_user;
    }


    public function setStateUser($_state_user)
    {
        $this->_state_user = $_state_user;

        return $this;
    }
}

