

<?php 

require_once "../model/daodelivery.php";


	function updateState(){
	    $obj=new Delivery();
	    $obj->setIdDelivery($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setStatusDelivery("0");
	    }else{
	    	$obj->setStatusDelivery("1");
	    }
	    return $obj;
	}
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAODelivery();
	    $dat->updateState(updateState());
	}


    $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
    if($page=='setDelivery'){
        $dat=new DAODelivery();
        $dat->setDelivery($_POST['idus'],$_POST['ide']);
    }

        $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
    if($page=='setDeliveryE'){
        $dat=new DAODelivery();
        $dat->setDeliveryE($_POST['idus'],$_POST['ide']);
    }

            $page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
    if($page=='setDeliveryFF'){
        $dat=new DAODelivery();
        $dat->setDeliveryFF($_POST['idus'],$_POST['ide']);
    }

    $page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataDetailsSales'){
	    $dat = new DAODelivery();
	    echo json_encode($dat->getDataDetailsSales($_POST['id'],$_POST['idbus']));    
	}

    $page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
    if($page=='getDataDetailsSalesR'){
        $dat = new DAODelivery();
        echo json_encode($dat->getDataDetailsSalesR($_POST['id']));    
    }


    $page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
    if($page=='getDeliveriesD'){
        $dat = new DAODelivery();
        echo json_encode($dat->getDeliveriesD());    
    }

    $page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
    if($page=='getDeliveriesUs'){
        $dat = new DAODelivery();
        echo json_encode($dat->getDeliveriesUs($_POST['idus']));    
    }

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getDatadely'){
    $dat = new DAODelivery();
         $r=$dat->getData($_GET['id']);

         $table="";
         foreach($r as $c){
         $btnstate='';
         $btnview='';
         $imagen ='';

         $id_delivery="'".$c["id_delivery"]."'";
         $fullname_cl="'".$c["fullname_cl"]."'";
         $datesold="'".$c["datesold"]."'";
         $status_delivery="'".$c["status_delivery"]."'";
         $id_bus="'".$c["id_bus"]."'";
         $id_shop_c="'".$c["id_shop_c"]."'";


         $btnview='&nbsp;<a class=\"btn-floating #ffeb3b blue modal-trigger\"  href=\"#deliverylist\" id=\"btnd'.$c["id_delivery"].'\" onclick=\"getDelivery('.$id_shop_c.','.$id_bus.');\"><i class=\"material-icons\">visibility</i></a>';

         if($c["status_delivery"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1\"   type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["status_delivery"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $table.='{
                  "id_delivery":"'.$c["id_delivery"].'",
                  "fullname_cl":"'.$c["fullname_cl"].'",
                  "datesold":"'.$c["datesold"].'",
                  "actions":"'.$btnview.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}


 ?>