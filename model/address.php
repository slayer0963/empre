<?php


class Address
{
	private $_id_add;
	private $_id_cl;
	private $_contact;
	private $_department;
	private $_city;
 	private $_streetdir;
 	private $_numberdir;
 	private $_reference;
 	private $_activestate;
	private $_state;

	function __construct()
	{
		
	}




    /**
     * @return mixed
     */
    public function getIdAdd()
    {
        return $this->_id_add;
    }

    /**
     * @param mixed $_id_add
     *
     * @return self
     */
    public function setIdAdd($_id_add)
    {
        $this->_id_add = $_id_add;

        return $this;
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
    public function getContact()
    {
        return $this->_contact;
    }

    /**
     * @param mixed $_contact
     *
     * @return self
     */
    public function setContact($_contact)
    {
        $this->_contact = $_contact;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->_department;
    }

    /**
     * @param mixed $_department
     *
     * @return self
     */
    public function setDepartment($_department)
    {
        $this->_department = $_department;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param mixed $_city
     *
     * @return self
     */
    public function setCity($_city)
    {
        $this->_city = $_city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetdir()
    {
        return $this->_streetdir;
    }

    /**
     * @param mixed $_streetdir
     *
     * @return self
     */
    public function setStreetdir($_streetdir)
    {
        $this->_streetdir = $_streetdir;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberdir()
    {
        return $this->_numberdir;
    }

    /**
     * @param mixed $_numberdir
     *
     * @return self
     */
    public function setNumberdir($_numberdir)
    {
        $this->_numberdir = $_numberdir;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->_reference;
    }

    /**
     * @param mixed $_reference
     *
     * @return self
     */
    public function setReference($_reference)
    {
        $this->_reference = $_reference;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivestate()
    {
        return $this->_activestate;
    }

    /**
     * @param mixed $_activestate
     *
     * @return self
     */
    public function setActivestate($_activestate)
    {
        $this->_activestate = $_activestate;

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