<?php
	require_once "../model/daosize.php";

	function insert(){
	    $obj=new Size();
	    $obj->setNumberSize($_POST["txtnumber"]);
	    $obj->setNameSize($_POST["txtname"]);
	    return $obj;
	}


	function update(){
	    $obj=new Size();
	    $obj->setIdSize($_POST["sizeid"]);
	    $obj->setNumberSize($_POST["txtnumbere"]);
	 	$obj->setNameSize($_POST["txtnamee"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Size();
	    $obj->setIdSize($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStateSize("0");
	    }
	    else{
	    	$obj->setStateSize("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOSize();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOSize();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOSize();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOSize();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_size"]."'";
         $number="'".$c["number_size"]."'";
         $name="'".$c["name_size"]."'";
         $state="'".$c["state_size"]."'";
         if($c["state_size"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_size"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$number.','.$name.');\" id=\"btnd'.$c["id_size"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "number_size":"'.$c["number_size"].'",
                  "name_size":"'.$c["name_size"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>