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
        $descrip=$obj->getDescription();
        $sql="insert into business value (0,'$_name_bus','$_pic_logo_bus',$_id_user,1,'$descrip');";
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
        $descrip=$obj->getDescription();
        $sql="update business set name_bus='$_name_bus',pic_logo_bus='$_pic_logo_bus',id_user=$_id_user, description='$descrip' where id_bus=$_id_bus;";
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
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }
    /**/
    public function getProductClient($obj)
    {
        $c = conectar();
        $id=$obj->getIdBus();
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id group by id_pro;";
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
        $sql="select pro.name_pro, asdg.img, asdg.quantity, (aspo.sal_price+asdg.extraprice) as price, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color inner join material mat on mat.id_mat=asdg.id_material inner join sizes si on si.id_size=asdg.id_size where pro.id_pro=$id and c.id_color=$id_color and mat.id_mat=$id_material and si.id_size=$id_size;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }


    public function getDataProcCli($obj)
    {
        $c = conectar();
        $id=$obj->getIdPro();
        $id_color=$obj->getIdColor();
        $id_material=$obj->getIdMat();
        $id_size=$obj->getIdSize();
        $sql="select pro.name_pro, pro.descr_pro, asdg.img, asdg.quantity, aspo.sal_price, asdg.extraprice, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color inner join material mat on mat.id_mat=asdg.id_material inner join sizes si on si.id_size=asdg.id_size where pro.id_pro=$id and c.id_color=$id_color and mat.id_mat=$id_material and si.id_size=$id_size;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }
    /*insert product*/

    public function setDataproduct($obj)
    {
        $c=conectar();
        $_idbus = $obj->getIdBus();
        $_name_pro = $obj->getNamePro();
        $_descr_pro = $obj->getDescrPro();
        $_id_cat = $obj->getIdCat();
        $_id_tpro = $obj->getIdTpro();
        $purprice = $obj->getPurPrice();
        $salprice = $obj->getSalPrice();
        $sql="insert into product value (0,'$_name_pro','$_descr_pro',$_id_cat,$_id_tpro,1);";
        if (!$c->query($sql)) {
            print "0";
        }else{
                $query= "select id_pro from product where name_pro='$_name_pro' and id_cat=$_id_cat and id_tpro=$_id_tpro;";
                $c->set_charset('utf8');
                $result = $c->query($query);
                $re = $result->fetch_array();
                $id_pro=$re["id_pro"]; 
                $sqls="insert into assignment_probus value (0,$_idbus,$id_pro);";
                if (!$c->query($sqls)) {
                    print "0".$sqls;
                }else{
                    $sqlprice="insert into assignment_prices_object value (0,$id_pro,'$purprice','$salprice',1);";
                    if (!$c->query($sqlprice)) {
                        print "0".$sqlprice;
                    }else{
                        echo "1";
                    }
                }

             }
        mysqli_close($c);
    }



    public function getvaData($obj)
    {
        $c = conectar();
        $id=$obj->getIdBus();
        $sql=" select p.id_pro, name_pro, descr_pro, cat.name_cat as id_cat, pt.name_tpro as id_tpro, state_pro, apob.id_prices from product p inner join assignment_prices_object apob on apob.id_pro=p.id_pro inner join categories cat on p.id_cat=cat.id_cat inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro inner join business busi on busi.id_bus=aspb.id_bus  where busi.id_bus=$id and not exists(select * from assignment_details_general adg where adg.id_prices=apob.id_prices); ";
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