<?php
	require_once "../model/daouserhome.php";


	function getidpro(){
	    $obj=new Userhome();
	    $obj->setIdBus($_POST["id"]);;
	    return $obj;
	}

	$page = isset($_GET['btngetpro'])?$_GET['btngetpro']:'';
	if($page=='getData'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductUser(getidpro()));
	}



?>