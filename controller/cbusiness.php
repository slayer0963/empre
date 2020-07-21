<?php
	require_once "../model/daobusiness.php";

	function insert(){
	    $obj=new Business();
	    $obj->setNameBus($_POST["name"]);
		$obj->setPicLogoBus($_POST["img"]);
		$obj->setIdUser($_POST["user"]);
		$obj->setDescription($_POST["descrip"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["file"]["name"];
		$nombreTmpArchivo=$_FILES["file"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imgbusiness/$nombreArchivo")) {
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
	    $obj=new Business();
	     $obj->setIdBus($_POST["id"]);
	    $obj->setNameBus($_POST["namee"]);
		$obj->setPicLogoBus($_POST["imge"]);
		$obj->setIdUser($_POST["usere"]);
		$obj->setDescription($_POST["descripe"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["filee"]["name"];
		$nombreTmpArchivo=$_FILES["filee"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (file_exists("../view/imgbusiness/$nombreArchivo")) {
		    return $obj;
		} else {
		    if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imgbusiness/$nombreArchivo")) {
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
	    $obj=new Business();
	     $obj->setIdBus($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	 $obj->setStateBus("0");
	    }
	    else{
	    	 $obj->setStateBus("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOBusiness();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOBusiness();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOBusiness();
	    $dat->updateState(updateState());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataUser'){
	    $dat=new DAOBusiness();
	    echo json_encode($dat->getDataUser());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getHome'){
	    $dat=new DAOBusiness();
	    echo json_encode($dat->getDataHome());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getHomebycat'){
	    $dat=new DAOBusiness();
	    echo json_encode($dat->getHomebycat($_POST['id']));
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getHomebytp'){
	    $dat=new DAOBusiness();
	    echo json_encode($dat->getHomebytp($_POST['id']));
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOBusiness();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $btnedit='';
         $imagen ='';
         $id_bus="'".$c["id_bus"]."'";
         $name_bus="'".$c["name_bus"]."'";
         $pic_logo_bus="'".$c["pic_logo_bus"]."'";
         $id_user="'".$c["id_user"]."'";
         $description="'".$c["description"]."'";
         $state_bus="'".$c["state_bus"]."'";


         if($c["state_bus"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_bus.','.$state_bus.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_bus"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_bus.','.$state_bus.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id_bus.','.$name_bus.','.$pic_logo_bus.','.$id_user.','.$state_bus.','.$description.');\" id=\"btnd'.$c["id_bus"].'\"><i class=\"material-icons\">edit</i></a>';

        $imagen = '<a href=\"../imgbusiness/'.$c["pic_logo_bus"].'\" data-lightbox=\"image-'.$id_bus.'\" data-title=\"'.$c["name_bus"].'\"><img src=\"../imgbusiness/'.$c["pic_logo_bus"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" circle responsive-img\"></a>';

         $table.='{
                  "name_bus":"'.$c["name_bus"].'",
                  "pic_logo_bus":"'.$imagen.'",
                  "id_user":"'.$c["id_user"].'",
                  "description":"'.$c["description"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>