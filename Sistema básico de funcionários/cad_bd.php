<!-- Salva os dados do cadastro no B.D -->
<?php
session_start();
include_once("conectar_mat.php");

if(isset($_POST ['submit'] ))
{

$nome =$_POST ['nome'] ;
$cargo =$_POST ['cargo'] ;
$email =$_POST['email'];
$salario = $_POST['salario'];
$identificacao = $_POST ['identificacao'];  
$data_nasc = $_POST ['data_nasc']; 

$_SESSION['cod']= $cod;
$_SESSION["nome"] = $nome;
$_SESSION["cargo"] = $cargo;
$_SESSION["email"] = $email;
$_SESSION["salario"] = $salario;
$_SESSION["identificacao"] = $identificacao;
$_SESSION["nasc"] = $data_nasc;
$result = mysqli_query($conn, "INSERT INTO  tb_funcionarios(nome, email, salario, cargo, identificacao, data_nasc) 
VALUES ('$nome','$email','$salario','$cargo','$identificacao','$data_nasc' )");

 header("Location: ver_dados_funcionario.php?cod=$cod");
}
 ?>