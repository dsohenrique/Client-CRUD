<?php
include "conexao/conexao.php";
?>
<html>
<head>
	<link rel='stylesheet' href="calendar.css" type='text/css'/>
	<link href="../bootstrap/css/stilo_sistema.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.mask.min.js"></script>
	<script type="text/javascript" language="javascript" src='calendar.js'></script>
</head>
<script type="text/javascript" language="javascript">
$('.telefone').mask('(00) 0 0000-0000');
$('.dinheiro').mask('#.##0,00', {reverse: true});
$('.estado').mask('AA');
//valida campos 
function valida_campo()
{
	var cliente 		= form1.cliente.value;
	var endereco	 	= form1.endereco.value;
	var complemento		= form1.complemento.value;
	var telefone 		= form1.telefone.value;
	var bairro			= form1.bairro.value;
	var cidade			= form1.cidade.value;
	var uf				= form1.uf.value;
	var cep				= form1.cep.value;
	var contrato		= form1.contrato.value;
	var cnpj			= form1.cnpj.value;
	var contato_cliente = form1.contato_cliente.value;

	
if(cliente == "")
{
	alert ('O campo do Cliente não pode ser vazio');
	form1.cliente.focus();
	return false;
}
if(endereco == "")
{
	alert ('O campo com Endereço não pode ser vazio');
	form1.endereco.focus();
	return false;
}
if(complemento == "")
{
	alert ('O Campo numero / complemento não pode ser vazio');
	form1.complemento.focus();
	return false;
}
if(telefone == "")
{
	alert ('O campo Telefone não pode ser vazio');
	form1.telefone.focus();
	return false;
}
if(bairro == "")
{
	alert ('O campo Bairro não pode ser vazio');
	form1.bairro.focus();
	return false;
}
if(cidade == "")
{
	alert ('O campo Cidade não pode ser vazio');
	form1.cidade.focus();
	return false;
}
if(uf == "NENHUM")
{
	alert ('O campo UF não pode ser vazio');
	form1.uf.focus();
	return false;
}
if(cep == "")
{
	alert ('O campo CEP não pode ser vazio');
	form1.cep.focus();
	return false;
}

if(contrato == "NENHUM")
{
	alert ('O campo CONTRATO não pode ser vazio');
	form1.contrato.focus();
	return false;
}
if(cnpj == "")
{
	alert ('O campo CNPJ não pode ser vazio');
	form1.cnpj.focus();
	return false;
}
if(contato_cliente == "")
{
	alert ('O campo Contato não pode ser vazio');
	form1.contato_cliente.focus();
	return false;
}
}
	function imprimir(text) {
		text=document
		print(text)
	}
	
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

function verifica() { 
 
campo = document.form.campo.value; 
 
// 1,00
if(campo.length==3) { 
escreve_1 = campo.substring(0,1);
escreve_2 = campo.substring(1,3);
document.form.campo.value = escreve_1+",";
document.form.campo.value+= escreve_2;
} 
 
// 10,00
if(campo.length==4) { 
escreve_1 = campo.substring(0,2);
escreve_2 = campo.substring(2,4);
document.form.campo.value = escreve_1+",";
document.form.campo.value+= escreve_2;
}
 
// 100,00
if(campo.length==5) { 
escreve_1 = campo.substring(0,3);
escreve_2 = campo.substring(3,5);
document.form.campo.value = escreve_1+",";
document.form.campo.value+= escreve_2;
}
 
// 1.000,00
if(campo.length==6) { 
escreve_1 = campo.substring(0,1);
escreve_2 = campo.substring(1,4);
escreve_3 = campo.substring(4,6);
document.form.campo.value = escreve_1+".";
document.form.campo.value+= escreve_2+",";
document.form.campo.value+= escreve_3;
}
 
// 10.000,00
if(campo.length==7) { 
escreve_1 = campo.substring(0,2);
escreve_2 = campo.substring(2,5);
escreve_3 = campo.substring(5,7);
document.form.campo.value = escreve_1+".";
document.form.campo.value+= escreve_2+",";
document.form.campo.value+= escreve_3;
}
 
// 100.000,00
if(campo.length==8) { 
escreve_1 = campo.substring(0,3);
escreve_2 = campo.substring(3,6);
escreve_3 = campo.substring(6,8);
document.form.campo.value = escreve_1+".";
document.form.campo.value+= escreve_2+",";
document.form.campo.value+= escreve_3;
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

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}
</script>
    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
<body>
<div class="container theme-showcase" role="main">
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">	
					<div class="alert alert-info" role="alert">
						<center><h2><font face="Trebuchet MS, Arial, Helvetica, sans-serif" >NOVO CADASTRO</font></h2>
					</div>
				</div>
				<div class="modal-body" align="center">
					<div class="form-group">
						<div class="form-group form-group-lg">
							<table align="center" class="table-striped table-list list">
								<form class="form-horizontal" name="form1" method="POST" action="grava_bd/grava_cliente.php"  >
									<tr>                       
										<td><span>Nome:</span></td>
										<td colspan="5"><input style="text-transform:uppercase" class="form-control" name="cliente" type="text" id="cliente"   /></td>
									</tr>
									<tr>                       
										<td><span>Endereço:</span></td>
										<td colspan="3"><input readonly="readonly" class="form-control" name="endereco" type="text" id="endereco"  /></td>
										<td><span>Num/Compl:</span></td>
										<td><input class="form-control" name="complemento" type="text" id="complemento"  /></td>
									</tr>
									<tr>
										<td><span>CEP:</span></td>
										<td colspan="2"><input class="form-control" name="cep" type="text" id="cep" maxlength="9" OnKeyPress="formatar('#####-###', this)"  /></td>
										<td><span>Bairro:</span></td>
										<td colspan="2" ><input readonly="readonly" class="form-control" name="bairro" type="text" id="bairro"   /></td>
									</tr>
									<tr>                       
										<td><span>Cidade:</span></td>
										<td colspan="3"><input readonly="readonly" class="form-control" name="cidade" type="text" id="cidade"  /></td>
										<td><span>Uf:</span></td>
										<td>
											<select class="form-control" name = "uf" id="uf"  >
											<option value="NENHUM"></option>
											<option value="AC">Acre</option> 
											<option value="AL">Alagoas</option> 
											<option value="AM">Amazonas</option> 
											<option value="AP">Amapá</option> 
											<option value="BA">Bahia</option> 
											<option value="CE">Ceará</option> 
											<option value="DF">Distrito Federal</option> 
											<option value="ES">Espírito Santo</option> 
											<option value="GO">Goiás</option> 
											<option value="MA">Maranhão</option> 
											<option value="MT">Mato Grosso</option> 
											<option value="MS">Mato Grosso do Sul</option> 
											<option value="MG">Minas Gerais</option> 
											<option value="PA">Pará</option> 
											<option value="PB">Paraíba</option> 
											<option value="PR">Paraná</option> 
											<option value="PE">Pernambuco</option> 
											<option value="PI">Piauí</option> 
											<option value="RJ">Rio de Janeiro</option> 
											<option value="RN">Rio Grande do Norte</option> 
											<option value="RO">Rondônia</option> 
											<option value="RS">Rio Grande do Sul</option> 
											<option value="RR">Roraima</option> 
											<option value="SC">Santa Catarina</option> 
											<option value="SE">Sergipe</option> 
											<option value="SP">São Paulo</option> 
											<option value="TO">Tocantins</option>
											</select> 
										</td>
									</tr>
									<tr> 
										<td><span>Telefone:</span></td>
										<td><input class="form-control" name="telefone" type="text" id="telefone" maxlength="15" onkeypress="mascara('mtel', this)" /></td>
										<td><span>Fax:</span></td>
										<td><input class="form-control" name="fax" type="text" id="fax"  /></td></td>
										<td><span>Contrato:</span></td>
										<td>
											<select class="form-control" name = "contrato" id="contrato">
												<option value="NENHUM" 	></option>
												<option value="SIM" 	>SIM</option>
												<option value="NAO" 	>NAO</option>
												<option value="INATIVO" >INATIVO</option>					
											</select>
										</td>
									</tr>
									<tr>                       
										<td><span>CNPJ/CPF:</span></td>
										<td><input class="form-control" type="text" name='cnpj' id="cnpj" maxlength="18" onkeypress='mascaraMutuario(this,cpfcnpj)'  /></td>           
										<td><span>IE:</span></td>
										<td><input class="form-control" name="ie" type="text" id="ie"  /></td>
										<td><span>Valor:</span></td>
										<td><input class="form-control" name="valor_hora" type="text" id="valor_hora" class="dinheiro"  onblur="verifica()" maxlength="12" /></td>
									</tr>
									<tr>
										<td><span>Contato:</span></td>
										<td><input class="form-control" name="contato_cliente" type="text" id="contato_cliente"  /></td>
										<td><span>E-Mail:</span></td>
										<td><input class="form-control" name="email" type="email" id="email"   /></td>
										<td><span>Data:</span></td>
										<td><input class="form-control" name="data" type="date" id="data"  value="<?php echo date('Y-m-d');?>"/></td>
									</tr>
									<tr>
										<td><span>Observação:</span></td>
										<td colspan="5" align="left"><textarea class="form-control" name="observacao" id="observacao" cols="72" rows="5"></textarea></td>
									</tr>															
										<div class="modal-footer" align="center">
											<table align="center">
												<td colspan="1">            
													<td><br><br>
														<button type="submit" class="btn btn-primary" onclick="return valida_campo()"  onClick="submit()"  >Cadastrar</button>
														<button type="reset" class="btn btn-primary">Limpar</button>
														<a href="index.php"><button type="button" class="btn btn-primary">Cancelar</button> </a>
													</td>
												</td>
											</table>
										</div>
								</form>
							</table>
						</div>
					</div>
				</div>
			</div>
  		<script>
			$(document).ready(function () {
				$('#myModal').modal({backdrop: 'static', keyboard: false})  ;
			});
		</script>
		</div>
	</div>
</div>
</body>
</html>		