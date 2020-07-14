<?php

class Client
{

    private $_id_cl;
    private $_fullname_cl;
    private $_imagen; 
    private $_email_cl; 
    private $_user_cl; 
    private $_pass_cl; 
    private $_state_cl; 
    private $_idservices; 
    private $_services;

    function __construct()
    {
        
    }





    /**
     * @return mixed
     */
    public function getIdCl()
    {
        return $this->_id_cl;
    }

    /**
     * @param mixed $_id_cl
     *
     * @return self
     */
    public function setIdCl($_id_cl)
    {
        $this->_id_cl = $_id_cl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFullnameCl()
    {
        return $this->_fullname_cl;
    }

    /**
     * @param mixed $_fullname_cl
     *
     * @return self
     */
    public function setFullnameCl($_fullname_cl)
    {
        $this->_fullname_cl = $_fullname_cl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->_imagen;
    }

    /**
     * @param mixed $_imagen
     *
     * @return self
     */
    public function setImagen($_imagen)
    {
        $this->_imagen = $_imagen;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailCl()
    {
        return $this->_email_cl;
    }

    /**
     * @param mixed $_email_cl
     *
     * @return self
     */
    public function setEmailCl($_email_cl)
    {
        $this->_email_cl = $_email_cl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserCl()
    {
        return $this->_user_cl;
    }

    /**
     * @param mixed $_user_cl
     *
     * @return self
     */
    public function setUserCl($_user_cl)
    {
        $this->_user_cl = $_user_cl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassCl()
    {
        return $this->_pass_cl;
    }

    /**
     * @param mixed $_pass_cl
     *
     * @return self
     */
    public function setPassCl($_pass_cl)
    {
        $this->_pass_cl = $_pass_cl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStateCl()
    {
        return $this->_state_cl;
    }

    /**
     * @param mixed $_state_cl
     *
     * @return self
     */
    public function setStateCl($_state_cl)
    {
        $this->_state_cl = $_state_cl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdservices()
    {
        return $this->_idservices;
    }

    /**
     * @param mixed $_idservices
     *
     * @return self
     */
    public function setIdservices($_idservices)
    {
        $this->_idservices = $_idservices;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->_services;
    }

    /**
     * @param mixed $_services
     *
     * @return self
     */
    public function setServices($_services)
    {
        $this->_services = $_services;

        return $this;
    }
}
?>