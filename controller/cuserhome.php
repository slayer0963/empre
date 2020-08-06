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

	$page = isset($_GET['btngetpro'])?$_GET['btngetpro']:'';
	if($page=='getDatac'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductClient(getidbuss()));
	}

		$page = isset($_GET['btngetpro'])?$_GET['btngetpro']:'';
	if($page=='getDataall'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductall());
	}


	$page = isset($_GET['btngetpro'])?$_GET['btngetpro']:'';
	if($page=='getDatacbr'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductClientbyrange($_POST["id"],$_POST["range"]));
	}

	$page = isset($_GET['btngetprotp'])?$_GET['btngetprotp']:'';
	if($page=='getDatactp'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductClientbytype($_POST["id"],$_POST["type"]));
	}

	$page = isset($_GET['btngetprotpcat'])?$_GET['btngetprotpcat']:'';
	if($page=='getDatactpandcat'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getProductClientbytypeandcat($_POST["id"],$_POST["type"],$_POST["cat"]));
	}

	$page = isset($_GET['btngettype'])?$_GET['btngettype']:'';
	if($page=='getDatatype'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getDatatype($_POST["id"]));
	}

	$page = isset($_GET['btngetcategories'])?$_GET['btngetcategories']:'';
	if($page=='getDatacategories'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getDatacategories($_POST["id"]));
	}

	$page = isset($_GET['btnreaction'])?$_GET['btnreaction']:'';
	if($page=='setreaction'){
	    $dat=new DAOUserhome();
	    $dat->setReaction($_POST["id_cl"],$_POST["id_prev"]);
	}

	$page = isset($_GET['btngetcategoriesbtype'])?$_GET['btngetcategoriesbtype']:'';
	if($page=='getDatacategoriesbytype'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getDatacategoriesbytype($_POST["id"],$_POST['type']));
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
		$obj->setDescription($_POST["descrip"]);
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
		$obj->setDescription($_POST["descripe"]);
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

/*cart and wish*/
	$page = isset($_GET['btngetcart'])?$_GET['btngetcart']:'';
	if($page=='getcart'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getcart($_POST['id']));
	}


	$page = isset($_GET['btngetwish'])?$_GET['btngetwish']:'';
	if($page=='getwish'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getwish($_POST['id']));
	}
/**/

	$page = isset($_GET['btngetProdsc'])?$_GET['btngetProdsc']:'';
	if($page=='getDataProcCli'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getDataProcCli(getIdbyProduct()));
	}




	/*VALIDA PRODUCT*/

	$page = isset($_GET['btnvalidatepro'])?$_GET['btnvalidatepro']:'';
	if($page=='getvaData'){
	    $dat=new DAOUserhome();
	    echo json_encode($dat->getvaData(getidbuss()));
	}



	/*insert product*/
	function insertproduct(){
	    $obj=new Userhome();
	    $obj->setIdBus($_POST["idbusinp"]);
	    $obj->setNamePro($_POST["namep"]);
		$obj->setDescrPro($_POST["descrip"]);
		$obj->setPurPrice($_POST["pcompra"]);
	    $obj->setSalPrice($_POST["pventa"]);
		$obj->setIdCat($_POST["cat"]);
		$obj->setIdTpro($_POST["tp"]);
	    return $obj;
	}

	$page = isset($_GET['btnsetDataproduct'])?$_GET['btnsetDataproduct']:'';
	if($page=='setDataproduct'){
	    $dat=new DAOUserhome();
	    $dat->setDataproduct(insertproduct());
	}


	$page = isset($_GET['btnsetDataproduct'])?$_GET['btnsetDataproduct']:'';
	if($page=='setDataproduct'){
	    $dat=new DAOUserhome();
	    $dat->setDataproduct(insertproduct());
	}

	$page = isset($_GET['btnModificar'])?$_GET['btnModificar']:'';
	if($page=='modificarCantidadCart'){
	    $dat=new DAOUserhome();
	    $dat->updatequantityshop($_REQUEST['id_detalle_carrito'],$_REQUEST['cantidad']);
	}

	$page = isset($_GET['btnVenta'])?$_GET['btnVenta']:'';
	if($page=='modificarCantidadInv'){
	    $dat=new DAOUserhome();
	    $dat->updateinv($_REQUEST['id_prices'],$_REQUEST['id_color'],$_REQUEST['id_material'],$_REQUEST['id_size'],$_REQUEST['val']);
	}


	$page = isset($_GET['btnVenta'])?$_GET['btnVenta']:'';
	if($page=='modificarStatusCart'){
	    $dat=new DAOUserhome();
	    $dat->updateStatusCart($_REQUEST['id_car']);
	}

	$page = isset($_GET['btnEliminar'])?$_GET['btnEliminar']:'';
	if($page=='eliminar'){
	    $dat=new DAOUserhome();
	    $dat->deleteshop($_REQUEST['id_detalle_carrito']);
	}



	$page = isset($_GET['btnEliminar'])?$_GET['btnEliminar']:'';
	if($page=='eliminarwish'){
	    $dat=new DAOUserhome();
	    $dat->deletewish($_REQUEST['id_detalle_wish']);
	}

	// add product car
	$page = isset($_GET['btnsetshcar'])?$_GET['btnsetshcar']:'';
	if($page=='setshcar'){
	    $dat=new DAOUserhome();
	    $dat->setcarshop($_POST['idcliet'],$_POST['pfidprices'],$_POST['pfcolor'],$_POST['pfmaterial'],$_POST['pfsize'],$_POST['pfprices'],$_POST['discount']);
	}

	// add product wish
	$page = isset($_GET['btnsetwish'])?$_GET['btnsetwish']:'';
	if($page=='setwish'){
	    $dat=new DAOUserhome();
	    $dat->setwishlist($_POST['idcliet'],$_POST['pfidprices'],$_POST['pfcolor'],$_POST['pfmaterial'],$_POST['pfsize'],$_POST['pfprices'],$_POST['discount']);
	}
?>