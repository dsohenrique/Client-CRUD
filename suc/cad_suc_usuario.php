<?php
include "conexao/conexao.php";
	$sql = "SELECT cod_user, nome FROM usuarios   ORDER BY cod_user DESC ";
	$resultado = mysqli_query($con, $sql) or die ("não foi possível executar a consulta!");
	$linha = mysqli_fetch_array($resultado);
	$usuario	= $linha['nome'];	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo " $usuario " ?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

<body>
	<div class="container theme-showcase" role="main">
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<center><h5 class="modal-title" id="myModalLabel"> CADASTRO EFETUADO COM SUCESSO! </h5></center>							
					</div>
					<div class="modal-body">
						<center><h4 class="modal-title" id="myModalLabel"> LOGIN:<?php echo "$usuario"; ?></h4></center>
					</div>
					<div class="modal-footer"><center>
						<a href="index.php"><button type="button" class="btn btn-success">HOME</button></a>
					</div>
				</div>
			</div>	
		</div>
		<script>
			$(document).ready(function () {
				$('#myModal').modal('show');
			});
		</script>
	</div>

</body>
</html>
