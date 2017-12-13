<?php
  
	include('conector.php');
	session_start();

  	  $data['title'] = "'".$_POST['titulo']."'";
	  $data['start'] = "'".$_POST['start_date']."'";
	  $data['allDay'] = "'".$_POST['allDay']."'";
	  $data['end'] = "'".$_POST['end_date']."'";
	  $data['time_start'] = "'".$_POST['start_hour']."'";
	  $data['time_end'] = "'".$_POST['end_hour']."'";
	  $data['user_id'] = "'".$_SESSION['id']."'";
	
	  $con = new ConectorBD('localhost','root','');
	  $response['conexion'] = $con->initConexion('test');

	  if ($response['conexion']=='OK') {
	    if($con->insertData('eventos', $data)){
	      $response['msg']="exito en la inserción";
	    }else {
	      $response['msg']= "Hubo un error y los datos no han sido cargados";
	    }
	  }else {
	    $response['msg']= "No se pudo conectar a la base de datos";
	  }

	  echo json_encode($response);

 ?>
