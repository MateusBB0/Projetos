<!-- Formulário de Cadastro -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="shortcut icon" href="gridrh.jpg" sizes="32x32">   
     <title>GridRH</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <style>
        body{
            background-color: #050e13;
        }
        .form-control {
            width: 45vw;
            margin-top: 10px;
            width: 500px;
            padding: 10px;
            position: relative;
        }
        .title-pag-index{
            color: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .inputboxes2{
            
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            border-radius: 10px;
            width: 600px;
            min-height: 500px;
            max-height: 1000px;
            background-color: #060f14;
            color: white;
        
        a{
            text-decoration: none;
        }
        

      </style>
</head>
<body> 
        <h1 class="title-pag-index"><u>GridRH</u> <img src="gridrh.jpg" alt="Logo" style="height: 80px;"></h1>
        <center>
<section class= "box1">
    <div class="inputboxes2">
<h2 class="h1-login"><u>Cadastro de Funcionário</u></h1>


<form action="cad_bd.php" method="post">
        
                
<p> Nome do funcionário</p> 
<input class="form-control" type="text" name="nome" class="input" placeholder="Digite o nome do funcionário" required><br> 
<br>
<p>Cargo do Funcionário</p>   
<input class="form-control" type="text" name="cargo" class="input" placeholder="Digite o cargo do funcionário" required><br> 
<br>
<p>Email</p>   
<input class="form-control" type="email" name="email" class="input" placeholder="Digite o email do funcionário" required><br>
<br> 
<p>Salário</p>   
<input class="form-control" type="text" name="salario" class="input" placeholder="Digite o salário do funcionário" required><br>

<!-- invisível <p>Número de identificação do funcionário</p>    -->
<input class="form-control" type="hidden" name="identificacao" class="input" value="<?php echo rand(1000, 9999); ?>" ><br> 

<!-- substr = consegue limitar a quantidades de caracteres a mostra(limitei em 4);
    uniqid= retorna um identificador único prefixado baseado no tempo atual em milionésimos de segundo; 
    rand = gera números aleatórios;  
    disabled(html) = não consegue clicar e nem digitar nada, está disabilitado.
-->

<br>
<p>Ano de Nascimento</p>   
<input class="form-control" type="date" name="data_nasc" class="input" placeholder="Digite sua data de nascimento/data de nascimento do funcionário" required><br> 
<br>

<button class="btn btn-secondary btn btn-radius" type="submit" name="submit" id="bottom_enviar">Cadastrar Funcionário</button> 
<button class="btn btn-info btn btn-radius" type="button" name="login"><a href = "login.php" style ="color: white;" >  Login </a> </button>
<button class="btn btn-danger btn btn-radius" type="button" ><a href = "entrar_admin.php" style="color:black;">  <b>Admin<b> </a> </button><br><br>


        </div>
</form> </center>
</section>

</body>
</html>