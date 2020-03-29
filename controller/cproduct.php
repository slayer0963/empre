<?php
	require_once "../model/daoproduct.php";

	function insert(){
	    $obj=new Product();
	    $obj->setNamePro($_POST["name"]);
		$obj->setDescrPro($_POST["descrip"]);
		$obj->setIdCat($_POST["cat"]);
		$obj->setIdTpro($_POST["tp"]);
	    return $obj;
	}


	function update(){
	    $obj=new Product();
	    $obj->setIdPro($_POST["id"]);
	 	$obj->setNamePro($_POST["namee"]);
		$obj->setDescrPro($_POST["descripe"]);
		$obj->setIdCat($_POST["cate"]);
		$obj->setIdTpro($_POST["tpe"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Product();
	    $obj->setIdPro($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStatePro("0");
	    }
	    else{
	    	$obj->setStatePro("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOProduct();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOProduct();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOProduct();
	    $dat->updateState(updateState());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataCategories'){
	    $dat=new DAOProduct();
	    echo json_encode($dat->getDataCategories());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataProductType'){
	    $dat=new DAOProduct();
	    echo json_encode($dat->getDataProductType());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOProduct();
         $r=$dat->getData();
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
         if($c["state_pro"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_pro"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$name.','.$descrip.','.$cat.','.$tp.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "descr_pro":"'.$c["descr_pro"].'",
                  "id_cat":"'.$c["id_cat"].'",
                  "id_tpro":"'.$c["id_tpro"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>