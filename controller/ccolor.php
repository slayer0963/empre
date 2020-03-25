<?php
	require_once "../model/daocolor.php";

	function insert(){
	    $obj=new Color();
	    $obj->setCodeColor($_POST["txtcode"]);
	    $obj->setColorName($_POST["txtcolor"]);
	    return $obj;
	}


	function update(){
	    $obj=new Color();
	    $obj->setColorId($_POST["colorid"]);
	    $obj->setCodeColor($_POST["txtcodee"]);
	 	$obj->setColorName($_POST["colore"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Color();
	    $obj->setColorId($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setColorState("0");
	    }
	    else{
	    	$obj->setColorState("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOColor();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOColor();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOColor();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOColor();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_color"]."'";
         $code="'".$c["code_color"]."'";
         $name="'".$c["name_color"]."'";
         $state="'".$c["state_color"]."'";
         $color = '<input type=\"color\" value=\"'.$c["code_color"].'\" disabled>';
         if($c["state_color"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_color"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$name.','.$code.');\" id=\"btnd'.$c["id_color"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "code_color":"'.$color.'",
                  "name_color":"'.$c["name_color"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>