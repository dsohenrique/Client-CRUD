<?php

include "conexao/conexao.php";
                    @$cliente 	= $_POST["cliente"];
					@$cnpj 		= $_POST["cnpj"];
					@$status 	= $_POST["contrato"];
					if ($cnpj != "" )
                    {
                        $sql =  "SELECT * FROM cad_cliente WHERE cnpj LIKE '%".$cnpj."%' ORDER BY cliente asc ";						
                    }
                    elseif($cliente != "" )
                    {
                        $sql = "SELECT * FROM cad_cliente WHERE cliente LIKE '%".$cliente."%' ORDER BY cliente ";
                    }
                    elseif($status != "" )
                    {
                        $sql = "SELECT * FROM cad_cliente WHERE contrato = '".$status."' ORDER BY cliente ";
                    }					
                    else
                    {
                        $sql =  "select * from cad_cliente WHERE contrato = 'SIM' or contrato = 'NAO' order by CLIENTE LIMIT 500 ";
                    }
					$result = mysqli_query($con, $sql) or die (' deu tudo errado');
					$count = mysqli_num_rows($result);
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
<script type="text/javascript" language="javascript">
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
 
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
 
function cpfcnpj(v){
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
 
    if (v.length <= 11) { //CPF
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
 
    } else { //CNPJ
 
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")
 
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
 
    }
 
    return v
 
}

</script>
<body>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1 align = "center" class="panel-heading">LISTA DE CLIENTES</h1>
  </div>
  <div class="panel-body">

<div id="conteudo" align = "center">
	<table class="table table-striped table-hover panel panel-default" align='center'>			
		<form class="form-horizontal" name="frmConsulta" method="POST" action="" >
                <div class="form-group form-group-lg">
				<tr align = "center" colspan='8'>
					<td>
						<span><strong>CNPJ/CPF:</strong></span>
					</td>	
					<td>
						<input name="cnpj" type="text" id="cnpj" maxlength="18" class="form-control" onkeypress='mascaraMutuario(this,cpfcnpj)'>
					</td>
					<td>
						<span><strong>Cliente:</strong></span>
					</td>	
					<td>
						<input name="cliente" type="text" class="form-control" id="cliente" placeholder="Busca por Nome ex: Diego">
					</td>
					<td>
						<span><strong>CONTRATO:</strong></span>
					</td>
					<td>
						<select class="form-control"name = "contrato">
							<option></option>
							<option value="SIM" 	<?php if ($status=="SIM"){ echo "selected"; } 		?>>SIM		</option>
							<option value="NAO" 	<?php if ($status=="NAO"){ echo "selected"; } 		?>>NAO		</option>
							<option value="INATIVO" <?php if ($status=="INATIVO"){ echo "selected"; }	?>>INATIVO	</option>								
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
					<td><font size="3" face="Arial Black">ID		</font></td>
					<td><font size="3" face="Arial Black">EMPRESA	</font></td>
					<td><font size="3" face="Arial Black">CPF/CNPJ	</font></td>
					<td><font size="3" face="Arial Black">TELEFONE	</font></td>
					<td><font size="3" face="Arial Black">CONTATO	</font></td>
					<td><font size="3" face="Arial Black">CONTRATO	</font></td>
					<td><font size="3" face="Arial Black">EDITAR	</font></td>
						<?php if ($nivell == '1') {?>
							<td><font size="3" face="Arial Black">DEL		</font></td>
						<?php }else{?>
						<?php } ?>

				</tr>

				<?php

				     while($dados = mysqli_fetch_array($result)):
					$classe = ($count % 2 == 1) ? 'class="listra1"' : 'class="listra2"';
				  	{						
                ?>

					<tr align="center" <?php echo $classe ?>>
						<td class="linha" width="80">	<font size="1" face="Arial Black">	<?php echo" 			$dados[id_cliente]" 		?></font> </td>
						<td class="linha" width="405">	<font size="1" face="Arial">		<?php echo"			 	$dados[cliente]" 			?></font> </td>
						<td class="linha" width="145">	<font size="1" face="Arial">		<?php echo"				$dados[cnpj]" 				?></font> </td>
						<td class="linha" width="60">	<font size="1" face="Arial">		<?php echo" 			$dados[telefone]"			?></font> </td>
						<td class="linha" width="100">	<font size="1" face="Arial">		<?php echo" 			$dados[contato_cliente]" 	?></font> </td>
						<td class="linha" width="80">	<font size="1" face="Arial">		<?php echo"			 	$dados[contrato]" 			?></font> </td>
						<td>
							<a href = "<?php echo "form/alt_cliente.php?opcao=Alterar&codigo="  .$dados['id_cliente'] ?> "type="button" title="Alterar" class="btn btn-default btn-primary" aria-label="Editar Contato">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
						<?php if ($nivell == '1') {?>
							<td>
								<a href="<?php echo "form/excluir_cliente.php?&opcao=Alterar&codigo="  .$dados['id_cliente'] ?> " type="button" title="Excluir" class="btn btn-default btn-danger" aria-label="Excluir Contato">
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


