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
	$nome = mysql_real_escape_string(strip_tags(trim($_POST['nome'])));
	$email = mysql_real_escape_string(strip_tags(trim($_POST['email'])));
	$cpf = mysql_real_escape_string(strip_tags(trim($_POST['cpf'])));
	/*$senha1 = mysql_real_escape_string(strip_tags(trim($_POST['newpass1'])));
	$senha2 = mysql_real_escape_string(strip_tags(trim($_POST['newpass2']))); */


	if(empty( $nome ) || empty( $email) || empty( $cpf) /*|| empty( $senha1) || empty( $senha2 ) */)
	{
		header('Location: ../buscar_docente.php?error');
		die();
	}

	/*if($senha1 == $senha2)
	{	*/	

		mysql_query("UPDATE usuarios SET cpf = $cpf, nome = '$nome', email = '$email' WHERE token = '$token'") or die;
		//mysql_query("UPDATE usuarios SET (cpf = $cpf, nome = 'nome', senha = $senha1, email = 'email' WHERE token = $token");
		header('Location: ../buscar_docente.php?edited');
	/*}
	else
		header('Location: ../cadastro_docentes.php?erro_senha');
	die();
	*/
?>