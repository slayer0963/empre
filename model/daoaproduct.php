<?php

require_once "apobject.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOAproduct
 {

 	function __construct()
 	{

 	}

	public function getDataAP($busi)
 	{
		$c = conectar();
		$sql="select p.id_pro, name_pro, descr_pro, cat.name_cat as id_cat, pt.name_tpro, pt.id_tpro, state_pro from product p inner join categories cat on p.id_cat=cat.id_cat inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro inner join business busi on busi.id_bus=aspb.id_bus where busi.id_bus=$busi";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

 	public function getDataB($id_usu)
 	{
		$c = conectar();
		$sql="select bu.id_bus,bu.name_bus,bu.pic_logo_bus,u.fullname_user as id_user, bu.state_bus  from business bu inner join users u on bu.id_user=u.id_user where u.id_user=$id_usu;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


	public function getDataExis($idprod,$namecolor,$namemat,$namesize)
 	{
		$c = conectar();
		$consulta="select id_prices from assignment_prices_object where id_pro=$idprod";
        $c->set_charset('utf8');
        $resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_prices=$re["id_prices"];

		$consulta="select id_mat from material where name_mat='$namemat'";
        $c->set_charset('utf8');
        $resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_mat=$re["id_mat"];

		$consulta="select id_color from color where name_color='$namecolor'";
        $c->set_charset('utf8');
        $resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_color=$re["id_color"];

		$consulta="select id_size from sizes where name_size='$namesize'";
        $c->set_charset('utf8');
        $resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_size=$re["id_size"];


		$sql="select * FROM assignment_details_general where id_color=$id_color and id_material=$id_mat and id_size=$id_size and id_prices=$id_prices;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;

		}
		if(count($arreglo)==0){
			$arreglo[] = array('id_color' =>$namecolor,'id_material' =>$namemat,'id_size' =>$namesize,'existe'=>0);


		}else{
			$arreglo['existe'] = 1;
		}
		return $arreglo;
	}

	

	public function getDataColor()
 	{
		$c = conectar();

		

		$sql="SELECT * FROM color;";

		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataMaterial()
 	{
		$c = conectar();
		$sql="SELECT * FROM material;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataSize()
 	{
		$c = conectar();
		$sql="SELECT * FROM sizes;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


	public function Verifi($id)
	{
		$c = conectar();
		$sql="select count(*) as pro from assignment_prices_object where id_pro=$id;";
		$c->set_charset('utf8');
		$res = $c->query($sql);
		while($re = $res->fetch_array()){
			return $re['pro'];
		}
		
	}

	public function getDataU()
 	{
		$c = conectar();
		$sql="select id_user, fullname_user, imagen from users;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


	public function getvaDataGen($id)
    {
        $c = conectar();
        $consulta="select id_prices from assignment_prices_object where id_pro=$id";
        $c->set_charset('utf8');
        $resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_prices=$re["id_prices"];

        $sql="select adg.id_prices, adg.id_color, adg.id_material, adg.id_size, adg.extraprice, adg.discount, adg.img, c.name_color, m.name_mat, s.name_size, s.number_size, adg.quantity, adg.state FROM assignment_details_general adg inner join sizes s on s.id_size=adg.id_size inner join color c on c.id_color=adg.id_color inner join material m on m.id_mat=adg.id_material where id_prices=$id_prices;";
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
 		$idpro = $obj->getIdPro();
		$purprice = $obj->getPurPrice();
		$salprice = $obj->getSalPrice();
		$sql="insert into assignment_prices_object value (0,$idpro,'$purprice','$salprice',1);";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 

		     }
		mysqli_close($c);
 	}




 }
 ?>