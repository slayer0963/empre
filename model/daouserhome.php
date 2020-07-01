<?php

require_once "userhome.php";
require_once "business.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOUserhome
 {

    function __construct()
    {

    }


    public function getBusiness($obj)
    {
        $c = conectar();
        $id=$obj->getIdUser();
        $sql="select * from business b inner join users u on b.id_user=u.id_user where u.id_user=$id";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }





    /*INSERT BUSI*/
    public function setDataBusi($obj)
    {
        if($obj=="x"){
            echo "x";
        }else{
        $c=conectar();
        $_name_bus=$obj->getNameBus();
        $_pic_logo_bus=$obj->getPicLogoBus();
        $_id_user=$obj->getIdUser();
        $sql="insert into business value (0,'$_name_bus','$_pic_logo_bus',$_id_user,1);";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 

             }
        mysqli_close($c);
        }
    }



    /*UPDATE BUSI*/

    public function setDataBusiEdit($obj)
    {
        if($obj=="x"){
            echo "x";
        }else{
        $c=conectar();
        $_id_bus=$obj->getIdBus();
        $_name_bus=$obj->getNameBus();
        $_pic_logo_bus=$obj->getPicLogoBus();
        $_id_user=$obj->getIdUser();
        $sql="update business set name_bus='$_name_bus',pic_logo_bus='$_pic_logo_bus',id_user=$_id_user where id_bus=$_id_bus;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 
             }
        mysqli_close($c);
        }
    }



        /*USER CONTROL*/
    public function getProductUser($obj)
    {
        $c = conectar();
        $id=$obj->getIdBus();
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

     public function getProductUserid($obj)
    {
        $c = conectar();
        $id=$obj->getIdPro();
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where pro.id_pro=$id group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }




    /*GET COLORS*/
    public function getColorsp($obj)
    {
        $c = conectar();
        $id=$obj->getIdPro();
        $sql="select asdg.id_color, c.name_color, c.code_color from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color where pro.id_pro=$id group by asdg.id_color;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }


    public function getmaterialsp($obj)
    {
        $c = conectar();
        $id=$obj->getIdPro();
        $id_color=$obj->getIdColor();
        $sql="select asdg.id_material, mat.name_mat from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color inner join material mat on mat.id_mat=asdg.id_material where pro.id_pro=$id and c.id_color=$id_color group by asdg.id_material;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getsizesp($obj)
    {
        $c = conectar();
        $id=$obj->getIdPro();
        $id_color=$obj->getIdColor();
        $id_material=$obj->getIdMat();
        $sql="select asdg.id_size, si.number_size, si.name_size from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color inner join material mat on mat.id_mat=asdg.id_material inner join sizes si on si.id_size=asdg.id_size where pro.id_pro=$id and c.id_color=$id_color and mat.id_mat=$id_material group by asdg.id_size;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getDataProc($obj)
    {
        $c = conectar();
        $id=$obj->getIdPro();
        $id_color=$obj->getIdColor();
        $id_material=$obj->getIdMat();
        $id_size=$obj->getIdSize();
        $sql="select asdg.img, asdg.quantity, (aspo.sal_price+asdg.extraprice) as price, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color inner join material mat on mat.id_mat=asdg.id_material inner join sizes si on si.id_size=asdg.id_size where pro.id_pro=$id and c.id_color=$id_color and mat.id_mat=$id_material and si.id_size=$id_size;";
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