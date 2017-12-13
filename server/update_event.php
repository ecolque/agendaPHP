<?php
  
	include('conector.php');
	session_start();	  
	  $data['start'] = "'".$_POST['start_date']."'";	  
	  $data['end'] = "'".$_POST['end_date']."'";
	  $data['time_start'] = "'".$_POST['start_hour']."'";
	  $data['time_end'] = "'".$_POST['end_hour']."'";	  
	
	  $con = new ConectorBD('localhost','root','');
	  $response['conexion'] = $con->initConexion('test');

	  if ($response['conexion']=='OK') {	  	
	    if($con->actualizarRegistro('eventos', $data, "id = "+$_POST['id'])){
	      $response['msg']="exito en la actualizacion";
	    }else {
	      $response['msg']= "Hubo un error y los datos no han sido cargados";
	    }
	  }else {
	    $response['msg']= "No se pudo conectar a la base de datos";
	  }

	  echo json_encode($response);

 ?>