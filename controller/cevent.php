<?php
	require_once "../model/daoevent.php";

	function insert(){
	    $obj=new Event();
	    $obj->setNameE($_POST["txtname"]);
		$obj->setImg($_POST["img"]);
		$obj->setDetails($_POST["detalle"]);
		$obj->setReleasedate($_POST["dateini"]);
		$obj->setFinishdate($_POST["datefin"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["file"]["name"];
		$nombreTmpArchivo=$_FILES["file"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imgevents/$nombreArchivo")) {
				return $obj;
			}
			else{
				
				return "x";
			}
		}
		else
		{
			
			return "x";
		}
	    
	}


	function update(){
		$obj=new Event();
		 $obj->setIdEvent($_POST["id"]);
	    $obj->setNameE($_POST["txtnamee"]);
		$obj->setImg($_POST["imge"]);
		$obj->setDetails($_POST["detallee"]);
		$obj->setReleasedate($_POST["dateinie"]);
		$obj->setFinishdate($_POST["datefine"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["filee"]["name"];
		$nombreTmpArchivo=$_FILES["filee"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (file_exists("../view/imgevents/$nombreArchivo")) {
		    return $obj;
		} else {
		    if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imgevents/$nombreArchivo")) {
				return $obj;
			}
			else{
				
				return "x";
			}
		}
		else
		{
			
			return "x";
		}
		}
		
	    
	}

	function updateState(){
	    $obj=new Event();
	    $obj->setIdEvent($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	 $obj->setStateEvent("0");
	    }
	    else{
	    	 $obj->setStateEvent("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOEvent();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOEvent();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOEvent();
	    $dat->updateState(updateState());
	}

	$page = isset($_GET['btngetevent'])?$_GET['btngetevent']:'';
	if($page=='getEventT'){
	    $dat=new DAOEvent();
	    echo json_encode($dat->getEventT($_POST['fecha']));
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOEvent();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $btnedit='';
         $imagen ='';
         $id_event="'".$c["id_event"]."'";
         $name_e="'".$c["name_e"]."'";
         $img="'".$c["img"]."'";
         $details="'".$c["details"]."'";
         $releasedate="'".$c["releasedate"]."'";
         $finishdate="'".$c["finishdate"]."'";
         $state_event="'".$c["state_event"]."'";


         if($c["state_event"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_event.','.$state_event.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_event"]=="2") {
         	$btnstate='&nbsp;<a class=\"btn-floating blue lighten-1 waves-effect\"  type=\"submit\" name=\"action\"><i class=\"material-icons right\">present_to_all</i></a>';
         }
         else if ($c["state_event"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_event.','.$state_event.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id_event.','.$name_e.','.$img.','.$details.','.$releasedate.','.$finishdate.');\" id=\"btnd'.$c["id_event"].'\"><i class=\"material-icons\">edit</i></a>';

        $imagen = '<a href=\"../imgevents/'.$c["img"].'\" data-lightbox=\"image-'.$id_event.'\" data-title=\"'.$c["name_e"].'\"><img src=\"../imgevents/'.$c["img"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" circle responsive-img\"></a>';

         $table.='{
                  "name_bus":"'.$c["id_event"].'",
                  "name_e":"'.$c["name_e"].'",
                  "img":"'.$imagen.'",
                  "details":"'.$c["details"].'",
                  "releasedate":"'.$c["releasedate"].'",
                  "finishdate":"'.$c["finishdate"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>