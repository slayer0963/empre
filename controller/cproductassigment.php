<?php
	require_once "../model/daoproductassigment.php";

	function insert(){
	    $obj=new ProductAssigment();
	    $obj->setIdPro($_POST["productid"]);
	    $obj->setIdBus($_POST["bus"]);
	    return $obj;
	}

    function update(){
        $obj=new ProductAssigment();
        $obj->setIdAssprob($_POST["asign"]);
        $obj->setIdPro($_POST["productide"]);
        $obj->setIdBus($_POST["buse"]);
        return $obj;
    }

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOProductAssigment();
	    $dat->setData(insert());
	}

    $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
    if($page=='updateData'){
        $dat=new DAOProductAssigment();
        $dat->updateData(update());
    }


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataUsers'){
	    $dat=new DAOProductAssigment();
	    echo json_encode($dat->getDataUsers());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataBusi'){
	    $dat=new DAOProductAssigment();
	    $id = $_POST['id'];
	    echo json_encode($dat->getDataBusiness($id));
	}

$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOProductAssigment();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';

         $id="'".$c["id_pro"]."'";
         $name="'".$c["name_pro"]."'";
         $descrip="'".$c["descr_pro"]."'";


         $btnadd='&nbsp;<a class=\"btn-floating #ffeb3b green modal-trigger\" href=\"#modal1\" onclick=\"FillBoxes('.$id.','.$name.','.$descrip.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">add</i></a>';
         
         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "descr_pro":"'.$c["descr_pro"].'",
                  "actions":"'.$btnadd.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}

$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getDataPro'){
    $dat = new DAOProductAssigment();
         $r=$dat->getDataProduct();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $ida="'".$c["id_assprob"]."'";
         $id="'".$c["id_pro"]."'";
         $name="'".$c["name_pro"]."'";
         $descrip="'".$c["descr_pro"]."'";
         $namebus="'".$c["name_bus"]."'";
         $nameuser="'".$c["fullname_user"]."'";


         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\"  onclick=\"FillBoxese('.$ida.','.$id.','.$name.','.$descrip.','.$namebus.','.$nameuser.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "descr_pro":"'.$c["descr_pro"].'",
                  "name_bus":"'.$c["name_bus"].'",
                  "actions":"'.$btnedit.'"
                },';
                
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>