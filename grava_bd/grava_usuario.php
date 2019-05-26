<?php 
include "../conexao/conexao.php";

	$usuario 	 = $_POST["login"];
	$sql1 = "SELECT login FROM usuarios WHERE login = '$usuario'";
	$result = $con->query($sql1);
	$row = mysqli_fetch_assoc($result);
	$usuario1 = implode($row);

	if ($usuario==$usuario1){
	print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/cad_usuario_error'</script>" ;
	} else  {	
	$nome				= $_POST["nome"];
	$usuario 	 		= $_POST["login"];
	$senha 	 			= md5(sha1($_POST["senha"]));
	$nivel 				= $_POST["nivel"];
	$status				= $_POST["status"];
	$data		 		= $_POST["data"];
	$obs 	 			= $_POST["obs"];

		$sql = "
		INSERT INTO usuarios (login, nome,senha, nivel, status, data, obs)
		VALUE ('$usuario','$nome','$senha','$nivel', $status,'$data','$obs') ";
		

//Executo a minha query
$query = mysqli_query($con, $sql);
//Verifico se o registro foi inserido com sucesso
if ($query == true) {
		print "<script type = 'text/javascript'> location.href = '../index.php?page=suc/cad_suc_usuario'</script>";
  }
else {
    echo "Não foi possivel incluir novo Usuario <br><br>".mysqli_error();
}
}
?>