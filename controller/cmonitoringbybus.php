<?php 

	require_once "../model/daomonitoringbybus.php";



	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartone'){
	    $dat=new DAOMonitoring();
	    echo json_encode($dat->getDatachartone($_POST['id']));
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatacharttwo'){
	    $dat=new DAOMonitoring();
	    echo json_encode($dat->getDatacharttwo($_POST['id']));
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartthree'){
	    $dat=new DAOMonitoring();
	    echo json_encode($dat->getDatachartthree($_POST['id']));
	}

	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
	if($page=='getDatachartfour'){
	    $dat=new DAOMonitoring();
	    echo json_encode($dat->getDatacharttwo($_POST['id']));
	}


	$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getDataproduc'){
    $dat = new DAOMonitoring();
         $r=$dat->getDataproduc($_GET['id']);
         $table="";
         foreach($r as $c){
         $btquanti='';
         $btnview='';
         $imagen ='';
  
         $name_pro="'".$c["name_pro"]."'";
         $img="'".$c["img"]."'";
         $name_color="'".$c["name_color"]."'";
         $name_mat="'".$c["name_mat"]."'";
         $name_size="'".$c["name_size"]."'";
         $number_size="'".$c["number_size"]."'";
         $quantity="'".$c["quantity"]."'";




         $btnview='&nbsp;<a class=\"btn-floating #ffeb3b blue\" id=\"btnd'.$c["name_pro"].'\"><i class=\"material-icons\">visibility</i></a>';

        $imagen = '<a href=\"../view/imgdetails/'.$c["img"].'\" data-lightbox=\"image-'.$name_pro.'\" data-title=\"'.$c["name_pro"].'\"><img src=\"../view/imgdetails/'.$c["img"].'\" style=\"height: 20px; width: 20px;\" id=\"\"  class=\"\"></a>';

        
         if($c["quantity"]<7 && $c["quantity"]>=4){
         	$btquanti='&nbsp;<a class=\"btn-floating #ffeb3b yellow center-align\">'.$c["quantity"].'</a>';
         }
         else if($c["quantity"]<=3){
         	$btquanti='&nbsp;<a class=\"btn-floating #ffeb3b red pulse center-align\" >'.$c["quantity"].'</a>';
         }
         else{
         	$btquanti='&nbsp;<a class=\"btn-floating #ffeb3b green center-align\" >'.$c["quantity"].'</a>';
         }

         $table.='{
                  "name_pro":"'.$c["name_pro"].'",
                  "img":"&nbsp;&nbsp;'.$imagen.'&nbsp;'.$c["name_pro"].'",
                  "data":"<br>Color:'.$c["name_color"].' <br>Material:'.$c["name_mat"].'<br>Talla:'.$c["name_size"].'-'.$c["number_size"].'",
                  "quantity":"'.$btquanti.'",
                  "quantity2":"'.$c["quantity"].'",
                  "actions":"'.$btnview.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}



$page = isset($_GET['btngetData'])?$_GET['btngetData']:'';
if($page=='getSalesdate'){
    $dat = new DAOMonitoring();
         $r=$dat->getDatasalesDate($_GET['id']);
         $table="";
         foreach($r as $c){
         $btnstate='';
         $btnedit='';
         $imagen ='';
 
         $btnedit='&nbsp;<a class=\"btn-floating #ffeb3b blue\" id=\"btnd'.$c["id_cl"].'\"><i class=\"material-icons\">dvr</i></a>';


         $table.='{
                  "fullname_cl":"'.$c["fullname_cl"].'",
                  "total":"$'.$c["total"].'",
                  "dates":"'.$c["dates"].'",
                  "actions":"'.$btnedit.'"
                },';    
     }
        $table = substr($table,0, strlen($table) - 1);
        echo '{"data":['.$table.']}';   
}
 ?>