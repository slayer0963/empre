<?php

require_once "delivery.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAODelivery
 {

 	function __construct()
 	{

 	}

 	public function getData($idbus)
 	{
		$c = conectar();
		$sql="select d.id_delivery, cli.fullname_cl, s.datesold, d.status_delivery, apro.id_bus,d.id_shop_c from delivery d inner join shopping_cart s on d.id_shop_c=s.id_shp_c inner join clients cli on cli.id_cl=s.id_cl inner join shopping_cart_details sd on s.id_shp_c=sd.id_shp_c inner join assignment_prices_object apo on apo.id_prices=sd.id_prices inner join product pro on apo.id_pro=pro.id_pro inner join color c on c.id_color=sd.id_color inner join material m on m.id_mat = sd.id_mat inner join sizes si on si.id_size=sd.id_size inner join assignment_probus apro on apro.id_pro=apo.id_pro where apro.id_bus=$idbus;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataDetailsSales($idcart,$busi)
 	{
		$c = conectar();
		$sql="SELECT adg.img , date_format(cart.datesold,'%d-%m-%Y %h:%m:%s') as fecha,scd.id_shp_c,cli.fullname_cl, pro.name_pro,c.name_color,m.name_mat,s.name_size,s.number_size, scd.quantity, scd.precio, scd.descuento, CONVERT(scd.quantity*scd.precio, DECIMAL(15,2)) as total FROM shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl=cart.id_cl inner join assignment_prices_object apo on apo.id_prices=scd.id_prices inner join product pro on apo.id_pro=pro.id_pro inner join color c on c.id_color=scd.id_color inner join material m on m.id_mat = scd.id_mat inner join assignment_probus apro on apro.id_pro=apo.id_pro inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join sizes s on s.id_size=scd.id_size where cart.id_shp_c=$idcart and apro.id_bus=$busi;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}




 	public function updateState($obj)
 	{
 		$c=conectar();
 		$id=$obj->getIdDelivery();
		$state=$obj->getStatusDelivery();
		$sql="update delivery set status_delivery=$state where id_delivery=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>