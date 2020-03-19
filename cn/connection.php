<?php
require_once 'parameters.php';

function conectar(){ 
$con = new mysqli(HOST,USER,PASS,BD);
	if($con->connect_errno){
		print "Ocurrio este error: ". $con->connect_error;
	}
	return $con;
}


?>