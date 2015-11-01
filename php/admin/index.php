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

  <?php if( isset($_GET['success']) ) : ?>
    <div class="container alert alert-success">
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        Senha Alterada com Sucesso!
    </div>
  <?php endif; ?>

  <?php if( isset($_GET['user-saved']) ) : ?>
    <div class="container alert alert-success">
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        Usuário Salvo com Sucesso!
    </div>
  <?php endif; ?>
	
	<div class="container conteudo">
    <h1> Pagina Inicial do Administrador</h1>
    <h2>Bem vindo(a) <?php echo $objeto->nome;?></h2>
  </div>
	
<?php include('htmls/footer.html') ?>
</body>

</html>	