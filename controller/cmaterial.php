<?php
	require_once "../model/daomaterial.php";

	function insert(){
	    $obj=new Material();
	    $obj->setNameMat($_POST["txtname"]);
	    return $obj;
	}


	function update(){
	    $obj=new Material();
	    $obj->setIdMaterial($_POST["materialid"]);
	 	$obj->setNameMat($_POST["txtnamee"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Material();
	    $obj->setIdMaterial($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStateMat("0");
	    }
	    else{
	    	$obj->setStateMat("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOMaterial();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOMaterial();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOMaterial();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOMaterial();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_mat"]."'";
         $name="'".$c["name_mat"]."'";
         $state="'".$c["state_mat"]."'";
         if($c["state_mat"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_mat"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$name.');\" id=\"btnd'.$c["id_mat"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "name_mat":"'.$c["name_mat"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>