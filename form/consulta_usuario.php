<?php

include "conexao/conexao.php";
require_once "consulta/consulta_usuario.php";
?>

<html>
<head>
<link href="stilo_consulta.css" type="text/css" rel="stylesheet">
	<link rel='stylesheet' href="calendar.css" type='text/css'/>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.mask.min.js"></script>
	<script type="text/javascript" language="javascript" src='calendar.js'></script>
</head>
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
</script>
<body>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1 align = "center" class="panel-heading">LISTA DE USUARIOS</h1>
  </div>
  <div class="panel-body">

<div id="conteudo" align = "center">
	<table class="table table-striped table-hover panel panel-default" align='center'>			
		<form class="form-horizontal" name="frmConsulta" method="POST" action="" >
                <div class="form-group form-group-lg">
				<tr align = "center" colspan='8'>
					<td>
						<span><strong>CODIGO</strong></span>
					</td>	
					<td>
						<input name="cod_user" type="text" id="cod_user" class="form-control" onkeypress='return SomenteNumero(event)'/>
					</td>
					<td>
						<span><strong>USUARIO:</strong></span>
					</td>	
					<td>
						<input name="login" type="text" class="form-control" id="login" placeholder="Busca por Nome ex: Diego">
					</td>
					<td>
						<span><strong>STATUS:</strong></span>
					</td>
					<td>
						<select class="form-control" name = "status">
							<option></option>
							<option value="1" 	<?php if ($status==1){ echo "selected"; } ?>>ATIVO</option>
							<option value="2" 	<?php if ($status==2){ echo "selected"; } ?>>INATIVO</option>
						</select>
					</td>
						
					 <td>
						<input type="submit" class="btn btn-primary" name="consultar" value="consultar">
						<input name="opcao" type="hidden" id="opcao" value="<?php echo $opcao ?>">
						<input name="link" type="hidden" id="link" value="3"></strong></span>
					</td>
				</tr>
            </form>
		</table>
		</div>
		<div class="panel panel-default">
			<table class="table table-striped table-hover" align='center'>		
				<tr align="center">
					<td><font size="3" face="Arial Black">CODIGO	</font></td>
					<td><font size="3" face="Arial Black">LOGIN		</font></td>
					<td><font size="3" face="Arial Black">NOME		</font></td>
					<td><font size="3" face="Arial Black">STATUS	</font></td>
						<?php if ($nivell == '1') {?>
							<td><font size="3" face="Arial Black">DEL	</font></td>
						<?php }else{?>
						<?php } ?>

				</tr>

				<?php

				     while($dados = mysqli_fetch_array($result)):
					$classe = ($count % 2 == 1) ? 'class="listra1"' : 'class="listra2"';
				  	{						
                ?>

					<tr align="center" <?php echo $classe ?>>
						<td class="linha" width="80">	<font size="3" face="Arial Black">	<?php echo" $dados[cod_user]" ?></font> </td>
						<td class="linha" width="405">	<font size="3" face="Arial">		<?php echo"	$dados[login]	" ?></font> </td>
						<td class="linha" width="405">	<font size="3" face="Arial">		<?php echo"	$dados[nome]	" ?></font> </td>
						<!--<td class="linha" width="145">	<font size="3" face="Arial">		<?php echo"	$dados[status]	" ?></font> </td> -->
						<td>
							<a href = "<?php echo "form/alt_usuario.php?opcao=Alterar&codigo="  .$dados['cod_user'] ?> "type="button" title="Alterar" class="btn btn-default btn-primary" aria-label="Editar Contato">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
						<?php if ($nivell == '1'){ ?>
							<td>
								<!-- <a href="<?php echo "form/excluir_usuario.php?&opcao=Alterar&codigo="  .$dados['cod_user'] ?> " type="button" title="Excluir" class="btn btn-default btn-danger" aria-label="Excluir Contato">
									<span class="glyphicon glyphicon-remove"></span> -->
								<a href="<?php if ($dados['cod_user']==1)   echo "permissao.php";   else  echo "form/excluir_usuario.php?&opcao=Alterar&codigo="  .$dados['cod_user']  ?> " type="button" title="Excluir" class="btn btn-default btn-danger" aria-label="Excluir Contato">
								<span class="glyphicon glyphicon-remove"></span>
								</a>
							</td>
							<?php }else{?>
						<?php } ?>

					</tr>
				<?php }
					$count++;
					endwhile;
				?>

			</table>
		</div>
</div>

</div>
</div>
</body>
</html>


