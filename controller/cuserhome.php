<?php
	require_once "../model/daouserhome.php";


	function getidbuss(){
	    $obj=new Userhome();
	    $obj->setIdBus($_POST["id"]);;
	    return $obj;
	}

	$page = isset($_GET['btngetpro'])?$_GET['btngetpro']:'';
	if($page=='getData'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductUser(getidbuss()));
	}

	function getidpro(){
	    $obj=new Userhome();
	    $obj->setIdPro($_POST["id"]);;
	    return $obj;
	}

	$page = isset($_GET['btngetproid'])?$_GET['btngetproid']:'';
	if($page=='getData'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductUserid(getidpro()));
	}



?>