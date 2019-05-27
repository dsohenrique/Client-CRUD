<?php
//conecta ao banco de dados
include "conexao/conexao.php";
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = md5(sha1($_POST['senha']));
//$senha = $_POST['senha'];

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$query = "select login, senha, status from $nome_banco.usuarios where login = '".$login."' and senha = '".$senha."'";

$result = mysqli_query($con, $query);
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
//echo "numero de Linhas: ".mysqli_num_rows($result);
$linha = mysqli_fetch_array($result);
$status = $linha['status'];
if(mysqli_num_rows($result) > 0)
{
  $_SESSION['login'] = $login;
  $_SESSION['senha'] = $senha;
  $_SESSION['status'] = $status;
  if ($status=="2"){
	  header('location: conta_desativada.php');
	  exit;
  }else{
 // header('location:http://127.0.0.1/index.php');
  header('location: index.php');
  exit;
}}
else
{
	echo "<script>alert('Login ou Senha inválido(a), tente novamente.');</script>";
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  echo $login;
  echo $senha;
 // header('location:http://127.0.0.1/login.php');
	  header('location: usuario_invalido.php');
 exit;
  
}

?>
