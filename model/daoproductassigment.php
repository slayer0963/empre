
<?php

require_once "productassigment.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOProductAssigment
 {

 	function __construct()
 	{

 	}

 	public function setData($obj)
 	{
 		$c=conectar();
 		$bus = $obj->getIdBus();
		$pro = $obj->getIdPro();


		$query= "select name_pro from product where id_pro=$pro";
        $c->set_charset('utf8');
        $result = $c->query($query);
        $re = $result->fetch_array();
        $name_pro=$re["name_pro"];



		$consulta= "select * from product p inner join assignment_probus b on b.id_pro=p.id_pro where p.name_pro='$name_pro' and b.id_bus=$bus";
        $c->set_charset('utf8');
        $res1 = $c->query($consulta);
        $nrow1=$res1->num_rows;
        if ($nrow1>0) {
        	    echo "2";
        }else {


		$sql="insert into assignment_probus value (0,$bus,$pro);";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 

		     }
		 }
		mysqli_close($c);
 	}

 	public function updateData($obj)
 	{
 		$c=conectar();
 		$id = $obj->getIdAssprob();
 		$bus = $obj->getIdBus();
		$pro = $obj->getIdPro();
		$sql="update assignment_probus set id_bus=$bus, id_pro=$pro where id_assprob=$id";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
 	}

 	public function getDataUsers()
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
 	public function getDataBusiness($id_usu)
 	{
		$c = conectar();
		$sql="select * from business where id_user=$id_usu;";
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
		$sql="select * from product pro where not exists(select asi.id_pro from assignment_probus asi where asi.id_pro=pro.id_pro);";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


	public function getDataProduct()
 	{
		$c = conectar();
		$sql="select asi.id_assprob, pro.id_pro, pro.name_pro, pro.descr_pro, bus.name_bus, us.fullname_user from assignment_probus asi inner join product pro on asi.id_pro=pro.id_pro inner join business bus on asi.id_bus=bus.id_bus inner join users us on bus.id_user=us.id_user;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}



 }
 ?>