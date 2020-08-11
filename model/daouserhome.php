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


    public function getDatatype($id)
    {
        $c = conectar();
       $sql="select DISTINCT pt.id_tpro, pt.name_tpro from product p 
        inner join assignment_prices_object apob on apob.id_pro=p.id_pro inner join categories cat on p.id_cat=cat.id_cat 
        inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro 
        inner join business busi on busi.id_bus=aspb.id_bus  where busi.id_bus=$id and exists(select * from assignment_details_general adg 
        where adg.id_prices=apob.id_prices);";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getDatacategories($id)
    {
        $c = conectar();
        $sql="select DISTINCT cat.id_cat, cat.name_cat from product p 
        inner join assignment_prices_object apob on apob.id_pro=p.id_pro inner join categories cat on p.id_cat=cat.id_cat 
        inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro 
        inner join business busi on busi.id_bus=aspb.id_bus  where busi.id_bus=$id and exists(select * from assignment_details_general adg 
        where adg.id_prices=apob.id_prices);";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getDatacategoriesbytype($id,$type)
    {
        $c = conectar();

        $sql="select DISTINCT cat.id_cat, cat.name_cat from product p 
        inner join assignment_prices_object apob on apob.id_pro=p.id_pro inner join categories cat on p.id_cat=cat.id_cat 
        inner join product_type pt on p.id_tpro = pt.id_tpro inner join assignment_probus aspb on aspb.id_pro=p.id_pro 
        inner join business busi on busi.id_bus=aspb.id_bus  where busi.id_bus=$id and pt.id_tpro=$type and exists(select * from assignment_details_general adg 
        where adg.id_prices=apob.id_prices);";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }


    public function getcart($id)
    {
        $c = conectar();
        $sql="SELECT  scd.id_shp_c_d, cho.id_shp_c, apo.id_prices, m.id_mat, c.id_color, s.id_size, pro.name_pro, adg.img, scd.quantity, scd.precio, c.name_color,m.name_mat,s.name_size,s.number_size, adg.quantity as tquantity FROM shopping_cart_details scd inner join assignment_prices_object apo on scd.id_prices=apo.id_prices inner join color c on scd.id_color=c.id_color inner join material m on scd.id_mat=m.id_mat inner join sizes s on scd.id_size=s.id_size inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join product pro on pro.id_pro=apo.id_pro inner join shopping_cart cho on cho.id_shp_c=scd.id_shp_c where cho.id_cl=$id and cho.state=0;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getwish($id)
    {
        $c = conectar();
        $sql="SELECT scd.id_w_l_d,wis.id_cl, pro.name_pro, apo.id_prices, adg.img,m.id_mat, c.id_color, s.id_size, (apo.sal_price+adg.extraprice) as sal_price,adg.discount, c.name_color,m.name_mat,s.name_size,s.number_size FROM wish_list_details scd inner join assignment_prices_object apo on scd.id_prices=apo.id_prices inner join color c on scd.id_color=c.id_color inner join material m on scd.id_mat=m.id_mat inner join sizes s on scd.id_size=s.id_size inner join assignment_details_general adg on adg.id_prices=scd.id_prices and adg.id_color=scd.id_color and adg.id_material=scd.id_mat and adg.id_size=scd.id_size inner join product pro on pro.id_pro=apo.id_pro inner join wish_list wis on wis.id_w_l=scd.id_w_l where wis.id_cl=$id;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }


    /*UPDATE QUANTITY CART*/
    public function updatequantityshop($id_shp_c_d,$n)
    {
        
        $c=conectar();
 
        $sql="update shopping_cart_details set quantity=$n where id_shp_c_d=$id_shp_c_d;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 

             }
        mysqli_close($c);
        
    }


    /*UPDATE INVENTARY*/
    public function updateinv($idp,$idc,$idm,$ids,$val)
    {
        
        $c=conectar();
        $query= "select quantity from assignment_details_general where id_prices=$idp and id_color=$idc and id_material=$idm and id_size=$ids;";
        $c->set_charset('utf8');
        $result = $c->query($query);
        $re = $result->fetch_array();
        $quantity=$re["quantity"];
        $nq=$quantity-$val;
        $sql="update assignment_details_general set quantity=$nq where id_prices=$idp and id_color=$idc and id_material=$idm and id_size=$ids;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 

             }
        mysqli_close($c);
        
    }

    /*UPDATE STATUS CART*/
    public function updateStatusCart($idc)
    {
        
        $c=conectar();
        $sql="update shopping_cart set state=1, datesold=now() where id_shp_c=$idc;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{

                 $sql="insert into delivery values(0,$idc,0)";
                if (!$c->query($sql)) {
                    print "0".$sql;
                }else{
                        echo "1"; 

                     }
             }
        mysqli_close($c);
        
    }    


    //DELETE FROM CART//
    public function deleteshop($id_shp_c_d)
    {
        $c=conectar();
       
        $sql="delete from shopping_cart_details where id_shp_c_d=$id_shp_c_d;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 

             }
        mysqli_close($c);
    }


    public function deletewish($id_w_l_d)
    {
        $c=conectar();
       
        $sql="delete from wish_list_details where id_w_l_d=$id_w_l_d;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 

             }
        mysqli_close($c);
    }



    /*INSERT REACTION*/
    public function setReaction($id_cl,$id_prev)
    {
        $c=conectar();

        $consulta= "select * from reactions where id_cl=$id_cl and id_prev=$id_prev;";
        $c->set_charset('utf8');
        $res1 = $c->query($consulta);
        $nrow1=$res1->num_rows;
        //echo $nrow1;
        if ($nrow1==0) {
            $sql="insert into reactions values (0,$id_cl,$id_prev);";
            if (!$c->query($sql)) {
               // print "0".$sql;
            }else{
                    echo "1"; 

                 }
                 mysqli_close($c);
        }else{
            $sql="delete from reactions where id_cl=$id_cl and id_prev=$id_prev;";
            if (!$c->query($sql)) {
                //print "0".$sql;
            }else{
                    echo "2"; 

                 }
                 mysqli_close($c);
        }
        
        
        
        
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
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, pro.id_cat, pro.id_tpro, pro.state_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id group by id_pro;";
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

    public function getProductall()
    {
        $c = conectar();
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size,bu.name_bus, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join business bu on bu.id_bus = aspro.id_bus group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getProductalltype($type)
    {
        $c = conectar();
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size,bu.name_bus, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join business bu on bu.id_bus = aspro.id_bus where pro.id_tpro=$type group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getProductallcat($cat)
    {
        $c = conectar();
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size,bu.name_bus, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join business bu on bu.id_bus = aspro.id_bus where pro.id_cat=$cat group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getProductClientbyrange($id,$range)
    {
        $c = conectar();
        
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id and ((aspo.sal_price + asdg.extraprice)-((aspo.sal_price + asdg.extraprice)*asdg.discount))<=$range group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getProductClientbyrangehome($range)
    {
        $c = conectar();
        
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where ((aspo.sal_price + asdg.extraprice)-((aspo.sal_price + asdg.extraprice)*asdg.discount))<=$range group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getProductClientbytype($id,$type)
    {
        $c = conectar();
        
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id and pro.id_tpro=$type group by id_pro;";
        $c->set_charset('utf8');
        $res = $c->query($sql); 
        $arreglo = array();
        while($re = $res->fetch_array()){
            $arreglo[]=$re;
        }
        return $arreglo;
    }

    public function getProductClientbytypeandcat($id,$type,$cat)
    {
        $c = conectar();
        
        $sql="select asdg.id_color,asdg.id_material,asdg.id_size, pro.id_pro, pro.name_pro, asdg.img, asdg.quantity, aspo.pur_price, aspo.sal_price, asdg.discount, pro.descr_pro, asdg.extraprice from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro where aspro.id_bus=$id and pro.id_tpro=$type and pro.id_cat=$cat  group by id_pro;";
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
        $sql="select aspo.id_prices,pro.name_pro, pro.descr_pro, asdg.img, asdg.quantity, aspo.sal_price, asdg.extraprice, asdg.discount from assignment_details_general asdg inner join assignment_prices_object aspo on asdg.id_prices=aspo.id_prices inner join assignment_probus aspro on aspro.id_pro=aspo.id_pro inner join product pro on pro.id_pro=aspro.id_pro inner join color c on c.id_color=asdg.id_color inner join material mat on mat.id_mat=asdg.id_material inner join sizes si on si.id_size=asdg.id_size where pro.id_pro=$id and c.id_color=$id_color and mat.id_mat=$id_material and si.id_size=$id_size;";
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




    public function setcarshop($client,$idprices,$color,$material,$size,$precio,$descuento)
    {
        $c=conectar();
        
        
                $query= "SELECT * FROM shopping_cart where id_cl=$client and state=0;";
                $c->set_charset('utf8');
                $result = $c->query($query);
                $re = $result->fetch_array();
                $id_shp_c=$re["id_shp_c"];
                if($id_shp_c==0){
                    $sqls="insert into shopping_cart value (0,$client,0,0,null);";
                    if (!$c->query($sqls)) {
                        print "0".$sqls;
                    }else{
                        $query= "SELECT * FROM shopping_cart where id_cl=$client and state=0;";
                        $c->set_charset('utf8');
                        $result = $c->query($query);
                        $re = $result->fetch_array();
                        $id_shp_c=$re["id_shp_c"];
                        $sqls="insert into shopping_cart_details value (0,$id_shp_c,$idprices,$color,$material,$size,1,$precio,$descuento);";
                        if (!$c->query($sqls)) {
                            print "0".$sqls;
                        }else{
                            echo "1";
                        }
                    }
                }
                else{
                    $query= "SELECT count(*) npro FROM shopping_cart_details where id_shp_c=$id_shp_c and id_prices=$idprices and id_color=$color and id_mat=$material and id_size=$size;";

                    $c->set_charset('utf8');
                    $result = $c->query($query);
                    $re = $result->fetch_array();
                    $npro=$re["npro"];
                    if($npro<=0){
                        $sqls="insert into shopping_cart_details value (0,$id_shp_c,$idprices,$color,$material,$size,1,$precio,$descuento);";
                        if (!$c->query($sqls)) {
                            print "0".$sqls;
                        }else{
                            echo "1";
                        }
                    }
                    else{
                        echo "3";
                    }
                }
             
        mysqli_close($c);
    }

    public function setwishlist($client,$idprices,$color,$material,$size,$precio,$descuento)
    {
        $c=conectar();
        
        
                $query= "SELECT * FROM wish_list where id_cl=$client and state=0;";
                $c->set_charset('utf8');
                $result = $c->query($query);
                $re = $result->fetch_array();
                $id_w_l=$re["id_w_l"];
                if($id_w_l==0){
                    $sqls="insert into wish_list value (0,$client,0);";
                    if (!$c->query($sqls)) {
                        print "0".$sqls;
                    }else{
                        $sqls="insert into wish_list_details value (0,$id_w_l,$idprices,$color,$material,$size);";
                        if (!$c->query($sqls)) {
                            print "0".$sqls;
                        }else{
                            echo "1";
                        }
                    }
                }
                else{
                    $query= "SELECT count(*) npro FROM wish_list_details where id_w_l=$id_w_l and id_prices=$idprices and id_color=$color and id_mat=$material and id_size=$size;";

                    $c->set_charset('utf8');
                    $result = $c->query($query);
                    $re = $result->fetch_array();
                    $npro=$re["npro"];
                    if($npro<=0){
                        $sqls="insert into wish_list_details value (0,$id_w_l,$idprices,$color,$material,$size);";
                        if (!$c->query($sqls)) {
                            print "0".$sqls;
                        }else{
                            echo "1";
                        }
                    }
                    else{
                        echo "3";
                    }
                }
             
        mysqli_close($c);
    }
       
}
 
 ?>