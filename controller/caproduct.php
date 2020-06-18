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
	if($page=='getDataColor'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataColor());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataMaterial'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataMaterial());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataSize'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataSize());
	}


	function insert(){
	    $obj=new Apobject();
	    $obj->setIdPro($_POST["idpro"]);
	    $obj->setPurPrice($_POST["pcompra"]);
	    $obj->setSalPrice($_POST["pventa"]);
	    $obj->setQuantity($_POST["cantidad"]);
	    return $obj;
	}
	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOAproduct();
	    $dat->setData(insert());
	}


	// $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	// if($page=='setData1'){
	//     $dat=new DAOAproduct();
	//     $dat->Verifi($_GET['id']);
	// }


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getDataAp'){
    $dat = new DAOAproduct();
         $r=$dat->getDataAP($_GET['bussi']);
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_pro"]."'";
         $name="'".$c["name_pro"]."'";
         $descrip="'".$c["descr_pro"]."'";
         $cat="'".$c["id_cat"]."'";
         $tp="'".$c["id_tpro"]."'";
         $state="'".$c["state_pro"]."'";
		 $btnedit='';
         if($dat->Verifi($c["id_pro"])==0){
         	$btnedit.='&nbsp;<a class=\"btn-floating #ffeb3b green modal-trigger\" href=\"#modaladd\" onclick=\"FillBoxes('.$id.','.$name.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">attach_money</i></a>';
         }
         else{
			$btnedit.='&nbsp;<a class=\"btn-floating #ffeb3b blue\" onclick=\"FillDiv('.$id.','.$name.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">add</i></a>';
         }
        
         
         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "descr_pro":"'.$c["descr_pro"].'",
                  "id_cat":"'.$c["id_cat"].'",
                  "id_tpro":"'.$c["id_tpro"].'",
                  "actions":"'.$btnedit.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}

?>