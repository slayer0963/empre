<?php

require_once "product.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOProduct
 {

 	function __construct()
 	{

 	}

 	public function getDataProductType()
 	{
		$c = conectar();
		$sql="select * from product_type;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


 	public function getDataCategories()
 	{
		$c = conectar();
		$sql="select * from categories;";
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
		$sql="select id_pro, name_pro, descr_pro, cat.name_cat as id_cat, pt.name_tpro as id_tpro, state_pro from product p inner join categories cat on p.id_cat=cat.id_cat inner join product_type pt on p.id_tpro = pt.id_tpro ;";
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
 		$c=conectar();
		$_name_pro = $obj->getNamePro();
		$_descr_pro = $obj->getDescrPro();
		$_id_cat = $obj->getIdCat();
		$_id_tpro = $obj->getIdTpro();
		$sql="insert into product value (0,'$_name_pro','$_descr_pro',$_id_cat,$_id_tpro,1);";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
 	}


 	public function updateData($obj)
 	{
 		$c=conectar();
 		$id=$obj->getIdPro();
		$_name_pro = $obj->getNamePro();
		$_descr_pro = $obj->getDescrPro();
		$_id_cat = $obj->getIdCat();
		$_id_tpro = $obj->getIdTpro();
		$sql="update product set name_pro='$_name_pro',descr_pro='$_descr_pro',id_cat=$_id_cat,id_tpro=$_id_tpro where id_pro=$id;";
		if (!$c->query($sql)) {
			print "0".$sql;
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}

 	public function updateState($obj)
 	{
 		$c=conectar();
 		$id=$obj->getIdPro();
		$state=$obj->getStatePro();
		$sql="update product set state_pro=$state where id_pro=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>