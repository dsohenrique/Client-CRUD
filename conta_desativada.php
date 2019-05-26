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
					<div align="center" class="alert alert-danger" role="alert"><h1>"USUARIO DESATIVADO"</h1></div>
				</div>
				<div class="modal-footer"><center>
					<a href="login.php"><button type="button" class="btn btn-success">OK</button></a>
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
