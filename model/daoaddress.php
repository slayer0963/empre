<?php

require_once "address.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOAddress
 {

    function __construct()
    {

    }

    public function getData($id)
    {
        $c = conectar();
        $sql="select id_add, a.id_cl, fullname_cl, contact, department, city, streetdir, numberdir, reference, activestate, a.state from address a inner join clients c on c.id_cl=a.id_cl where a.state=1 and a.id_cl=$id;";
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
        $id_cl = $obj->getIdCl();
        $contact= $obj->getContact();
        $department = $obj->getDepartment();
        $city = $obj->getCity();
        $streetdir = $obj->getStreetdir();
        $numberdir = $obj->getNumberdir();
        $reference = $obj->getReference();

        $consulta= "select * from address where id_cl=$id_cl;";
        $c->set_charset('utf8');
        $res1 = $c->query($consulta);
        $nrow1=$res1->num_rows;
        if ($nrow1==0) {
            $sql="insert into address value (0,$id_cl,'$contact','$department','$city','$streetdir','$numberdir','$reference',1,1);";
        }else{
            $sql="insert into address value (0,$id_cl,'$contact','$department','$city','$streetdir','$numberdir','$reference',0,1);";
        }
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 

             }
        mysqli_close($c);
    }


    public function updateData($obj)
    {
        $c=conectar();
        $id=$obj->getIdAdd();
        $contact= $obj->getContact();
        $department = $obj->getDepartment();
        $city = $obj->getCity();
        $streetdir = $obj->getStreetdir();
        $numberdir = $obj->getNumberdir();
        $reference = $obj->getReference();
        $sql="update address set contact='$contact', department='$department',city='$city',streetdir='$streetdir',numberdir='$numberdir',reference='$reference' where id_add=$id;";
        if (!$c->query($sql)) {
            print "0".$sql;
        }else{
                echo "1"; 
             }
        mysqli_close($c);
    }

    public function updateState($obj)
    {
        $c=conectar();
        $id=$obj->getIdAdd();
        $id_cl = $obj->getIdCl();
        $state=$obj->getActivestate();
        $sql="update address set activestate=0 where id_cl=$id_cl;";
        if (!$c->query($sql)) {
            print "0";
        }else{
                $sql="update address set activestate=$state where id_add=$id;";
                if (!$c->query($sql)) {
                    print "0";
                }else{
                        echo "1"; 
                     }
             }
        mysqli_close($c);
    }

    public function delete($obj)
    {
        $c=conectar();
        $id=$obj->getIdAdd();
        $sql="update address set state=0 where id_add=$id;";
        if (!$c->query($sql)) {
            print "0";
        }else{
                echo "1"; 
             }
        mysqli_close($c);
    }


 }
 ?>