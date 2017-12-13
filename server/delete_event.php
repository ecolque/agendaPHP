<?php

	include('conector.php');
	session_start();	  
	  $data['id'] = "'".$_POST['id']."'";	  
	
	  $con = new ConectorBD('localhost','root','');
	  $response['conexion'] = $con->initConexion('test');

	  if ($response['conexion']=='OK') {	  		  	
	    if($con->eliminarRegistro('eventos', "id = "+$_POST['id'])){
	      $response['msg']="exito en la eliminacion";
	    }else {
	      $response['msg']= "Hubo un error y los datos no han sido cargados";
	    }
	  }else {
	    $response['msg']= "No se pudo conectar a la base de datos";
	  }

	  echo json_encode($response);

 ?>
