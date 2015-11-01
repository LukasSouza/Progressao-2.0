<?php
	require_once('php/core/db.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Login - Sistema de Progressão dos Docentes</title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-theme.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />

</head>

<body style="background-color:#eee;">
	<div id="header">
		<div class="container">
			<img src="img/ufba_logo.png" />
			<p>Sistema de Progressão - UFBA</p>
		</div>	
	</div>
	
	<div>
		<div class="container conteudo" >
			<div class="row">
				<div class="col-lg-12">
					
					<?php if( isset($_GET['loginerror']) ) : ?>
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">&times;</a>
							Os dados fornecidos são inválidos. Verifique-os
						</div>
					<?php endif; ?>
					
					<?php if( isset($_GET['loginerror2']) ) : ?>
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert" href="#">&times;</a>
							Sessão Encerrada!
						</div>
					<?php endif; ?>
					
					<form method="post" action="php/actions/login.php" class="bootstrap-admin-login-form login">
						<h1 class="form-signin-heading">Login</h1>
						<input class="form-control" type="text" name="cpf" placeholder="CPF" required autofocus>
						<input class="form-control" type="password" name="senha" placeholder="Senha" required>
						<div class="checkbox">
							<label>
								<input type="checkbox" value="remember-me"> Lembrar-me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	
	
	<div id="footer">
		<div class="container">
			<p><b>UFBA - Universidade Federal da Bahia</b>
			<br />Avenida Ademar de Barros, S/N - Campus de Ondina 
			<br />CEP 40.170-110 Salvador-Bahia.
			<br />Telefone: 3283-6124 / Fax: 3283-6123	</p>
		</div>
	</div>
		
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">$.noConflict();</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>