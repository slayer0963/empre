<?php
	require_once "../model/daoadetailsgeneral.php";




	function insert(){
	    $obj=new Adetailsgeneral();
	    $obj->setIdPrices($_POST["idpres"]);
	    $obj->setIdColor($_POST["colorpre"]);
	    $obj->setIdMaterial($_POST["matpre"]);
	    $obj->setIdSize($_POST["sizepre"]);
	    $obj->setImg($_POST["fname"]);
	    $obj->setQuantity($_POST["quantity"]);
	    $obj->setExtraprice($_POST["pextra"]);
	    $obj->setDiscount($_POST["discount"]);

	    $formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["fileprice"]["name"];
		$nombreTmpArchivo=$_FILES["fileprice"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imgdetails/$nombreArchivo")) {
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


	
	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOAdetailsgeneral();
	    $dat->setData(insert());
	}


	// $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	// if($page=='setData1'){
	//     $dat=new DAOAproduct();
	//     $dat->Verifi($_GET['id']);
	// }



	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getDataAp'){
    $dat = new DAOAdetailsgeneral();
         $r=$dat->getDataAP($_GET['bussi']);
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
		 $btnedit='';
         if($dat->Verifi($c["id_pro"])==0){
         	$btnedit.='&nbsp;<a class=\"btn-floating #ffeb3b green modal-trigger\" href=\"#modaladd\" onclick=\"FillBoxes('.$id.','.$name.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">attach_money</i></a>';
         }
         else{
			$btnedit.='&nbsp;<a class=\"btn-floating #ffeb3b blue\" onclick=\"FillDiv('.$id.','.$name.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">add</i></a>';
         }
        
         
         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "descr_pro":"'.$c["descr_pro"].'",
                  "id_cat":"'.$c["id_cat"].'",
                  "id_tpro":"'.$c["id_tpro"].'",
                  "actions":"'.$btnedit.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}




?>