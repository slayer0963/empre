<?php
	require_once "../model/daoproducttype.php";

	function insert(){
	    $obj=new ProductType();
	    $obj->setNameTpro($_POST["producttype"]);
	    $obj->setLogo($_POST["img"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["file"]["name"];;
		$nombreTmpArchivo=$_FILES["file"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));

		if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imglogos/$nombreArchivo")) {
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
		
	    return $obj;
	}


	function update(){
	    $obj=new ProductType();
	    $obj->setIdTpro($_POST["id"]);
	 	$obj->setNameTpro($_POST["producttypee"]);
	   $obj->setLogo($_POST["imge"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["filee"]["name"];;
		$nombreTmpArchivo=$_FILES["filee"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));

		if (file_exists("../view/imglogos/$nombreArchivo")) {
		    return $obj;
		} else {
		    if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imglogos/$nombreArchivo")) {
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
	    return $obj;
	}

	function updateState(){
	    $obj=new ProductType();
	    $obj->setIdTpro($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStateTpro("0");
	    }
	    else{
	    	$obj->setStateTpro("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOProductType();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOProductType();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOProductType();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOProductType();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_tpro"]."'";
         $name="'".$c["name_tpro"]."'";
         $state="'".$c["state_tpro"]."'";
         $logo="'".$c["logo"]."'";
         if($c["state_tpro"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_tpro"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id.','.$name.','.$logo.');\" id=\"btnd'.$c["id_tpro"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $imagen = '<a href=\"../imglogos/'.$c["logo"].'\" data-lightbox=\"image-'.$id.'\" data-title=\"'.$c["name_tpro"].'\"><img src=\"../imglogos/'.$c["logo"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" responsive-img\"></a>';
         $table.='{
                  "name_tpro":"'.$c["name_tpro"].'",
                  "logo":"'.$imagen.'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>