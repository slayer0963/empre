<?php

require_once "adetailsgeneral.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOAdetailsgeneral
 {

 	function __construct()
 	{

 	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from assignment_details_general;";
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
		$id_pro = $obj->getIdPrices();
		$color = $obj->getIdColor();
		$material = $obj->getIdMaterial();
		$size = $obj->getIdSize();
		$img = $obj->getImg();
		$quantity = $obj->getQuantity();
		$extraprice = $obj->getExtraprice();
		$discount = $obj->getDiscount();
		$state = $obj->getState();

		$consulta= "select id_prices from assignment_prices_object where id_pro='$id_pro';";
		$c->set_charset('utf8');
		$resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_prices=$re["id_prices"];


		$consulta= "select id_color from color where name_color='$color';";
		$c->set_charset('utf8');
		$resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_color=$re["id_color"];

		$consulta= "select id_mat from material where name_mat='$material';";
		$c->set_charset('utf8');
		$resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_mat=$re["id_mat"];

		$consulta= "select id_size from sizes where name_size='$size';";
		$c->set_charset('utf8');
		$resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_size=$re["id_size"];

		$sql="insert into assignment_details_general values ($id_prices, $id_color, $id_mat, $id_size, '$img',$quantity, '$extraprice', '$discount',1);";
		if (!$c->query($sql)) {
			print "0 ".$sql;
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
	}
 	}


 	public function updateData($obj)
 	{
 		$c=conectar();
 		$id_prices = $obj->getIdPrices();
		$id_color = $obj->getIdColor();
		$id_material = $obj->getIdMaterial();
		$id_size = $obj->getIdSize();
		$img = $obj->getImg();
		$quantity = $obj->getQuantity();
		$extraprice = $obj->getExtraprice();
		$discount = $obj->getDiscount();
		$sql="update assignment_details_general ... where id_prices=$id_prices;";
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
 		$id_prices = $obj->getIdPrices();
		$state = $obj->getState();
		$sql="update assignment_details_general set state=$state where id_prices=$id_prices;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>