<?php
  session_start();
	require_once('../core/db.php');
  require_once('../core/functions.php');

  if( ! logado('id') )
	{
		header('Location: ../../index.php?loginerror2');
	}
  $id = $_SESSION['id'];
  $query = mysql_query("SELECT * FROM usuarios WHERE id = $id");
  $objeto = mysql_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">

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
	 		
    <?php if( isset($_GET['erro_senha']) ) : ?>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Senhas não conferem!
			</div>
		<?php endif; ?>
    
    <?php if( isset($_GET['error']) ) : ?>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Preencha todos os campos!
			</div>
		<?php endif; ?>
  
    <div class="container conteudo">
      <h1 class="col-lg-offset-4"> Cadastro de Docente</h1>
      <div class="col-lg-offset-4 col-lg-4">
        
        <form method="post" action="actions/form_cadastro_usuario.php" class="bootstrap-login-form">
			     <h2>Insira todos os dados:</h2>
            <div class="form-group">
              <input class="form-control" type="text" name="nome" placeholder="Nome completo">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="cpf" placeholder="CPF">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="newpass1" placeholder="Senha">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="newpass2" placeholder="Confirmar a Senha">
            </div>
            <button class="btn btn-lg btn-primary" type="submit">Cadastrar</button>
            <a href="index.php" class="btn btn-default cancel">Cancelar</a>
		</form>
    </div>
    </div>
	
  
<?php include('htmls/footer.html') ?>
</body>

</html>	