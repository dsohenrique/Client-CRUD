<?php 
include "../conexao/conexao.php";

	$cod_user = $_REQUEST["codigo"];
	$login 	 		= $_POST["login"];
	$nome 	 		= $_POST["nome"];
	$senha			= $_POST["senha"];
	$nivel		 	= $_POST["nivel"];
	$status 	 	= $_POST["status"];
	$data 		 	= $_POST["data"];
	$obs 		 	= $_POST["obs"];

	$sql = "DELETE FROM usuarios WHERE cod_user = '$cod_user'" ;

//Executo a minha query
$query = mysqli_query($con, $sql);

//Verifico se o registro foi inserido com sucesso
if ($query == true) {
		?>
		<input name ="codigo" type = "hidden" id = "codigo" value = " <?php echo $codigo ?>">
		<?php
		print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/excluir_suc_usuario'</script>";
  }
else {
    echo "Não foi possivel alterar o usuario <br><br>".mysqli_error();
}			
			
//var_dump($sql);*/

?>