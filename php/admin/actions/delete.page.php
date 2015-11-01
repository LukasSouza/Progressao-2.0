<?php
	error_reporting(-1);
	ini_set('display_errors', 'On');

  	session_start();
	require_once('../../core/db.php');
  	require_once('../../core/functions.php');


	if( ! logado('id') )
	{
		header('Location: ../../../index.php?loginerror2');
	}

	$token = $_GET['id'];

	mysql_query("DELETE FROM usuarios WHERE token = '$token'");
	
	header('Location: ../buscar_docente.php?deleted');
	

?>