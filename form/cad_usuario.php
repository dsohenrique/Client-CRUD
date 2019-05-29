<?php
include "conexao/conexao.php";
?>
<html>
<head>
	<link rel='stylesheet' href="calendar.css" type='text/css'/>
	<link href="../bootstrap/css/stilo_sistema.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.mask.min.js"></script>
	<script type="text/javascript" language="javascript" src='calendar.js'></script>
</head>
<script type="text/javascript" language="javascript">
//função para validar todos campos
function valida_campo()
{
	var nome 			= form1.nome.value;
	var login 			= form1.login.value;
	var senha		 	= form1.senha.value;
	var nivel			= form1.nivel.value;
	var data 			= form1.data.value;
	var obs				= form1.obs.value;

if(nome == "")
{
	alert ('O campo do Nome não pode ser vazio');
	form1.nome.focus();
	return false;
}
	
if(login == "")
{
	alert ('O campo do Usuario não pode ser vazio');
	form1.login.focus();
	return false;
}
if(senha == "")
{
	alert ('O campo com Senha não pode ser vazio');
	form1.senha.focus();
	return false;
}
if(nivel == "0")
{
	alert ('O Campo Nivel não pode ser vazio');
	form1.nivel.focus();
	return false;
}
if(data == "")
{
	alert ('O campo Data não pode ser vazio');
	form1.data.focus();
	return false;
}
if(obs == "")
{
	alert ('O campo Observação não pode ser vazio');
	form1.obs.focus();
	return false;
}

}

</script>
<body>
						
<div class="container theme-showcase" role="main">
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">	
					<div class="alert alert-info" role="alert">
						<center><h2><font face="Trebuchet MS, Arial, Helvetica, sans-serif" >NOVO CADASTRO</font></h2>
					</div>
				<div class="modal-body" align="center">
					<div class="form-group">
						<div class="form-group form-group-lg">
						<form class="form-horizontal" name="form1" method="POST" action="grava_bd/grava_usuario.php" >
						<table align="center" class="table-striped table-list list" >
							
							
								<tr>                       
									<td><span>Nome:</span></td>
									<td ><input style="text-transform:uppercase" class="form-control" name="nome" type="text" id="nome"  /></td>
								</tr>
								<tr>                       
									<td><span>Usuario:</span></td>
									<td ><input style="text-transform:uppercase" class="form-control" name="login" type="text" id="login"  /></td>
								</tr>
								<tr>                       
									<td><span>Senha:</span></td>
									<td ><input style="text-transform:uppercase" class="form-control" name="senha" type="password" id="senha"  /></td>
								</tr>	
								<tr> 
									<td><span>Nivel:</span></td>
									<td>
										<select class="form-control" name = "nivel" id="nivel">
											<option value="0"></option>
											<option value="1">ADMINISTRADOR</option>
											<option value="2">SUPERVISOR</option>
											<option value="3">USUARIO</option>					
										</select>
									</td>
							
								</tr>
								<tr> 
									<td><span>Status:</span></td>
									<td>
										<select class="form-control" name = "status" id="status">
											<option value="1">ATIVO</option>
											<option value="2">INATIVO</option>
										</select>
									</td>
							
								</tr>								
								<tr>
									<td><span>Data:</span></td>
									<td><input class="form-control" name="data" type="date" id="data" value="<?php echo date('Y-m-d');?>" /></td>
									
								</tr>
								
								<tr>
									<td><span>Observação:</span></td>
									<td align="left"><textarea class="form-control" name="obs" id="obs" onclick="javascript:retiraAcento(this);" ></textarea></td>
								</tr>															
						
									<div class="modal-footer" align="center">
										<table align="center">
											<td colspan="1">            
												<td><br><br>
												    <button type="submit" class="btn btn-primary" onclick="return valida_campo()"  onClick="submit()">Cadastrar</button>
													<button type="reset" class="btn btn-warning">Limpar</button>
													<a href="index.php"><button type="button" class="btn btn-danger">Cancelar</button> </a>
												</td>
											</td>
										</table>
									</div>
							</form>
						</table>
					</div>
				</div>
				</div>
				<!-- Essa função faz que quando a tela modal está aberta, ele evita que a tela fecha quando clicado fora da caixa. -->
  				<script>
					$(document).ready(function () {
						$('#myModal').modal({backdrop: 'static', keyboard: false})  ;
					});
				</script>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>						
