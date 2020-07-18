<?php
	require_once "../model/daoaproduct.php";


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataU'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataU());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataB'){
	    $dat=new DAOAproduct();
	    $id_user = $_POST['id'];
	    echo json_encode($dat->getDataB($id_user));
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataColor'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataColor());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataMaterial'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataMaterial());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataSize'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataSize());
	}


	function insert(){
	    $obj=new Apobject();
	    $obj->setIdPro($_REQUEST["idpro"]);
	    $obj->setPurPrice($_REQUEST["pcompra"]);
	    $obj->setSalPrice($_REQUEST["pventa"]);
	    
	    return $obj;
	}
	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOAproduct();
	    $dat->setData(insert());
	}


	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='updateData'){
	    $dat=new DAOAproduct();
	    $dat->updateData(insert());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataExist'){
	    $dat=new DAOAproduct();
	    echo json_encode($dat->getDataExis($_GET['idprod'],$_GET['idcolor'],$_GET['idmaterial'],$_GET['idsize']));
	}




	// $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	// if($page=='setData1'){
	//     $dat=new DAOAproduct();
	//     $dat->Verifi($_GET['id']);
	// }



	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getDataAp'){
    $dat = new DAOAproduct();
         $r=$dat->getDataAP($_GET['bussi']);
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id="'".$c["id_pro"]."'";
         $name="'".$c["name_pro"]."'";
         $descrip="'".$c["descr_pro"]."'";
         $cat="'".$c["id_cat"]."'";
         $id_tpro="'".$c["id_tpro"]."'";

         $pur_price="'".$c["pur_price"]."'";
         $sal_price="'".$c["sal_price"]."'";
         
         $state="'".$c["state_pro"]."'";
		 $btnedit='';
         if($dat->Verifi($c["id_pro"])==0){
         	$btnedit.='&nbsp;<a class=\"btn-floating #ffeb3b green modal-trigger\" href=\"#modaladd\" onclick=\"FillBoxes('.$id.','.$name.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">attach_money</i></a>';
         }
         else{
			$btnedit.='&nbsp;<a class=\"btn-floating #ffeb3b orange\" href=\"#modaledit\"  onclick=\"openModalEdit('.$id.','.$name.','.$pur_price.','.$sal_price.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">edit</i></a>&nbsp;<a class=\"btn-floating #ffeb3b blue\" onclick=\"FillDiv('.$id.','.$name.','.$id_tpro.');\" id=\"btnd'.$c["id_pro"].'\"><i class=\"material-icons\">add</i></a>';
         }
        
         
         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "descr_pro":"'.$c["descr_pro"].'",
                  "id_cat":"'.$c["id_cat"].'",
                  "id_tpro":"'.$c["name_tpro"].'",
                  "actions":"'.$btnedit.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}


$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getvaDataGen'){
    $dat = new DAOAproduct();
         $r=$dat->getvaDataGen($_GET['id']);
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id_prices="'".$c["id_prices"]."'";
         $id_color="'".$c["id_color"]."'";
         $id_material="'".$c["id_material"]."'";
         $id_size="'".$c["id_size"]."'";
         $extraprice="'".$c["extraprice"]."'";
         $img="'".$c["img"]."'";
         $discount="'".$c["discount"]."'";
         $quantity="'".$c["quantity"]."'";
   //       $name="'".$c["name_pro"]."'";
   //       $descrip="'".$c["descr_pro"]."'";
   //       $cat="'".$c["id_cat"]."'";
   //       $id_tpro="'".$c["id_tpro"]."'";
   //       $state="'".$c["state_pro"]."'";
		 // $btnedit='';
		 if($c["state"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_prices.','.$id_color.','.$id_material.','.$id_size.',\'1\');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_prices.','.$id_color.','.$id_material.','.$id_size.',\'0\');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modalaeditproduct\" onclick=\"FillBox('.$id_prices.','.$id_color.','.$id_material.','.$id_size.','.$img.','.$quantity.','.$extraprice.','.$discount.');\"><i class=\"material-icons\">edit</i></a>';
       
        $imagen = '<a href=\"../imgdetails/'.$c["img"].'\" data-lightbox=\"image-'.$c["name_color"].'\" data-title=\"'.$c["name_color"].'\"><img src=\"../imgdetails/'.$c["img"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" circle responsive-img\"></a>';
         
         $table.='{
                  "img":"'.$imagen.'",
                  "name_color":"'.$c["name_color"].'",
                  "name_mat":"'.$c["name_mat"].'",
                  "size":"'.$c["number_size"].'-'.$c["name_size"].'",
                  "quantity":"'.$c["quantity"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}

$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getvaDataGen2'){
    $dat = new DAOAproduct();
         $r=$dat->getvaDataGen($_GET['id']);
         $table="";
         foreach($r as $c){
         $btnstate='';
         $color ='';
         $id_prices="'".$c["id_prices"]."'";
         $id_color="'".$c["id_color"]."'";
         $id_material="'".$c["id_material"]."'";
         $id_size="'".$c["id_size"]."'";
         $extraprice="'".$c["extraprice"]."'";
         $img="'".$c["img"]."'";
         $discount="'".$c["discount"]."'";
         $quantity="'".$c["quantity"]."'";
   //       $name="'".$c["name_pro"]."'";
   //       $descrip="'".$c["descr_pro"]."'";
   //       $cat="'".$c["id_cat"]."'";
   //       $id_tpro="'".$c["id_tpro"]."'";
   //       $state="'".$c["state_pro"]."'";
		 // $btnedit='';
		 if($c["state"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_prices.','.$id_color.','.$id_material.','.$id_size.',\'1\');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_prices.','.$id_color.','.$id_material.','.$id_size.',\'0\');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modalaeditproduct\" onclick=\"FillBox('.$id_prices.','.$id_color.','.$id_material.','.$id_size.','.$img.','.$quantity.','.$extraprice.','.$discount.');\"><i class=\"material-icons\">edit</i></a>';
       
        $imagen = '<a href=\"../view/imgdetails/'.$c["img"].'\" data-lightbox=\"image-'.$c["name_color"].'\" data-title=\"'.$c["name_color"].'\"><img src=\"../view/imgdetails/'.$c["img"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" circle responsive-img\"></a>';
         
         $table.='{
                  "img":"'.$imagen.'",
                  "name_color":"'.$c["name_color"].'",
                  "name_mat":"'.$c["name_mat"].'",
                  "size":"'.$c["number_size"].'-'.$c["name_size"].'",
                  "quantity":"'.$c["quantity"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}



?>