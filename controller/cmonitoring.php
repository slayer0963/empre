<?php
	require_once "../model/daomonitoring.php";


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartone'){
	    $dat=new DAOMonitor();
	    echo json_encode($dat->getDatachartone());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatacharttwo'){
	    $dat=new DAOMonitor();
	    echo json_encode($dat->getDatacharttwo());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartthree'){
	    $dat=new DAOMonitor();
	    echo json_encode($dat->getDatachartthree());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartfour'){
	    $dat=new DAOMonitor();
	    echo json_encode($dat->getDatachartfour());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartfive'){
	    $dat=new DAOMonitor();
	    echo json_encode($dat->getDatachartfive());
	}

?>