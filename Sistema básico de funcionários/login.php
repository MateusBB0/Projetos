<!-- Página de Login/Rever os dados do Funcionário -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/style.css">
	 <link rel="stylesheet" href="css/buttons.css">
    <link rel="shortcut icon" href="gridrh.jpg" sizes="32x32">
	 
	<title>Login do Funcionário</title>
	<style type="text/css">
		.form-control, .h1-login {
			margin-left:10% ;
		}

		.btn-info{
            margin-left:30% ;
		}

		   .form-control {
		   	margin-top: 10px;
            width: 300px;
            padding: 10px;
            position: relative;
        }
        .h1-login{
        	color: white;
		   	margin-top: 40px;

        }
        a{
            text-decoration: none;
            margin-left:40% ;
        }

		.card_login{
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
			border-radius: 10px;
			width: 400px;
			height: 500px;
			background-color: #060f14;
		}
        #partelogin{
        	display: flex;
        	flex-direction: column;     
            padding: 10px;
			padding-top: 0;
			position: relative;
			width: 100vw;
			height: 100vh;
			justify-content: center;
			align-items: center;
			align-content: center;
			
        }
	</style>
</head>
<body>
	
		<section id="partelogin">
			<div class="card_login">
       

<h1 class="h1-login"><u>Login <br>de Funcionário</u></h1> 
<br>

<form method="post" action="dados_login.php">

<input class="form-control" type="text" name="nome" class="input" placeholder="Nome do funcionário"><br>  
<input class="form-control" type="text" name="identificacao" class="input" placeholder=" Identificacao do funcionário" >
<br>
<button type="submit" class="btn btn-info btn-lg btn-radius"> Logar </button> <br> <br>
<a href = 'index.php' style ='color: white;' >  Cadastro </a> 
</form>
	       </div>
	</section>
	
</body>
</html>