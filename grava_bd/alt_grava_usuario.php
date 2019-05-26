<?php 
include "../conexao/conexao.php";

	$senha1		= $_POST["senha"];
	$cod_user = $_REQUEST["codigo"];
	$sql1 = "SELECT senha FROM usuarios WHERE cod_user = '$cod_user'";
	$result = $con->query($sql1);
	$row = mysqli_fetch_assoc($result);
	$senha2 = implode($row);
//var_dump($senha1);	
	
//	if ($senha1==$senha2) echo "'$senha2'====='$senha1'" ; else  echo "'$senha2' =diferente= '$senha1'";

	if ($senha1==$senha2){
	
	$login 	 		= $_POST["login"];
	$nome 	 		= $_POST["nome"];
	$nivel		 	= $_POST["nivel"];
	$status 	 	= $_POST["status"];
	$data 		 	= $_POST["data"];
	$obs 		 	= $_POST["obs"];

	$sql2 = "		
			UPDATE usuarios SET
			login    		= '$login',
			nome     		= '$nome',
			nivel      		= '$nivel',
			status			= '$status',
			data			= '$data',
			obs				= '$obs'
			WHERE cod_user 	= '$cod_user' ";

//Executo a minha query
$query1 = mysqli_query($con, $sql2);

//Verifico se o registro foi inserido com sucesso
if ($query1 == true) {
		?>
		<input name ="codigo" type = "hidden" id = "codigo" value = " <?php echo $codigo ?>">
		<?php
		print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/alt_suc_usuario'</script>";
  }
else {
    echo "Não foi possivel alterar o usuario <br><br>".mysqli_error();
}			


}else{
	
	$cod_user = $_REQUEST["codigo"];
	$login 	 		= $_POST["login"];
	$nome 	 		= $_POST["nome"];
	$senha			= md5(sha1($_POST["senha"]));
	$nivel		 	= $_POST["nivel"];
	$status 	 	= $_POST["status"];
	$data 		 	= $_POST["data"];
	$obs 		 	= $_POST["obs"];

	$sql = "		
			UPDATE usuarios SET
			login    		= '$login',
			nome     		= '$nome',
			senha			= '$senha',
			nivel      		= '$nivel',
			status			= '$status',
			data			= '$data',
			obs				= '$obs'
			WHERE cod_user 	= '$cod_user' ";		

//Executo a minha query
$query = mysqli_query($con, $sql);

//Verifico se o registro foi inserido com sucesso
if ($query == true) {
		?>
		<input name ="codigo" type = "hidden" id = "codigo" value = " <?php echo $codigo ?>">
		<?php
		print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/alt_suc_usuario'</script>";
  }
else {
    echo "Não foi possivel alterar o usuario <br><br>".mysqli_error();
}			
}
			
//var_dump($sql);*/

?>