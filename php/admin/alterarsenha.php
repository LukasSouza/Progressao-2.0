<?php
  	session_start();
	require_once('../core/db.php');
  	require_once('../core/functions.php');
	
	if( ! logado('id') )
	{
		header('Location: index.php?loginerror');
	}
	
	
?>
<!DOCTYPE html>
<html>


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Admin - Sistema de Progressão dos Docentes</title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="../../css/bootstrap-theme.min.css">
	<link type="text/css" rel="stylesheet" href="../../css/style.css" media="screen" />

</head>
	
    <body style="background-color:#eee;">

	<?php include('htmls/header.html') ?>
	<div class="container conteudo">
	<div class="col-lg-offset-4 col-lg-4">
		<?php if( isset($_GET['erro_senha']) ) : ?>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Sua senha antiga está errada!
			</div>
		<?php endif; ?>

		<?php if( isset($_GET['erro_nova_senha']) ) : ?>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Novas senhas não conferem!
			</div>
		<?php endif; ?>

		<?php if( isset($_GET['error']) ) : ?>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Preencha todos os campos!
			</div>
		<?php endif; ?>
                   
		<form method="post" action="actions/form_senha.php" class="bootstrap-login-form">
			<h1>Alterar Senha:</h1>
			<div class="form-group">
				<input class="form-control" type="password" name="oldpass" placeholder="Senha antiga">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="newpass1" placeholder="Nova senha">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="newpass2" placeholder="Confirmar nova senha">
			</div>
			<button class="btn btn-lg btn-primary" type="submit">Alterar</button>
			<a href="index.php" class="btn btn-default cancel">Cancelar</a>
		</form>
		<?php $id = $_SESSION['id']; ?>		
	</div>
</div>
	<?php include('htmls/footer.html') ?>
	
    </body>
	
</html>