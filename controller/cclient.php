<?php
	require_once "../model/daoclient.php";


	$page = isset($_GET['btnvalidate'])?$_GET['btnvalidate']:'';
	if($page=='getDirection'){
	    $dat=new DAOClient();
	    $dat->getValidateDirection($_REQUEST['idcliente']);
	}


	$page = isset($_GET['btnaddcoment'])?$_GET['btnaddcoment']:'';
	if($page=='setcoment'){
	    $dat=new DAOClient();
	    $dat->setComent($_POST['idcliente'],$_POST['idprod'],$_POST['comentario'],$_POST['valoracion']);
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDetailsColor'){
	    $dat=new DAOClient();
	    echo json_encode($dat->getDetailsColor($_POST['id']));
	}


	$page = isset($_GET['btngetcoment'])?$_GET['btngetcoment']:'';
	if($page=='getcoment'){
	    $dat=new DAOClient();
	    echo json_encode($dat->getcoment($_POST['id']));
	}
?>