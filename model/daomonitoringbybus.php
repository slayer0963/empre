<?php

include_once "../cn/connection.php";


 class DAOMonitoring
 {

 	function __construct()
 	{

 	}

 	public function getDataproduc($idbusi)
 	{
		$c = conectar();
		$sql="SELECT bu.id_bus,adg.id_prices,pro.name_pro, adg.img,c.id_color, c.name_color,m.id_mat,m.name_mat,s.id_size,s.name_size,s.number_size, adg.quantity  FROM assignment_details_general adg inner join assignment_prices_object apo on adg.id_prices=apo.id_prices inner join color c on adg.id_color=c.id_color inner join material m on adg.id_material=m.id_mat inner join sizes s on adg.id_size=s.id_size inner join product pro on pro.id_pro=apo.id_pro inner join shopping_cart_details scd on scd.id_prices=adg.id_prices and scd.id_color=adg.id_color and scd.id_mat=adg.id_material and scd.id_size=adg.id_size inner join assignment_probus aspro on aspro.id_pro=pro.id_pro inner join business bu on bu.id_bus=aspro.id_bus where  bu.id_bus=$idbusi group by id_color, id_mat, id_prices, id_size;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDatasalesDate($idbusi)
 	{
		$c = conectar();
		$sql="select cart.id_shp_c,cart.id_cl,cli.fullname_cl, CONVERT(SUM(scd.quantity*scd.precio), DECIMAL(15,2)) as total, date_format(cart.datesold,'%d-%m-%Y %h:%m:%s') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl = cart.id_cl inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbusi and cart.state=1 group by dates;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataDetailsSales($idcart)
 	{
		$c = conectar();
		$sql="SELECT date_format(cart.datesold,'%d-%m-%Y %h:%m:%s') as fecha,scd.id_shp_c,cli.fullname_cl, pro.name_pro,c.name_color,m.name_mat,s.name_size,s.number_size, scd.quantity, scd.precio, scd.descuento, CONVERT(scd.quantity*scd.precio, DECIMAL(15,2)) as total FROM shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl=cart.id_cl inner join assignment_prices_object apo on apo.id_prices=scd.id_prices inner join product pro on apo.id_pro=pro.id_pro inner join color c on c.id_color=scd.id_color inner join material m on m.id_mat = scd.id_mat inner join sizes s on s.id_size=scd.id_size where cart.id_shp_c=$idcart;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}


	public function getProducts($idbusi)
 	{
		$c = conectar();
		$sql="Select pro.id_pro, pro.name_pro from assignment_probus asp inner join product pro on asp.id_pro=pro.id_pro where asp.id_bus=$idbusi;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function getDataComent($idpro)
 	{
		$c = conectar();
		$sql="SELECT  pr.id_pro,pr.id_prev,pr.state_prev,cli.fullname_cl,cli.imagen,pr.likes,pr.coment FROM product_reviews pr inner join clients cli on pr.id_cl=cli.id_cl where pr.id_pro=$idpro;";
		$c->set_charset('utf8');
		$res = $c->query($sql);	
		$arreglo = array();
		while($re = $res->fetch_array()){
			$arreglo[]=$re;
		}
		return $arreglo;
	}

	public function updateState($id,$state)
 	{
 		$c=conectar();
		$sql="update product_reviews set state_prev=$state where id_prev=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}

	

	public function getDatachartone($idbus)
    {
        $c = conectar();
        $sql="select CONVERT(SUM((scd.quantity*scd.precio))-SUM(scd.quantity*apo.pur_price), DECIMAL(15,2)) as ganancia, date_format(cart.datesold,'%d-%m-%Y') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and cart.state=1 group by dates;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['ganancia'],'x' =>$re['dates']);
        }
        return $arreglo;
    }

    public function getDatacharttwo($idbus)
    {
        $c = conectar();
        $sql="select COUNT(cart.id_shp_c) as ventas, date_format(cart.datesold,'%d-%m-%y') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and cart.state=1 group by dates;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['ventas'],'x' =>$re['dates']);
        }
        return $arreglo;
    }

    public function getDatachartthree($idbus)
    {
        $c = conectar();
        $sql="select CONVERT(SUM((scd.quantity*scd.precio))-SUM(scd.quantity*apo.pur_price), DECIMAL(15,2)) as ganancia, date_format(cart.datesold,'%d-%m-%Y') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and cart.state=1 group by dates;";
        $c->set_charset('utf8'); 
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['ganancia'],'x' =>$re['dates']);
        }
        return $arreglo;
    }

    public function getDatachartproone($idbus,$idprice,$color,$mat,$size)
    {
        $c = conectar();
        $sql="select CONVERT(SUM(scd.quantity*scd.precio), DECIMAL(15,2)) as total, date_format(cart.datesold,'%d-%m-%Y') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl = cart.id_cl inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and adg.id_prices=$idprice and adg.id_color=$color and adg.id_material=$mat and adg.id_size=$size and cart.state=1 group by dates";
        $c->set_charset('utf8'); 
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['total'],'x' =>$re['dates']);
        }
        return $arreglo;
    }

    public function getDatachartprotwo($idbus,$idprice,$color,$mat,$size)
    {
        $c = conectar();
        $sql="select CONVERT(SUM((scd.quantity*scd.precio))-SUM(scd.quantity*apo.pur_price), DECIMAL(15,2)) as ganancia, date_format(cart.datesold,'%d-%m-%Y') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl = cart.id_cl inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and adg.id_prices=$idprice and adg.id_color=$color and adg.id_material=$mat and adg.id_size=$size and cart.state=1 group by dates";
        $c->set_charset('utf8'); 
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['ganancia'],'x' =>$re['dates']);
        }
        return $arreglo;
    }

    public function getDatachartproprofit($idbus,$idprice,$color,$mat,$size)
    {
        $c = conectar();
        $sql="select CONVERT(SUM((scd.quantity*scd.precio))-SUM(scd.quantity*apo.pur_price), DECIMAL(15,2)) as ganancia, date_format(cart.datesold,'%d-%m-%Y %h:%m:%s') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl = cart.id_cl inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and adg.id_prices=$idprice and adg.id_color=$color and adg.id_material=$mat and adg.id_size=$size and cart.state=1";
        $c->set_charset('utf8'); 
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
           $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getDatachartprosales($idbus,$idprice,$color,$mat,$size)
    {
        $c = conectar();
        $sql="select CONVERT(SUM(scd.quantity*scd.precio), DECIMAL(15,2)) as ganancia, date_format(cart.datesold,'%d-%m-%Y %h:%m:%s') as dates from shopping_cart_details scd inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c inner join clients cli on cli.id_cl = cart.id_cl inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join assignment_prices_object apo on apo.id_prices = adg.id_prices inner join assignment_probus probus on probus.id_pro=apo.id_pro inner join product pro on pro.id_pro=probus.id_pro inner join product_type pt on pt.id_tpro=pro.id_tpro inner join business bu on bu.id_bus=probus.id_bus where bu.id_bus=$idbus and adg.id_prices=$idprice and adg.id_color=$color and adg.id_material=$mat and adg.id_size=$size and cart.state=1";
        $c->set_charset('utf8'); 
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
           $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getDatachartprorating($idprice,$color,$mat,$size)
    {
        $c = conectar();
        $sql="SELECT (SUM(ran.rating)/count(ran.rating)) as media FROM product_rating ran inner join assignment_prices_object apo on ran.id_pro=apo.id_pro inner join assignment_details_general adg on adg.id_prices=apo.id_prices where adg.id_prices=$idprice and adg.id_color=$color and adg.id_material=$mat and adg.id_size=$size;";
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