<?php
	require_once "../model/daoaproduct.php";


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataU'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataU());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataB'){
	    $dat=new DAOAproduct();
	    $id_user = $_POST['id'];
	    echo json_encode($dat->getDataB($id_user));
	}



	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataP'){
	    $dat=new DAOAproduct();
	    $id_bus = $_POST['id'];
	    echo json_encode($dat->getDataP($id_bus));
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataC'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataC());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataM'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataM());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataS'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataS());
	}


?>