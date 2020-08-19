<?php

class Color
{
	private $_color_id;
    private $_code_color;
	private $_color_name;
	private $_color_state;

    function __construct()
    {
        
    }



    public function getColorId()
    {
        return $this->_color_id;
    }


    public function setColorId($_color_id)
    {
        $this->_color_id = $_color_id;

        return $this;
    }

    public function getCodeColor()
    {
        return $this->_code_color;
    }


    public function setCodeColor($_code_color)
    {
        $this->_code_color = $_code_color;

        return $this;
    }

    public function getColorName()
    {
        return $this->_color_name;
    }


    public function setColorName($_color_name)
    {
        $this->_color_name = $_color_name;

        return $this;
    }


    public function getColorState()
    {
        return $this->_color_state;
    }


    public function setColorState($_color_state)
    {
        $this->_color_state = $_color_state;

        return $this;
    }
}
?>