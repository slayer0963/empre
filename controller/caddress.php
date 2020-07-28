<?php
	require_once "../model/daoaddress.php";

	function insert(){
	    $obj=new Address();
	    $obj->setIdCl($_POST["idcla"]);
	    $obj->setContact($_POST["contact"]);
	    $obj->setDepartment($_POST["department"]);
	    $obj->setCity($_POST["city"]);
	    $obj->setStreetdir($_POST["streetdir"]);
	    $obj->setNumberdir($_POST["numberdir"]);
	    $obj->setReference($_POST["reference"]);
	    return $obj;
	}


	function update(){
	    $obj=new Address();
	    $obj->setIdAdd($_POST["idadd"]);
	    $obj->setContact($_POST["contacte"]);
	    $obj->setDepartment($_POST["departmente"]);
	    $obj->setCity($_POST["citye"]);
	    $obj->setStreetdir($_POST["streetdire"]);
	    $obj->setNumberdir($_POST["numberdire"]);
	    $obj->setReference($_POST["referencee"]);
	   
	    return $obj;
	}

	function updateState(){
	    $obj=new Address();
	    $obj->setIdAdd($_POST["id"]);
	    $obj->setIdCl($_POST["id_cl"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	$obj->setActivestate("0");
	    }
	    else{
	    	$obj->setActivestate("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOAddress();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOAddress();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOAddress();
	    $dat->updateState(updateState());
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOAddress();
         $r=$dat->getData($_REQUEST["id"]);
         $table="";
         foreach($r as $c){
         $btnstate='';
         $id="'".$c["id_add"]."'";
         $id_cl="'".$c["id_cl"]."'";
         $fullname_cl="'".$c["fullname_cl"]."'";
         $contact="'".$c["contact"]."'";
         $department="'".$c["department"]."'";
         $city="'".$c["city"]."'";
         $streetdir="'".$c["streetdir"]."'";
         $numberdir="'".$c["numberdir"]."'";
         $reference="'".$c["reference"]."'";

         $state="'".$c["activestate"]."'";
         if($c["activestate"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 \" title=\"Dirección activa\" ><i class=\"material-icons right\">location_on</i></a>';
         }
         else if ($c["activestate"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating orange lighten-1 \" title=\"Activar dirección\" onclick=\"StateAChange('.$id.','.$id_cl.','.$state.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">location_searching</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modaledA\" onclick=\"EditAddress('.$id.','.$contact.','.$department.','.$city.','.$streetdir.','.$numberdir.','.$reference.');\" id=\"btnd'.$c["id_add"].'\"><i class=\"material-icons\">edit</i></a>';
         
         $table.='{
                  "fullname_cl":"'.$c["fullname_cl"].'",
                  "contact":"'.$c["contact"].'",
                  "department":"'.$c["department"].'",
                  "city":"'.$c["city"].'",
                  "streetdir":"'.$c["streetdir"].'",
                  "numberdir":"'.$c["numberdir"].'",
                  "reference":"'.$c["reference"].'",

                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>