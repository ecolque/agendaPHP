<?php
  
	require('conector.php');
	session_start();

	if (isset($_SESSION['id'])) {

	    $con = new ConectorBD('localhost', 'root', '');
	    if ($con->initConexion('test') == 'OK') {
		      $resultado = $con->consultar(['eventos'], ['time_end','time_start','allDay','end','start', 'title', 'id'], "WHERE user_id ='".$_SESSION['id']."'");		      		     		   
		      $i=0;
		      while ($fila = $resultado->fetch_assoc()) {
		        $response['eventos'][$i]['id']=$fila['id'];
		        $response['eventos'][$i]['title']=$fila['title'];
		        $response['eventos'][$i]['start']=$fila['start'];
		        $response['eventos'][$i]['end']=$fila['end'];
		        $response['eventos'][$i]['allDay']=$fila['allDay'] == 1 ? true : false;
		        $response['eventos'][$i]['time_start']=$fila['time_start'];
		        $response['eventos'][$i]['time_end']=$fila['time_end'];
		        /*$response['data'][$i]['placa']=$fila['placa'];
		        $response['data'][$i]['fabricante']=$fila['fabricante'];
		        $response['data'][$i]['referencia']=$fila['referencia'];
		        $response['data'][$i]['fecha_salida']=$fila['fecha_salida'];
		        $response['data'][$i]['fecha_llegada']=$fila['fecha_llegada'];
		        $response['data'][$i]['hora_salida']=$fila['hora_salida'];
		        $response['data'][$i]['hora_llegada']=$fila['hora_llegada'];*/
		        $i++;
		      }
		      $response['msg'] = "OK";

	    }else {
	      $response['msg'] = "No se pudo conectar a la Base de Datos";
	    }
	}else {
	   $response['msg'] = "No se ha iniciado una sesión";
	}

	  echo json_encode($response);


 ?>
