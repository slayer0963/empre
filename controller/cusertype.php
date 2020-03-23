<?php
	require_once "../model/daousertype.php";

	function insert(){
	    $obj=new UserType();
	    $obj->setNameUstp($_POST["usertype"]);
	    return $obj;
	}


	function update(){
	    $obj=new UserType();
	    $obj->setIdUstp($_POST["id"]);
	 	$obj->setNameUstp($_POST["usertypee"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new UserType();
	    $obj->setIdUstp($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStateUstp("0");
	    }
	    else{
	    	$obj->setStateUstp("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOUserType();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOUserType();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOUserType();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOUserType();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_ustp"]."'";
         $name="'".$c["name_ustp"]."'";
         $state="'".$c["state_ustp"]."'";
         if($c["state_ustp"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_ustp"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$name.');\" id=\"btnd'.$c["id_ustp"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "id_ustp":"'.$c["id_ustp"].'",
                  "name_ustp":"'.$c["name_ustp"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>