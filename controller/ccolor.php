<?php
	require_once "../model/daocolor.php";

	function insert(){
	    $obj=new Color();
	    $obj->setColorName($_POST["txtcolor"]);
	    return $obj;
	}


	function update(){
	    $obj=new Color();
	    $obj->setColorId($_POST["id2"]);
	 	$obj->setColorName($_POST["txtcolor2"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Color();
	    $obj->setColorId($_POST["id"]);
	   	$value = $_POST["estado"];
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


	$page = isset($_GET['btnModificar'])?$_GET['btnModificar']:'';
	if($page=='modificar'){
	    $dat=new DAOColor();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['btnModificar'])?$_GET['btnModificar']:'';
	if($page=='modificarEstado'){
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
         $id="'".$c["id_color"]."'";
         $name="'".$c["name_color"]."'";
         $state="'".$c["state_color"]."'";

         if($c["state_color"]=="1"){
         	// $btnstate='&nbsp;&nbsp;<label class=\"switch switch-success\" title=\"Estado: Habilitado\"><input type=\"checkbox\" id=\"estado\" onclick=\"estado('.$id.','.$state.');\" name=\"estadom\" checked ><span></span></label>';
         	$btnstate='&nbsp;&nbsp;<a class=\"switch d-inline\"><label> Off<input type=\"checkbox\"  checked onclick=\"estado('.$id.','.$state.');\"><span class=\"lever\"></span>On</label></a>';
         }
         else if ($c["state_color"]=="0") {
         	// $btnstate='&nbsp;&nbsp;<label class=\"switch switch-danger\" title=\"Estado: Deshabilitado\"><input type=\"checkbox\" checked id=\"estado\" onclick=\"estado('.$id.','.$state.');\" name=\"estadom\" ><span></span></label>';

         	$btnstate='<a class=\"switch\"><label> Off<input type=\"checkbox\"  onclick=\"estado('.$id.','.$state.');\"><span class=\"lever\"></span>On</label></a>';
         }
         $btnedit='<a height=\"40\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modalcolor2\" title=\"Modificar\" onclick=\"llenarCajas('.$id.','.$name.');\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "id_color":"'.$c["id_color"].'",
                  "name_color":"'.$c["name_color"].'",
                  "state":"'.$btnstate.'",
                  "actions":"'.$btnedit.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>