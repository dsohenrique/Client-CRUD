<?php 
include "../conexao/conexao.php";
	
	$codigo = $_POST["codigo"];
	
	$cliente 	 		= $_POST["cliente"];
	$endereco 	 		= $_POST["endereco"];
	$complemento 		= $_POST["complemento"];
	$bairro		 		= $_POST["bairro"];
	$cidade 	 		= $_POST["cidade"];
	$estado 		 	= $_POST["uf"];
	$cep 		 		= $_POST["cep"];
	$cnpj 		 		= $_POST["cnpj"];
	$ie 		 		= $_POST["ie"];
	$contato_cliente 	= $_POST["contato_cliente"];
	$telefone 	 		= $_POST["telefone"];
	$fax		 		= $_POST["fax"];
	$email 		 		= $_POST["email"];
	$observacao	 		= $_POST["observacao"];
	$contrato 	 		= $_POST["contrato"];
	$data  				= $_POST["data"];
	$valor_hora			= $_POST["valor_hora"];

		$sql = "DELETE FROM cad_cliente WHERE id_cliente = '$codigo'" ;
//var_dump($sql);
//Executo a minha query
$query = mysqli_query($con, $sql);

//Verifico se o registro foi inserido com sucesso
if ($query == true) {
		?>
		<input name ="codigo" type = "hidden" id = "codigo" value = " <?php echo $codigo ?>">
		<?php
		print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/excluir_suc_cliente'</script>";
  }
else {
    echo "Não foi possivel editar o registro - entre em contato com o webmaster <br><br>".mysqli_error();
}

?>