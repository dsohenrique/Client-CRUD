<?php 
include "../conexao/conexao.php";

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

		$sql = "
		INSERT INTO cad_cliente (cliente, endereco, complemento, bairro, cidade, uf, cep, cnpj, ie, contato_cliente, telefone, fax, email, contrato, observacao,  data, valor_hora)
		VALUE ('$cliente','$endereco','$complemento','$bairro','$cidade','$estado','$cep','$cnpj','$ie','$contato_cliente','$telefone','$fax','$email','$contrato', '$observacao','$data', '$valor_hora') ";
		

		//Executo a minha query
$query = mysqli_query($con, $sql);
//Verifico se o registro foi inserido com sucesso
if ($query == true) {
		print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/cad_suc_empresa'</script>";
  }
else {
    echo "Não foi possivel editar o registro - entre em contato com o webmaster <br><br>".mysqli_error();
}
	
?>