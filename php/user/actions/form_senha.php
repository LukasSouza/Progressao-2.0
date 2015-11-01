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

	$antiga = mysql_real_escape_string(strip_tags(trim($_POST['oldpass'])));
	$nova1 = mysql_real_escape_string(strip_tags(trim($_POST['newpass1'])));
	$nova2 = mysql_real_escape_string(strip_tags(trim($_POST['newpass2'])));

	$id = $_SESSION['id'];

	$query = mysql_query("SELECT * FROM usuarios WHERE id = '$id'");
	$adm = mysql_fetch_object( $query );
	//$hash = $adm->hash;
	$senha = $adm->senha;

	if(empty( $antiga ) || empty( $nova1) || empty( $nova2 ) )
	{
		header('Location: ../alterarsenha.php?error');
		die();
	}

	//$encantiga = hash('sha512', $hash . $antiga);
	if( $antiga != $adm->senha)
	{

		header('Location: ../alterarsenha.php?erro_senha');
		die();
	}
	else
	{
		if($nova1 == $nova2)
		{		
			
			//$encnova = hash('sha512', $hash . $nova1);
			mysql_query("UPDATE usuarios SET senha='$nova1' WHERE id=$id ");
			header('Location: ../index.php?success');
		}
		else
			header('Location: ../alterarsenha.php?erro_nova_senha');
		die();
	}

?>