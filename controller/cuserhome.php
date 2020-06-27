<?php
	require_once "../model/daouserhome.php";


	function getidbuss(){
	    $obj=new Userhome();
	    $obj->setIdBus($_POST["id"]);
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


	function getidus(){
	    $obj=new Userhome();
	    $obj->setIdUser($_POST["id"]);
	    return $obj;
	}
	$page = isset($_GET['btngetbusines'])?$_GET['btngetbusines']:'';
	if($page=='getDatab'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getBusiness(getidus()));
	}

	function insert(){
	    $obj=new Business();
	    $obj->setNameBus($_POST["name"]);
		$obj->setPicLogoBus($_POST["img"]);
		$obj->setIdUser($_POST["user"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["file"]["name"];
		$nombreTmpArchivo=$_FILES["file"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imgbusiness/$nombreArchivo")) {
				return $obj;
			}
			else{
				
				return "x";
			}
		}
		else
		{
			
			return "x";
		}
	    
	}

	$page = isset($_GET['btnsetDataBusi'])?$_GET['btnsetDataBusi']:'';
	if($page=='setData'){
	    $dat=new DAOUserhome();
	    $dat->setDataBusi(insert());
	}



?>