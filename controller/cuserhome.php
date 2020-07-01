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


	function update(){
	    $obj=new Business();
	     $obj->setIdBus($_POST["idbue"]);
	    $obj->setNameBus($_POST["namee"]);
		$obj->setPicLogoBus($_POST["imge"]);
		$obj->setIdUser($_POST["usere"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["filee"]["name"];
		$nombreTmpArchivo=$_FILES["filee"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (file_exists("../view/imgbusiness/$nombreArchivo")) {
		    return $obj;
		} else {
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
	    
	}

	$page = isset($_GET['btnsetDataBusie'])?$_GET['btnsetDataBusie']:'';
	if($page=='setData'){
	    $dat=new DAOUserhome();
	    $dat->setDataBusiEdit(update());
	}


	/*GET COLORS*/

	$page = isset($_GET['btngetcolors'])?$_GET['btngetcolors']:'';
	if($page=='getDatapc'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getColorsp(getidpro()));
	}

	/*GET MATERIALS*/

	function getIdbyMaterial()
	{
		$obj=new Userhome();
	    $obj->setIdPro($_POST["id"]);
	    $obj->setIdColor($_POST["idcolor"]);
	    return $obj;
	}

	$page = isset($_GET['btngetmaterials'])?$_GET['btngetmaterials']:'';
	if($page=='getDatamc'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getmaterialsp(getIdbyMaterial()));
	}

	function getIdbySizes()
	{
		$obj=new Userhome();
	    $obj->setIdPro($_POST["id"]);
	    $obj->setIdColor($_POST["idcolor"]);
	    $obj->setIdMat($_POST["idmat"]);
	    return $obj;
	}

	$page = isset($_GET['btngetsizes'])?$_GET['btngetsizes']:'';
	if($page=='getDatazc'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getsizesp(getIdbySizes()));
	}

	function getIdbyProduct()
	{
		$obj=new Userhome();
	    $obj->setIdPro($_POST["id"]);
	    $obj->setIdColor($_POST["idcolor"]);
	    $obj->setIdMat($_POST["idmat"]);
	    $obj->setIdSize($_POST["idsiz"]);
	    return $obj;
	}

	$page = isset($_GET['btngetProdsc'])?$_GET['btngetProdsc']:'';
	if($page=='getDataProc'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getDataProc(getIdbyProduct()));
	}

?>