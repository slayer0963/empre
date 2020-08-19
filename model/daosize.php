<?php

require_once "size.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOSize
 {

    function __construct()
    {

    }

    public function getData()
    {
        $c = conectar();
        $sql="select * from sizes;";
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
        $c->set_charset('utf8');
        $number_size = $obj->getNumberSize();
        $name_size = $obj->getNameSize();
        $sql="insert into sizes value (0,'$number_size','$name_size',1);";
        if (!$c->query($sql)) {
            print "0";
        }else{
                echo "1";

             }
        mysqli_close($c);
    }


    public function updateData($obj)
    {
        $c=conectar();
        $c->set_charset('utf8');
        $id=$obj->getIdSize();
        $number_size = $obj->getNumberSize();
        $name_size = $obj->getNameSize();
        $sql="update sizes set number_size='$number_size', name_size='$name_size' where id_size=$id;";
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
        $id=$obj->getIdSize();
        $state=$obj->getStateSize();
        $sql="update sizes set state_size=$state where id_size=$id;";
        if (!$c->query($sql)) {
            print "0";
        }else{
                echo "1";
             }
        mysqli_close($c);
    }


 }
 ?>
