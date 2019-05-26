<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode 
simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
o caminho para a página principal do site (sistema), burlando assim a obrigação 
de fazer um login, com isso se ele não estiver feito o login não será 
criado a session, então ao verificar que a session não existe a página 
redireciona o mesmo para a index.php. */
include "conexao/conexao.php";
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:login.php');
}

$logado = $_SESSION['login'];
	$sql = "SELECT cod_user, nome, nivel FROM usuarios where login = '".$logado."'";
	$resultado = mysqli_query($con, $sql) or die ("não foi possível executar a consulta!");
	$linha = mysqli_fetch_array($resultado);
	$usuario	= $linha['nome'];
	$nivell		= $linha['nivel'];


?>

<!DOCTYPE html>
<html lang="PT-Br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cadastro de Clientes</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS PERSONALIZADO -->
  <link href="bootstrap/css/style.css" rel="stylesheet">
  
</head>
<?php
include "conexao/conexao.php";

?>

<body>

  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Clientes</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php?page=">Início</a></li>
		  <!-- verificando o nivel de acesso ao usuario
				para ver se ele pode ter o menu Cadastro/Usuarios ou não -->
		<?php if ($nivell == '1' or $nivell == '2') {?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="index.php?page=form/cad_cliente">Clientes</a></li>
		<?php if ($nivell == '1') {?>
				<li><a href="index.php?page=form/cad_usuario">Usuarios</a></li>
		<?php }else{?>
		<?php } ?>
				</ul>
			</li>
		<?php }else{?>
		<?php } ?>
		<!---------------------------------------->
		  <li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultar <span class="caret"></span></a>
            <ul class="dropdown-menu">
			 <li><a href="index.php?page=form/consulta_cliente&contato=">Clientes</a></li>
		<?php if ($nivell == '1') {?>
			 <li><a href="index.php?page=form/consulta_usuario&contato=">Usuarios</a></li>
		<?php }else{?>
		<?php } ?>
			 </ul>
		  </li>
          <li><a href="logout.php?sair=logout">Sair</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
           <form class="navbar-form navbar-left" role="search" name="busca" action="index.php">
              <div class="form-group">
			  <?php echo "Usuario: ".$usuario ?>
			  </div>
            </form>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <!-- funcção para uma mensagem de marketing principal ou chamada à ação-->
      <?php 
      $page='';
      if( empty($_REQUEST['page'])){  
        ?>
        <div class="jumbotron">
          <h2><?php echo "Bem vindo(a) ".$usuario ?> - Menu Principal!</h2>
		  <?php if ($nivell == "1" ){?> <p>Sua permissao é de: ADMINISTRADOR</p>
          <p>Aqui você cadastrar e gerenciar seus clientes e usuarios a qualquer momento e em qualquer lugar!</p>			  
		  <?php }elseif($nivell == "2" ){?> <p>Sua permissao é de: SUPERVISOR</p> 
          <p>Aqui você cadastra os seus clientes e pode realizar buscas a qualquer momento e em qualquer lugar!</p>		  
		  <?php }elseif($nivell == "3" ){?> <p>Sua permissao é de: USUARIO</p>
          <p>Aqui você pode realizar buscas a qualquer momento e em qualquer lugar!</p>		  
		  <?php } ?> 


        </div>

        <?php }else{
          $pagina = $_REQUEST['page'];
          include ($pagina.'.php');
        }
        ?>

      </div> <!-- /container -->

      <?php
      mysqli_close($con);

      ?>
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="bootstrap/js/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
