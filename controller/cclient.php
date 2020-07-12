<?php
	require_once "../model/daoclient.php";



	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDetailsColor'){
	    $dat=new DAOClient();
	    echo json_encode($dat->getDetailsColor($_POST['id']));
	}
?>