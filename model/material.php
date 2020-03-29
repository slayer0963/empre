<?php

/**
 * 
 */
class Material
{

	private $id_material;
	private $name_mat;
	private $state_mat;
	
	function __construct()
	{
		
	}



    
    public function getIdMaterial()
    {
        return $this->id_material;
    }

    
    public function setIdMaterial($id_material)
    {
        $this->id_material = $id_material;

        return $this;
    }

    
    public function getNameMat()
    {
        return $this->name_mat;
    }

    
    public function setNameMat($name_mat)
    {
        $this->name_mat = $name_mat;

        return $this;
    }

    
    public function getStateMat()
    {
        return $this->state_mat;
    }

    
    public function setStateMat($state_mat)
    {
        $this->state_mat = $state_mat;

        return $this;
    }
}

?>