<?php
	require_once "../model/daoclienta.php";

	function insert(){
	    $obj=new Client();
	    $obj->setFullnameCl($_POST["fullname"]);
		$obj->setImagen($_POST["img"]);
		$obj->setEmailCl($_POST["email"]);
		$obj->setUserCl($_POST["user"]);
		$obj->setPassCl($_POST["pass"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["file"]["name"];;
		$nombreTmpArchivo=$_FILES["file"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imguser/$nombreArchivo")) {
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
	    $obj=new Client();
	    $obj->setIdCl($_POST["id"]);
	   	$obj->setFullnameCl($_POST["fullnamee"]);
		$obj->setImagen($_POST["imge"]);
		$obj->setEmailCl($_POST["emaile"]);
		$obj->setUserCl($_POST["usere"]);
		$obj->setPassCl($_POST["passe"]);
		$formatos=array('.jpg','.png','.gif','.jpeg','.JPG','.PNG','.GIF','.JPEG');
  		$nombreArchivo=$_FILES["filee"]["name"];;
		$nombreTmpArchivo=$_FILES["filee"]["tmp_name"];
		$ext=substr($nombreArchivo, strrpos($nombreArchivo, "."));
		//echo $ext;
		if (file_exists("../view/imguser/$nombreArchivo")) {
		    return $obj;
		} else {
		    if (in_array($ext, $formatos)) {
			if (move_uploaded_file($nombreTmpArchivo, "../view/imguser/$nombreArchivo")) {
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
	    $obj=new Client();
	     $obj->setIdCl($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	 $obj->setStateCl("0");
	    }
	    else{
	    	 $obj->setStateCl("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOClienta();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOClienta();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOClienta();
	    $dat->updateState(updateState());
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDataTypeUser'){
	    $dat=new DAOUser();
	    echo json_encode($dat->getDataUserType());
	}


	function DataUser($service){
	    $obj=new User();
	    $obj->setFullnameUser($_POST["nombre"]);
		$obj->setImagen($_POST["foto"]);
		$obj->setEmailUser($_POST["correo"]);
		$obj->setIdUstp("1");
		$obj->setIdService($_POST["id"]);
		$obj->setService($service);
		return $obj;
	}

	function DataUserLC(){
	    $obj=new User();
		$obj->setEmailUser($_POST["email"]);
		$obj->setPassUser($_POST["password"]);
		return $obj;
	}

	$page = isset($_GET['btnlogin'])?$_GET['btnlogin']:'';
	if($page=='LC'){
	    $dat=new DAOUser();
		echo json_encode($dat->loginService(DataUserLC()));
	}


	$page = isset($_GET['btngetDatacli'])?$_GET['btngetDatacli']:'';
	if($page=='getdataprofile'){
	    $dat=new DAOClienta();
		echo json_encode($dat->getdataprofile($_POST['id']));
	}





	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOClienta();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $btnedit='';
         $btnnumber='';
         $btnadress='';
         $imagen ='';
         $id_cl="'".$c["id_cl"]."'";
         $fullname_cl="'".$c["fullname_cl"]."'";
         $imagen="'".$c["imagen"]."'";
         $email_cl="'".$c["email_cl"]."'";
         $user_cl="'".$c["user_cl"]."'";
         $pass_cl="'".$c["pass_cl"]."'";
         $state_cl="'".$c["state_cl"]."'";


         if($c["state_cl"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_cl.','.$state_cl.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_cl"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_cl.','.$state_cl.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id_cl.','.$fullname_cl.','.$imagen.','.$email_cl.','.$user_cl.','.$pass_cl.');\" id=\"btnd'.$c["id_cl"].'\"><i class=\"material-icons\">edit</i></a>';

        $imagen = '<a href=\"../imguser/'.$c["imagen"].'\" data-lightbox=\"image-'.$id_cl.'\" data-title=\"'.$c["fullname_cl"].'\"><img src=\"../imguser/'.$c["imagen"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" circle responsive-img\"></a>';
        $btnnumber='&nbsp;<a class=\"btn-floating #ffeb3b teal modal-trigger tooltipped\" data-position=\"top\" data-tooltip=\"Agregar Numero\" href=\"#modalnumber\" onclick=\"FillBoxNumber('.$id_cl.');\" id=\"btnd'.$c["id_cl"].'\"><i class=\"material-icons\">contact_phone</i></a>';
        $btnadress='&nbsp;<a class=\"btn-floating #ffeb3b cyan modal-trigger\" href=\"#modaladdress\" onclick=\"FillBoxNumberAdress('.$id_cl.');\" id=\"btnd'.$c["id_cl"].'\"><i class=\"material-icons\">contact_mail</i></a>';
         $table.='{
                  "fullname_cl":"'.$c["fullname_cl"].'",
                  "imagen":"'.$imagen.'",
                  "email_cl":"'.$c["email_cl"].'",
                  "user_cl":"'.$c["user_cl"].'",
                  "pass_cl":"'.$c["pass_cl"].'",
                  "actions":"'.$btnedit.$btnstate.$btnnumber.$btnadress.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>