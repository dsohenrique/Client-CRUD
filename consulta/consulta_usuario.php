<?php
require_once "conexao/conexao.php";
                    @$login 	= $_POST["login"];
					@$cod_user 	= $_POST["cod_user"];
					@$status 	= $_POST["status"];
					if ($cod_user != "" )
                    {
                        $sql =  "SELECT * FROM usuarios WHERE cod_user LIKE '%".$cod_user."%' ORDER BY cod_user asc ";						
                    }
                    elseif($login != "" )
                    {
                        $sql = "SELECT * FROM usuarios WHERE nome LIKE '%".$login."%' ORDER BY nome ";
                    }
                    elseif($status != "" )
                    {
                        $sql = "SELECT * FROM usuarios WHERE status = '".$status."' ORDER BY cod_user asc ";
                    }					
                    else
                    {
                        $sql =  "select * from usuarios WHERE status = '1' order by cod_user ";
                    }
					$result = mysqli_query($con, $sql) or die (' deu tudo errado');
					$count = mysqli_num_rows($result);
?>