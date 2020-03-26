<?php
	require_once "../model/daocategories.php";

	function insert(){
	    $obj=new Categories();
	    $obj->setNameCat($_POST["categories"]);
	    return $obj;
	}


	function update(){
	    $obj=new Categories();
	    $obj->setIdCat($_POST["id"]);
	 	$obj->setNameCat($_POST["categoriese"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Categories();
	    $obj->setIdCat($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStateCat("0");
	    }
	    else{
	    	$obj->setStateCat("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOCategories();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOCategories();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOCategories();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOCategories();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_cat"]."'";
         $name="'".$c["name_cat"]."'";
         $state="'".$c["state_cat"]."'";
         if($c["state_cat"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_cat"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$name.');\" id=\"btnd'.$c["id_cat"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "name_cat":"'.$c["name_cat"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>