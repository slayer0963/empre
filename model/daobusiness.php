<?php

require_once "business.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOBusiness
 {

 	function __construct()
 	{

 	}

 	public function getDataUser()
 	{
		$c = conectar();
		$sql="select * from users where id_ustp=2;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataHome()
 	{
		$c = conectar();
		$sql="select * from business;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


	public function getHomebycat($id)
 	{
		$c = conectar();
		$sql="select DISTINCT busi.id_bus, busi.name_bus,busi.pic_logo_bus,busi.description from product p 
		inner join assignment_prices_object apob on apob.id_pro=p.id_pro inner join categories cat on p.id_cat=cat.id_cat 
		inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro 
		inner join business busi on busi.id_bus=aspb.id_bus  where cat.id_cat=$id  and exists(select * from assignment_details_general adg 
		where adg.id_prices=apob.id_prices);";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getHomebytp($id)
 	{
		$c = conectar();
		$sql="select DISTINCT busi.id_bus, busi.name_bus,busi.pic_logo_bus,busi.description from product p 
		inner join assignment_prices_object apob on apob.id_pro=p.id_pro inner join categories cat on p.id_cat=cat.id_cat 
		inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro 
		inner join business busi on busi.id_bus=aspb.id_bus  where pt.id_tpro=$id  and exists(select * from assignment_details_general adg 
		where adg.id_prices=apob.id_prices);";
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
		$sql="select bu.id_bus,bu.name_bus,bu.pic_logo_bus,u.fullname_user as id_user, bu.description, bu.state_bus  from business bu inner join users u on bu.id_user=u.id_user;";
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
		$_name_bus=$obj->getNameBus();
		$_pic_logo_bus=$obj->getPicLogoBus();
		$_id_user=$obj->getIdUser();
		$descrip=$obj->getDescription();
		$sql="insert into business value (0,'$_name_bus','$_pic_logo_bus',$_id_user,1,'$descrip');";
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
 		$_id_bus=$obj->getIdBus();
		$_name_bus=$obj->getNameBus();
		$_pic_logo_bus=$obj->getPicLogoBus();
		$_id_user=$obj->getIdUser();
		$descrip=$obj->getDescription();
		$sql="update business set name_bus='$_name_bus',pic_logo_bus='$_pic_logo_bus',id_user=$_id_user, description='$descrip' where id_bus=$_id_bus;";
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
 		$_id_bus=$obj->getIdBus();
		$_state_bus=$obj->getStateBus();
		$sql="update business set state_bus=$_state_bus where id_bus=$_id_bus;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>