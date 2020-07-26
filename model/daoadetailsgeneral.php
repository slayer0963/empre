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
		$discount = ($obj->getDiscount()/100);
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

		//echo "Esta es la talla base=".$size;
		//echo "  ".	$size;


		$nnamesize = explode("-", $size);
		//echo " valor1=".$nnamesize[0];
		//echo " valor2=".$nnamesize[1];

		$consulta="select id_size from sizes where name_size='".$nnamesize[0]."' and number_size=".$nnamesize[1];
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


 	public function setDataUpdt($obj)
 	{
 		if($obj=="x"){
 			echo "x";
 		}else{

 		$c=conectar();
		$id_prices = $obj->getIdPrices();
		$id_color = $obj->getIdColor();
		$id_material = $obj->getIdMaterial();
		$id_size = $obj->getIdSize();
		$img = $obj->getImg();
		$quantity = $obj->getQuantity();
		$extraprice = $obj->getExtraprice();
		$discount = ($obj->getDiscount()/100);
		

		$sql="update assignment_details_general set img='$img', quantity=$quantity, extraprice='$extraprice', discount='$discount' where id_prices=$id_prices and id_color=$id_color and id_material=$id_material and id_size=$id_size ";
		if (!$c->query($sql)) {
			print "0 ".$sql;
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
	}
 	}


 	public function updateState($obj)
 	{
 		$c=conectar();
 		$id_prices = $obj->getIdPrices();
 		$id_color = $obj->getIdColor();
 		$id_material = $obj->getIdMaterial();
 		$id_size = $obj->getIdSize();
		$state = $obj->getState();
		$sql="update assignment_details_general set state=$state where id_prices=$id_prices and id_color=$id_color and id_material=$id_material and id_size=$id_size ;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>