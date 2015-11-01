<?php
	error_reporting(-1);
	ini_set('display_errors', 'Off');

  	session_start();
	  require_once('../core/db.php');
  	require_once('../core/functions.php');


	if( ! logado('id') )
	{
		header('Location: ../../index.php?loginerror2');
	}

	$token = $_GET['id'];
  $query = mysql_query("SELECT * FROM usuarios WHERE token = '$token'");
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



   <div class="container conteudo">
      <h1 class="col-lg-12" style="text-align:center;"> Editar cadastro de Docente</h1>
      <div class="col-lg-offset-4 col-lg-4">
        
        <form method="post" action="actions/edit.page.php?id=<?php echo $objeto->token; ?>" class="bootstrap-login-form">
        <input type="hidden" name="idreg" id="idreg" value="<?php echo $objeto->id; ?>">
            <div class="form-group">
              <input class="form-control" type="text" name="nome" placeholder="Nome completo" maxlength="100" value="<?php echo $objeto->nome; ?>">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="email" placeholder="E-mail" maxlength="50" value="<?php echo $objeto->email; ?>">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="cpf" placeholder="CPF" maxlength="20" value="<?php echo $objeto->cpf; ?>">
            </div>
          <!--  <div class="form-group">
              <input class="form-control" type="password" name="newpass1" placeholder="Senha" maxlength="30" value="<?php echo $objeto->senha; ?>">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="newpass2" placeholder="Confirmar a Senha" maxlength="30">
            </div> -->
            <button class="btn btn-lg btn-primary" type="submit">Salvar</button>
            <a href="buscar_docente.php" class="btn btn-default cancel">Cancelar</a>
		</form>
   </div>
  </div>
  
<?php include('htmls/footer.html') ?>
</body>

</html>	