<?php

require_once "userhome.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOUserhome
 {

    function __construct()
    {

    }

        /*USER CONTROL*/
    public function getProductUser($obj)
    {
        $c = conectar();
        $id=$obj->getIdBus();
        $sql="select pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.sal_price, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id;";
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