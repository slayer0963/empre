<?php

/**
 * 
 */
class Size 
{

	private $id_size;
	private $number_size;
	private $name_size;
	private $state_size;

	
	function __construct()
    {
        
    }



    
    public function getIdSize()
    {
        return $this->id_size;
    }

    
    public function setIdSize($id_size)
    {
        $this->id_size = $id_size;

        return $this;
    }

    
    public function getNumberSize()
    {
        return $this->number_size;
    }

    
    public function setNumberSize($number_size)
    {
        $this->number_size = $number_size;

        return $this;
    }

    
    public function getNameSize()
    {
        return $this->name_size;
    }

    
    public function setNameSize($name_size)
    {
        $this->name_size = $name_size;

        return $this;
    }

    
    public function getStateSize()
    {
        return $this->state_size;
    }

    
    public function setStateSize($state_size)
    {
        $this->state_size = $state_size;

        return $this;
    }
}

?>