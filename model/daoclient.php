<?php

include_once "../cn/connection.php";
 /**
 *
 */
 class DAOClient
 {

 	function __construct()
 	{

 	}

 	public function setComent($cliente,$producto,$comentario,$valoracion)
 	{
		$c = conectar();
		$consulta= "select distinct s.id_cl, apo.id_pro from shopping_cart s inner join shopping_cart_details scd on scd.id_shp_c=s.id_shp_c inner join assignment_prices_object apo on scd.id_prices=apo.id_prices where s.state=1 and s.id_cl=$cliente and apo.id_pro=$producto;";
        $c->set_charset('utf8');
        $res1 = $c->query($consulta);
        $nrow1=$res1->num_rows;

        if ($nrow1>0) {
        	
		$sql="insert into product_reviews value (0,$cliente,$producto,'$comentario',0,1);";
		if (!$c->query($sql)) {
			print "0";
		}else{
			    $sqlra="insert into product_rating value (0,$cliente,$producto,$valoracion);";
				if (!$c->query($sqlra)) {
					print "0";
				}else{
					    echo "1"; 
				     }

		     }
		mysqli_close($c);
		}else{
			echo "2";
		}
	}

 	public function getcoment($id)
 	{
		$c = conectar();

		$arreglo = array();
		$sql="SELECT pr.id_prev,pr.coment,(select count(r.id_prev) from reactions r where r.id_prev=pr.id_prev) as likes,cli.fullname_cl,cli.imagen FROM product_reviews pr inner join clients cli on pr.id_cl = cli.id_cl where pr.id_pro=$id and pr.state_prev=1 order by id_prev desc;";
		$c->set_charset('utf8');
		$contador=0;
		$resultado = $c->query($sql);
		$r = $c->query($sql);	
		while($re = $r->fetch_array()){
			$coments=$re["coment"];
			$id_prev=$re["id_prev"];
			$likes=$re["likes"];
			$fullname_cl=$re["fullname_cl"];
			$imagen=$re["imagen"];
			$contador++;
			$consulta= "SELECT rating FROM product_rating where id_pro=$id and id_prra=$id_prev;";
			$c->set_charset('utf8');
			$resultado = $c->query($consulta);
			$res = $resultado->fetch_array();
			$rating=$res["rating"];
			
			$arreglo[] = array('id_prev'=>$id_prev,'coment' =>$coments,'likes' =>$likes,'rating' =>$rating,'fullname_cl' =>$fullname_cl,'img' =>$imagen);
			}
		
		return $arreglo;
	}

	public function getDetailsColor($id)
 	{
		$c = conectar();

		$consulta= "SELECT id_prices FROM assignment_prices_object where id_pro=$id;";
		$c->set_charset('utf8');
		$resultado = $c->query($consulta);
		$re = $resultado->fetch_array();
		$id_prices=$re["id_prices"];
		$sql="select asg.id_prices,asg.id_color,c.name_color,c.code_color,asg.id_material,asg.id_size,asg.img,asg.quantity,asg.extraprice,asg.discount,asg.state,p.id_pro, p.name_pro from assignment_details_general asg inner join color c on c.id_color=asg.id_color inner join assignment_prices_object aspo on asg.id_prices=aspo.id_prices inner join product p on aspo.id_pro=p.id_pro where asg.id_prices=$id_prices group by c.id_color;";
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