<?php
	
	error_reporting(-1);
	ini_set('display_errors', 'On');
	session_start();
	require_once('../core/db.php');

	$cpf = mysql_real_escape_string(strip_tags(trim($_POST['cpf'])));
	$senha = mysql_real_escape_string(strip_tags(trim($_POST['senha'])));

	if(empty( $cpf ) || empty( $senha ))
	{
		header('Location: ../../index.php?loginerror');	
		die();
	}
	
	$query = mysql_query("SELECT * FROM usuarios WHERE cpf = $cpf");
	
	if( mysql_num_rows( $query ) > 0)
	{
		$objeto = mysql_fetch_object($query);
		
		//$hash = $objeto->hash;
		$serversenha = $objeto->senha;
		//$encsenha = hash('sha512', $hash . $senha);

		if( $serversenha == $senha )
		{
			$_SESSION['id'] = $objeto->id;
			$_SESSION['nome'] = utf8_encode($objeto->nome);
			$_SESSION['adm'] = $objeto->adm;
			if($objeto->adm == true){
				header('Location: ../admin/index.php');
				die();
			}
			else{
				header('Location: ../user/index.php?id='.$objeto->token);
				die();
			}
		}
		else
		{
			header('Location: ../../index.php?loginerror');	
		}
	}
	else
	{	
		header('Location: ../../index.php?loginerror');
			
	}
?>