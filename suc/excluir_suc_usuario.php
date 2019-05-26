<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>
<body>

	<div class="container theme-showcase" role="main">
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<a href="outros_home.php" type="button" >Fechar</a>
							<center><h1 class="modal-title" id="myModalLabel"> USUARIO EXCLUIDO COM SUCESSO</h1></center>
						</div>
						<div class="modal-footer"><center>
							<a href="index.php"><button type="button" class="btn btn-success">HOME</button></a>
							<a href="index.php?page=form/consulta_usuario"><button type="button" class="btn btn-success">CONSULTAR USUARIO</button></a>
							<a href="index.php?page=form/cad_usuario"><button type="button" class="btn btn-success">CADASTRAR USUARIO</button></a>
						</div>
					</div>
				</div>	
  				<script>
					$(document).ready(function () {
					$('#myModal').modal({backdrop: 'static', keyboard: false})  ;
					});
				</script>
  
		</div>
	</div>
</body>
</html>