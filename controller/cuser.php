<?php
	require_once "../model/daouser.php";

	function insert(){
	    $obj=new User();
	    $obj->setFullnameUser($_POST["fullname"]);
		$obj->setPhoneUser($_POST["phone"]);
		$obj->setImagen($_POST["img"]);
		$obj->setEmailUser($_POST["email"]);
		$obj->setUserUser($_POST["user"]);
		$obj->setPassUser($_POST["pass"]);
		$obj->setIdUstp($_POST["usertp"]);
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
	    $obj=new User();
	     $obj->setIdUser($_POST["id"]);
	    $obj->setFullnameUser($_POST["fullnamee"]);
		$obj->setPhoneUser($_POST["phonee"]);
		$obj->setImagen($_POST["imge"]);
		$obj->setEmailUser($_POST["emaile"]);
		$obj->setUserUser($_POST["usere"]);
		$obj->setPassUser($_POST["passe"]);
		$obj->setIdUstp($_POST["usertpe"]);
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
	    $obj=new User();
	     $obj->setIdUser($_POST["id"]);
	   	$value = $_POST["state"];
	    if($value=="1"){
	    	 $obj->setStateUser("0");
	    }
	    else{
	    	 $obj->setStateUser("1");
	    }
	    return $obj;
	}

	$page = isset($_GET['btnsetData'])?$_GET['btnsetData']:'';
	if($page=='setData'){
	    $dat=new DAOUser();
	    $dat->setData(insert());
	}


	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='update'){
	    $dat=new DAOUser();
	    $dat->updateData(update());
	}
	
	$page = isset($_GET['updateData'])?$_GET['updateData']:'';
	if($page=='statechange'){
	    $dat=new DAOUser();
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
		echo $dat->loginService(DataUserLC());
	}

	$page = isset($_GET['btnlogin'])?$_GET['btnlogin']:'';
	if($page=='FB'){
	    $dat=new DAOUser();
		echo $dat->loginService(DataUser("Facebook"));
	}

	$page = isset($_GET['btnlogin'])?$_GET['btnlogin']:'';
	if($page=='GG'){
	    $dat=new DAOUser();
		echo $dat->loginService(DataUser("Google"));
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getData'){
    $dat = new DAOUser();
         $r=$dat->getData();
         $table="";
         foreach($r as $c){
         $btnstate='';
         $btnedit='';
         $imagen ='';
         $id_user="'".$c["id_user"]."'";
         $fullname_user="'".$c["fullname_user"]."'";
         $phone_user="'".$c["phone_user"]."'";
         $imagen="'".$c["imagen"]."'";
         $email_user="'".$c["email_user"]."'";
         $user_user="'".$c["user_user"]."'";
         $pass_user="'".$c["pass_user"]."'";
         $id_ustp="'".$c["id_ustp"]."'";
         $state_user="'".$c["state_user"]."'";


         if($c["state_user"]=="1"){ 
         	$btnstate='&nbsp;<a class=\"btn-floating light-green lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_user.','.$state_user.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_checked</i></a>';
         }
         else if ($c["state_user"]=="0") {
         	$btnstate='&nbsp;<a class=\"btn-floating red lighten-1 waves-effect waves-red\"  onclick=\"StateChange('.$id_user.','.$state_user.');\" type=\"submit\" name=\"action\"><i class=\"material-icons right\">radio_button_unchecked</i></a>';
         }

         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b yellow modal-trigger\" href=\"#modal2\" onclick=\"FillBoxes('.$id_user.','.$fullname_user.','.$phone_user.','.$imagen.','.$email_user.','.$user_user.','.$pass_user.','.$id_ustp.');\" id=\"btnd'.$c["id_user"].'\"><i class=\"material-icons\">edit</i></a>';

        $imagen = '<a href=\"../imguser/'.$c["imagen"].'\" data-lightbox=\"image-'.$id_user.'\" data-title=\"'.$c["fullname_user"].'\"><img src=\"../imguser/'.$c["imagen"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\" circle responsive-img\"></a>';

         $table.='{
                  "fullname_user":"'.$c["fullname_user"].'",
                  "phone_user":"'.$c["phone_user"].'",
                  "imagen":"'.$imagen.'",
                  "email_user":"'.$c["email_user"].'",
                  "user_user":"'.$c["user_user"].'",
                  "pass_user":"'.$c["pass_user"].'",
                  "id_ustp":"'.$c["id_ustp"].'",
                  "actions":"'.$btnedit.$btnstate.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
?>