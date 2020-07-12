<?php

include_once "../cn/connection.php";
 /**
 *
 */
 class DAOClient
 {

 	function __construct()
 	{

 	}

 	public function getDetailsColor($id)
 	{
		$c = conectar();

		$consulta= "SELECT id_prices FROM assignment_prices_object where id_pro=$id;";
		$c->set_charset('utf8');
		$resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_prices=$re["id_prices"];
		$sql="select asg.id_prices,asg.id_color,c.name_color,c.code_color,asg.id_material,asg.id_size,asg.img,asg.quantity,asg.extraprice,asg.discount,asg.state,p.id_pro, p.name_pro from assignment_details_general asg inner join color c on c.id_color=asg.id_color inner join assignment_prices_object aspo on asg.id_prices=aspo.id_prices inner join product p on aspo.id_pro=p.id_pro where asg.id_prices=$id_prices group by c.id_color;";
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