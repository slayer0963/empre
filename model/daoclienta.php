<?php
session_start();
require_once "client.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOClienta
 {

 	function __construct()
 	{

 	}


 	public function getdataprofile($id)
 	{
 		$c = conectar();
		$sql="select * from clients where id_cl=$id;";
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
		$sql="select * from clients;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataPhone($id)
 	{
		$c = conectar();
		$sql="select * from contact where id_cl=$id;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataAddre($id)
 	{
		$c = conectar();
		$sql="select * from address where id_cl=$id;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


 	public function setRegister($obj)
 	{
 		if($obj=="x"){
 			echo "x";
 		}else{
 		$c=conectar();
		$_fullname_user=$obj->getFullnameCl();
		$_imagen=$obj->getImagen();
		$_email_user=$obj->getEmailCl();
		$_user_user=$obj->getUserCl();
		$_pass_user=$obj->getPassCl();
		$sql="insert into clients value (0,'$_fullname_user','$_imagen','$_email_user','$_user_user','$_pass_user',1,'','');";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    $query= "SELECT id_cl, fullname_cl, imagen, email_cl FROM clients WHERE email_cl ='$_email_user' and pass_cl='$_pass_user' or user_cl ='$_email_user' and pass_cl='$_pass_user'";
	                $c->set_charset('utf8');
	                $result = $c->query($query);
	                $res = $result->fetch_array();



					$query= "SELECT id_cl, fullname_cl, imagen, email_cl FROM clients WHERE email_cl ='$_email_user' and pass_cl='$_pass_user' or user_cl ='$_email_user' and pass_cl='$_pass_user'";
	                $c->set_charset('utf8');
	                $result = $c->query($query);
	                $res = $result->fetch_array();
	               
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
					$arreglo[] = array('id' =>$id,'tipo' =>$tipo,'nombre' =>$nombre,'imagen' =>$img,'estado'=>1);
					return $arreglo;

		     }
		mysqli_close($c);
		}
 	}


 	public function setData($obj)
 	{
 		if($obj=="x"){
 			echo "x";
 		}else{
 		$c=conectar();
		$_fullname_user=$obj->getFullnameCl();
		$_imagen=$obj->getImagen();
		$_email_user=$obj->getEmailCl();
		$_user_user=$obj->getUserCl();
		$_pass_user=$obj->getPassCl();
		$sql="insert into clients value (0,'$_fullname_user','$_imagen','$_email_user','$_user_user','$_pass_user',1,'','');";
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
 		$_id_user=$obj->getIdCl();
		$_fullname_user=$obj->getFullnameCl();
		$_imagen=$obj->getImagen();
		$_email_user=$obj->getEmailCl();
		$_user_user=$obj->getUserCl();
		$_pass_user=$obj->getPassCl();
		
		$sql="update clients set fullname_cl='$_fullname_user',imagen='$_imagen',email_cl='$_email_user',user_cl='$_user_user',pass_cl='$_pass_user' where id_cl=$_id_user;";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
		}
 	}


 	public function updateDatapro($obj)
 	{	
 		if($obj=="x"){
 			echo "x";
 		}else{
 		$c=conectar();
 		$_id_user=$obj->getIdCl();
		$_fullname_user=$obj->getFullnameCl();
		$_imagen=$obj->getImagen();
		$_email_user=$obj->getEmailCl();
		$_user_user=$obj->getUserCl();
		$_pass_user=$obj->getPassCl();
		
		$sql="update clients set fullname_cl='$_fullname_user',imagen='$_imagen',email_cl='$_email_user',user_cl='$_user_user',pass_cl='$_pass_user' where id_cl=$_id_user;";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    





					$query= "SELECT id_cl, fullname_cl, imagen, email_cl FROM clients WHERE email_cl ='$_email_user' and pass_cl='$_pass_user' or user_cl ='$_email_user' and pass_cl='$_pass_user'";
	                $c->set_charset('utf8');
	                $result = $c->query($query);
	                $res = $result->fetch_array();
	               




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
					$arreglo[] = array('id' =>$id,'tipo' =>$tipo,'nombre' =>$nombre,'imagen' =>$img,'estado'=>1);
					return $arreglo;
		     }
		mysqli_close($c);
		}
 	}

 	public function updateState($obj)
 	{
 		$c=conectar();
 		$_id_user=$obj->getIdCl();
		$_state_user=$obj->getStateCl();
		$sql="update clients set state_cl=$_state_user where id_cl=$_id_user;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>