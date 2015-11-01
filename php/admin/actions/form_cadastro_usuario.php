<?php
	error_reporting(-1);
	ini_set('display_errors', 'On');

  	session_start();
	require_once('../../core/db.php');
  	require_once('../../core/functions.php');
	require_once('../../actions/gerarToken.php');

	if( ! logado('id') )
	{
		header('Location: ../../../index.php?loginerror2');
	}

	$nome = mysql_real_escape_string(strip_tags(trim($_POST['nome'])));
	$email = mysql_real_escape_string(strip_tags(trim($_POST['email'])));
	$cpf = mysql_real_escape_string(strip_tags(trim($_POST['cpf'])));
	$senha1 = mysql_real_escape_string(strip_tags(trim($_POST['newpass1'])));
	$senha2 = mysql_real_escape_string(strip_tags(trim($_POST['newpass2'])));


	if(empty( $nome ) || empty( $email) || empty( $cpf) || empty( $senha1) || empty( $senha2 ) )
	{
		header('Location: ../cadastro_docentes.php?error');
		die();
	}

	if($senha1 == $senha2)
	{		
		$token = generateRandomString(64);
		mysql_query("INSERT INTO usuarios (cpf, nome, senha, email, adm, token) 
					VALUES ($cpf, '$nome', $senha1, '$email', false, '$token'); 
		");

		header('Location: ../index.php?user-saved');
	}
	else
		header('Location: ../cadastro_docentes.php?erro_senha');
	die();

?>