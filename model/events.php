<?php


class Event
{
	private $_id_event;
	private $_name_e;
	private $_img;
	private $_details;
	private $_releasedate;
	private $_finishdate;
 	private $_state_event;


	function __construct()
	{
		
	}


    public function getIdEvent()
    {
        return $this->_id_event;
    }


    public function setIdEvent($_id_event)
    {
        $this->_id_event = $_id_event;

        return $this;
    }


    public function getImg()
    {
        return $this->_img;
    }


    public function setImg($_img)
    {
        $this->_img = $_img;

        return $this;
    }


    public function getDetails()
    {
        return $this->_details;
    }


    public function setDetails($_details)
    {
        $this->_details = $_details;

        return $this;
    }

    public function getReleasedate()
    {
        return $this->_releasedate;
    }


    public function setReleasedate($_releasedate)
    {
        $this->_releasedate = $_releasedate;

        return $this;
    }


    public function getFinishdate()
    {
        return $this->_finishdate;
    }


    public function setFinishdate($_finishdate)
    {
        $this->_finishdate = $_finishdate;

        return $this;
    }


    public function getStateEvent()
    {
        return $this->_state_event;
    }


    public function setStateEvent($_state_event)
    {
        $this->_state_event = $_state_event;

        return $this;
    }


    public function getNameE()
    {
        return $this->_name_e;
    }


    public function setNameE($_name_e)
    {
        $this->_name_e = $_name_e;

        return $this;
    }
}


?>