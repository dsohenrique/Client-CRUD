<?php
include "../conexao/conexao.php";


	$cod_user = $_REQUEST["codigo"];
	$sql = "SELECT * FROM usuarios WHERE cod_user = '$cod_user'";
	$resultado = mysqli_query($con, $sql) or die ("não foi possível executar a consulta");
	$linha = mysqli_fetch_array($resultado);


	$nome 	 	 	 = $linha['nome'];
	$login 			 = $linha['login'];
	$senha 			 = $linha['senha'];
	$nivel		 	 = $linha['nivel'];
	$status 		 = $linha['status'];
	$data			 = $linha['data'];
	$obs 			 = $linha['obs'];

include "../index.php";
?>
<html>
<head>
	<link rel='stylesheet' href="calendar.css" type='text/css'/>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/jquery.mask.min.js"></script>
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
						<center><h2><font face="Trebuchet MS, Arial, Helvetica, sans-serif" >ALTERAR DADOS </font></h2>
					</div>					
				<div class="modal-body" align="center">
					<div class="form-group" background-color="white">
						
						<table  class="table-striped table-list list" >
							<form class="form-horizontal" name="form1" method="POST" action="../grava_bd/alt_grava_usuario.php"/>
							<div class="form-group form-group-lg">	
								<tr>                       
									<td><span>Nome:</span></td>
									<td ><input style="text-transform:uppercase" class="form-control" name="nome" type="text" id="nome" value="<?php echo $nome ?>"  /></td>
								</tr>
								<tr>                       
									<td><span>Usuario:</span></td>
									<td ><input style="text-transform:uppercase" class="form-control" name="login" type="text" id="login" value="<?php echo $login ?>" /></td>
								</tr>
								<tr>                       
									<td><span>Senha:</span></td>
									<td ><input class="form-control" name="senha" type="password" id="senha" value="<?php echo $senha ?>" /></td>
								</tr>	
								<tr> 
									<td><span>Nivel:</span></td>
									<td>
										<select class="form-control" name = "nivel" id="nivel"/>
											<option value="1"<?php if ($nivel == "1" ){ echo "selected"; }?>>ADMINISTRADOR</option>
											<option value="2"<?php if ($nivel == "2" ){ echo "selected"; }?>>SUPERVISOR</option>
											<option value="3"<?php if ($nivel == "3" ){ echo "selected"; }?>>USUARIO</option>					
										</select>
									</td>
								</tr>
								<tr> 
									<td><span>Status:</span></td>
									<td>
										<select class="form-control" name = "status" id="status" />
											<option value="1"<?php if ( $status == "1" ){ echo "selected"; }?>>ATIVO</option>
											<option value="2"<?php if ( $status == "2" ){ echo "selected"; }?>>INATIVO</option>
										</select>
									</td>
								</tr>								
								<tr>
									<td><span>Data:</span></td>
									<td><input class="form-control" name="data" type="date" id="data" value="<?php echo $data ?>"/></td>
									
								</tr>
								
								<tr>
									<td><span>Observação:</span></td>
									<td align="left"><textarea class="form-control" name="obs" id="obs" ><?php echo $obs ?></textarea></td>
								</tr>	

									<div class="modal-footer" align="center">
										<table align="center">
											<td colspan="1">            
												<td><br><br>
													<input name ="codigo" type = "hidden" id = "codigo" value = " <?php echo $cod_user ?>">
													<?php if ($nivell==1){?>
														<button type="submit" class="btn btn-primary" onclick="return valida_campo()"  onClick="submit()"  >Alterar</button>
													<?php }else{?>
													<?php } ?>
												    
													<a href="../index.php?page=form/consulta_usuario&contato="><button type="button" class="btn btn-primary">Cancelar</button> </a>
												</td>
											</td>
										</table>
									</div>
							</form>
						</table>
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
	</div>
</div>
</body>
</html>						
