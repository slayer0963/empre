<?php
session_start();
require_once "user.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOUser
 {

 	function __construct()
 	{

 	}


 	public function loginService($obj)
 	{
 		
 		$c = conectar();
		$fullname_user=$obj->getFullnameUser();
		$imagen=$obj->getImagen();
		$email_user=$obj->getEmailUser();
		$id_ustp=$obj->getIdUstp();
		$id_service=$obj->getIdService();
		$service=$obj->getService();
		$pass_user = $obj->getPassUser();
 		$result = 0;
 		if($id_service==null){
 			$sentencia = $c->prepare("SELECT count(id_cl) as id_cl FROM clients WHERE email_cl ='$email_user' and pass_cl='$pass_user'  or user_cl ='$email_user' and pass_cl='$pass_user'");
			$sentencia->execute();
			$resultado = $sentencia->get_result();
			$res = $resultado->fetch_assoc();
			$cliente=$res["id_cl"];
			if($cliente>0){
				$sentencia = $c->prepare("SELECT id_cl, fullname_cl, imagen, email_cl FROM clients WHERE email_cl ='$email_user' and pass_cl='$pass_user' or user_cl ='$email_user' and pass_cl='$pass_user'");
			$sentencia->execute();
			$resultado = $sentencia->get_result();
			$res = $resultado->fetch_assoc();
			$nombre=$res["fullname_cl"];
			$img=$res["imagen"];
			$email=$res["email_cl"];
			$tipo=3;
			$id=$res["id_cl"];
			$_SESSION["name"]=$nombre;
			$_SESSION["type"]=$tipo;
			$_SESSION["img"]=$img;
			$_SESSION["email"]=$email;
			$_SESSION["idus"]=$id;
			$arreglo = array();
			$arreglo[] = array('tipo' =>$tipo,'nombre' =>$nombre,'imagen' =>$img);
			return $arreglo;
			}
			else{
			$sentencia = $c->prepare("SELECT id_user, fullname_user,id_ustp, imagen, email_user FROM users WHERE email_user ='$email_user' and pass_user='$pass_user' or user_user ='$email_user' and pass_user='$pass_user'");
			$sentencia->execute();
			$resultado = $sentencia->get_result();
			$res = $resultado->fetch_assoc();
			$nombre=$res["fullname_user"];
			$img=$res["imagen"];
			$email=$res["email_user"];
			$tipo=$res["id_ustp"];
			$id=$res["id_user"];
			$_SESSION["name"]=$nombre;
			$_SESSION["type"]=$tipo;
			$_SESSION["img"]=$img;
			$_SESSION["email"]=$email;
			$_SESSION["idus"]=$id;
			$arreglo = array();
			$arreglo[] = array('tipo' =>$tipo,'nombre' =>$nombre,'imagen' =>$img);
			return $arreglo;
			}

			
 		}
 		else{
 			$sentencia = $c->prepare("SELECT count(idservices) as idservices FROM users WHERE idservices = '$id_service' or email_user ='$email_user'");
			$sentencia->execute();
			$resultado = $sentencia->get_result();
			$res = $resultado->fetch_assoc();
			$serviciocont=$res["idservices"];
			$sentencia = $c->prepare("SELECT fullname_user,id_ustp, imagen, email_user FROM users WHERE idservices = '$id_service' and email_user ='$email_user'");
			$sentencia->execute();
			$resultado = $sentencia->get_result();
			$res = $resultado->fetch_assoc();
			$nombre=$res["fullname_user"];
			$img=$res["imagen"];
			$email=$res["email_user"];
			$tipo=$res["id_ustp"];
			$_SESSION["name"]=$nombre;
			$_SESSION["type"]=$tipo;
			$_SESSION["img"]=$img;
			$_SESSION["email"]=$email;
			$arreglo = array();
			$arreglo[] = array('tipo' =>$tipo,'nombre' =>$nombre,'imagen' =>$img);
			return $arreglo;
 		}
		
		
					
		
	}

 	public function getDataUserType()
 	{
		$c = conectar();
		$sql="select * from user_type;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select id_user, fullname_user, phone_user,imagen,email_user,user_user,pass_user, ut.name_ustp as id_ustp,state_user from users u inner join user_type ut on u.id_ustp=ut.id_ustp ;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


 	public function setData($obj)
 	{
 		if($obj=="x"){
 			echo "x";
 		}else{
 		$c=conectar();
		$_fullname_user=$obj->getFullnameUser();
		$_phone_user=$obj->getPhoneUser();
		$_imagen=$obj->getImagen();
		$_email_user=$obj->getEmailUser();
		$_user_user=$obj->getUserUser();
		$_pass_user=$obj->getPassUser();
		$_id_ustp=$obj->getIdUstp();
		$sql="insert into users value (0,'$_fullname_user','$_phone_user','$_imagen','$_email_user','$_user_user','$_pass_user',$_id_ustp,1,'','');";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
		}
 	}


 	public function updateData($obj)
 	{	
 		if($obj=="x"){
 			echo "x";
 		}else{
 		$c=conectar();
 		$_id_user=$obj->getIdUser();
		$_fullname_user=$obj->getFullnameUser();
		$_phone_user=$obj->getPhoneUser();
		$_imagen=$obj->getImagen();
		$_email_user=$obj->getEmailUser();
		$_user_user=$obj->getUserUser();
		$_pass_user=$obj->getPassUser();
		$_id_ustp=$obj->getIdUstp();
		$sql="update users set fullname_user='$_fullname_user',phone_user='$_phone_user',imagen='$_imagen',email_user='$_email_user',user_user='$_user_user',pass_user='$_pass_user', id_ustp=$_id_ustp where id_user=$_id_user;";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
		}
 	}

 	public function updateState($obj)
 	{
 		$c=conectar();
 		$_id_user=$obj->getIdUser();
		$_state_user=$obj->getStateUser();
		$sql="update users set state_user=$_state_user where id_user=$_id_user;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>