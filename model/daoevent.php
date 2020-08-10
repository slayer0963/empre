<?php

require_once "events.php";
include_once "../cn/connection.php";
 /**
 *
 */
 class DAOEvent
 {

 	function __construct()
 	{

 	}

 	public function getEventT($fecha)
 	{
		$c = conectar();
		$consulta="select id_event, DATE_FORMAT(str_to_date(finishdate, '%Y-%m-%d'),'%Y-%m-%d') as finishdate from events_d where  state_event=1;";
        $c->set_charset('utf8');
        $res = $c->query($consulta);
        $arreglo = array();
        $timestampb="";
        $timestamps = "";
        $sql2="";
		while($re = $res->fetch_array()){
			$timestampb = strtotime($re['finishdate']);
			$timestamps = strtotime($fecha);

			if($timestamps > $timestampb)
			{
				$sql="update events_d set state_event=2 where id_event=".$re['id_event'].";";
				if (!$c->query($sql)) {
					print "0";
				}
				else
				{
					echo "1"; 
				}
			}
			else
			{
				$sql2="select  name_e, img, details, DATE_FORMAT(str_to_date(releasedate, '%Y-%m-%d'),'%d-%m-%Y') as releasedate,DATE_FORMAT(str_to_date(finishdate, '%Y-%m-%d'),'%d-%m-%Y') as finishdate from events_d where id_event=".$re['id_event'].";";
				$c->set_charset('utf8');
				$res2 = $c->query($sql2);
				while($re2 = $res2->fetch_array()){
					$arreglo[]=$re2;
				}
			}

		}
		

		return $arreglo;
	}

 	public function getData()
 	{
		$c = conectar();
		$sql="select * from events_d;";
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
 		$name = $obj->getNameE();
		$img = $obj->getImg();
		$details = $obj->getDetails();
		$fini = $obj->getReleasedate();
		$ffin = $obj->getFinishdate();
		$sql="insert into events_d value (0,'$name','$img','$details','$fini','$ffin',1);";
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
 		$id=$obj->getIdEvent();
 		$name = $obj->getNameE();
		$img = $obj->getImg();
		$details = $obj->getDetails();
		$fini = $obj->getReleasedate();
		$ffin = $obj->getFinishdate();
		$sql="update events_d set name_e='$name', img='$img', details='$details', releasedate='$fini', finishdate='$ffin' where id_event=$id;";
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
 		$id=$obj->getIdEvent();
		$state=$obj->getStateEvent();
		$sql="update events_d set state_event=$state where id_event=$id;";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    echo "1"; 
		     }
		mysqli_close($c);
 	}


 }
 ?>