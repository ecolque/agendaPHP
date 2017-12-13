<?php

	include('conector.php');
	
	$con = new ConectorBD('localhost', 'root', '');
	$response['conexion'] = $con->initConexion('test');	 	

	//USUARIO 1
	$user1['name'] = "'Juan Perez'";
	$user1['birth_date'] = "'1980-02-01'";
	$user1['email'] = "'juan@gmail.com'";
	$user1['password'] = "'".password_hash('juan', PASSWORD_DEFAULT)."'";

	//USUARIO 2
	$user2['name'] = "'Ernesto'";
	$user2['birth_date'] = "'1980-12-01'";
	$user2['email'] = "'ernesto@gmail.com'";
	$user2['password'] = "'".password_hash('ernesto', PASSWORD_DEFAULT)."'";

	//USUARIO 3
	$user3['name'] = "'Marco Perez'";
	$user3['birth_date'] = "'1990-02-01'";
	$user3['email'] = "'marco@gmail.com'";
	$user3['password'] = "'".password_hash('marco', PASSWORD_DEFAULT)."'";

	
	$table = "usuarios";
	if ($response['conexion']=='OK') {

	    if($con->insertData($table, $user1)){
	      $response['msg']="exito en la inserción";
	    }else {
	      $response['msg']= "Hubo un error y los datos no han sido cargados";
	    }

	   if($con->insertData($table, $user2)){
	      $response['msg']="exito en la inserción";
	    }else {
	      $response['msg']= "Hubo un error y los datos no han sido cargados";
	    }

	    if($con->insertData($table, $user3)){
	      $response['msg']="exito en la inserción";
	    }else {
	      $response['msg']= "Hubo un error y los datos no han sido cargados";
	    }


	}else {
	    $response['msg']= "No se pudo conectar a la base de datos";
	}

	 echo json_encode($response);

 ?>
