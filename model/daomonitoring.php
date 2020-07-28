<?php

include_once "../cn/connection.php";
 /**
 *
 */
 class DAOMonitor
 {

    function __construct()
    {

    }

    public function getDatachartone()
    {
        $c = conectar();
        $sql="select CONVERT(SUM(scd.quantity*scd.precio), DECIMAL(15,2)) as ganancia, bu.name_bus as negocio from shopping_cart_details scd
            inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c
            inner join assignment_details_general adg on adg.id_prices=scd.id_prices 
            and adg.id_color=scd.id_color and adg.id_material=scd.id_mat 
            and adg.id_size=scd.id_size 
            inner join assignment_prices_object apo on apo.id_prices = adg.id_prices
            inner join assignment_probus probus on probus.id_pro=apo.id_pro
            inner join business bu on bu.id_bus=probus.id_bus where cart.state=1  group by bu.id_bus order by ganancia desc limit 5;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['ganancia'],'x' =>$re['negocio']);
        }
        return $arreglo;
    }

    public function getDatacharttwo()
    {
        $c = conectar();
        $sql="select SUM(scd.quantity) as cantidad, pt.name_tpro, CONVERT(SUM(scd.quantity*scd.precio), DECIMAL(15,2)) as money from shopping_cart_details scd
            inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c
            inner join assignment_details_general adg on adg.id_prices=scd.id_prices 
            and adg.id_color=scd.id_color and adg.id_material=scd.id_mat 
            and adg.id_size=scd.id_size 
            inner join assignment_prices_object apo on apo.id_prices = adg.id_prices
            inner join assignment_probus probus on probus.id_pro=apo.id_pro
            inner join product pro on pro.id_pro=probus.id_pro
            inner join product_type pt on pt.id_tpro=pro.id_tpro 
            inner join business bu on bu.id_bus=probus.id_bus where cart.state=1  group by pt.id_tpro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['cantidad'],'x' =>$re['name_tpro'].'-$'.$re['money']);
        }
        return $arreglo;
    }

    public function getDatachartthree()
    {
        $c = conectar();
        $sql="select CONVERT(SUM(scd.quantity*scd.precio), DECIMAL(15,2)) as money, date_format(cart.datesold,'%Y-%m-%d') as dates from shopping_cart_details scd
            inner join shopping_cart cart on cart.id_shp_c=scd.id_shp_c
            inner join assignment_details_general adg on adg.id_prices=scd.id_prices 
            and adg.id_color=scd.id_color and adg.id_material=scd.id_mat 
            and adg.id_size=scd.id_size 
            inner join assignment_prices_object apo on apo.id_prices = adg.id_prices
            inner join assignment_probus probus on probus.id_pro=apo.id_pro
            inner join product pro on pro.id_pro=probus.id_pro
            inner join product_type pt on pt.id_tpro=pro.id_tpro 
            inner join business bu on bu.id_bus=probus.id_bus where cart.state=1  group by dates;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[] = array('y' => $re['money'],'x' =>$re['dates']);
        }
        return $arreglo;
    }
}

?>