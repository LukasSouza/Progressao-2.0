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
	
$a = $_GET['a'];	
	
if ($a == "buscar") {
 
	$palavra = trim($_POST['palavra']);

	$query = mysql_query("SELECT * FROM usuarios WHERE nome LIKE '%".$palavra."%' ORDER BY nome ASC");
}
else
  $query = mysql_query("SELECT * FROM usuarios ORDER BY nome ASC");
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
		<?php if( isset($_GET['deleted']) ) : ?>
			<div class="alert alert-success">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Usuário deletado com sucesso!
			</div>
		<?php endif; ?>

		<?php if( isset($_GET['edited']) ) : ?>
			<div class="alert alert-success">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Modificações Salvas!
			</div>
		<?php endif; ?>
		
		<?php if( isset($_GET['error']) ) : ?>
			<div class="alert alert-danger">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				Preencha todos os campos!
			</div>
		<?php endif; ?>

<div class="container" style="margin-bottom: 20px;">
	<div class="row">
		<!-- content -->
		<div class="col-md-12">
			<div class="row">
				<div class="col-lg-9">
					<div class="page-header">
						<?php //verificar quantidade de inscritos 
							$totalUsers = mysql_query("SELECT Cpf FROM usuarios");	
							//$totalUsers = mysql_query("SELECT Cpf FROM usuarios WHERE adm = false");			
							$totalUsers = mysql_num_rows($totalUsers);										
						?>
						<h1>Total de docentes Cadastrados: <?php echo $totalUsers;?></h1>
					</div>
				</div>
				<br/>
				<form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" >
					<input type="text" name="palavra" />
					<input type="submit"  value="Buscar" />
				</form>
			</div>
		
			<div class="row">			
				<div class="col-lg-12">		
					<a style="margin-bottom:20px;" href="buscar_docente.php" class="btn btn-primary">Mostrar Todos</a>
							
					<table class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">						
						<thead>
							<tr role="row">
								<th>Nome</th>
								<th>CPF</th>
								<th>Email</th>
								<th style="width: 155px;">Opções</th>
							</tr>
						</thead>								
						<tbody>									
						<?php while( $gg = mysql_fetch_object( $query ) ) : ?>
							<tr>
								<td><?php echo utf8_encode($gg->nome); ?></td>
								<td><?php echo $gg->cpf; ?></td>
								<td><?php echo $gg->email; ?></td>
								<td>
									<a href="editar_docentes.php?id=<?php echo $gg->token; ?>">
										<button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i>Editar</button>
									</a>
									
									<script>
										function confirmDelete(delUrl) {
											if (confirm("Tem certeza que deseja deletar este usuário?")) {
												document.location = delUrl;
											}
										}
									</script>																
									
									<a href="javascript:confirmDelete('actions/delete.page.php?id=<?php echo $gg->token; ?>')">
										<button class="btn btn-sm btn-primary">Excluir</button>
									</a>
								</td>
							</tr>
						<?php endwhile; ?>						
						</tbody>						
					</table>					
				</div>				
			</div>			
		</div>		
	</div>			
</div>

	
<?php include('htmls/footer.html') ?>
<script>
function showResult(str) {
	var consulta;
	if(str)
		document.write("SELECT * FROM usuarios WHERE name = " + str + "% ORDER BY Nome ASC");
	else 
		document.write("SELECT * FROM usuarios ORDER BY Nome ASC");
}
</script>
</body>

</html>	