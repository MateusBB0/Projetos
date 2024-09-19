<!-- Página de Login para o Administrador -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entrar admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/buttons.css">


    <link rel="shortcut icon" href="gridrh.jpg" sizes="32x32">
	

	<style type="text/css">
		body{
			background-color: #050e13;
		}
		#boxadm{
			padding: 10px;
			padding-top: 0;
			display: flex;
			flex-direction: column;
			position: relative;
			width: 100vw;
			height: 100vh;
			justify-content: center;
			align-items: center;
			align-content: center;
			
			
		}
		.card_adm{
			box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
			border-radius: 10px;
			width: 300px;
			height: 400px;
			background-color: #060f14;
		}
		input{
			margin-bottom:30px;
			border-radius: 5px;
			border-color: grey;
		}
		h2{
			margin-left: 15%;
			margin-top: 20px;
			border-top: none;
			color: white;
			border-radius: 5px 5px 5px 5px;
		}
		input[type="text"],[type="password"]{
            border: none;
            outline: none;
            padding: 10px;

		}
       .btn-info{
       	position: relative;
        left: 25%;
       }
       .btn-success{
       	position: relative;
        left: 20%;
       }

	</style>

</head>
<body>
	<section id="boxadm">
		<div class="card_adm">
		
	<h2> <u>ADM</u></h2>

	<br>
	<form method="POST" action="pag_admin.php">
		<center>
		<input type="text" name="admin" placeholder="Nome" class="input"><br>
		<input type="password" name="senha" placeholder="Código de identificação" class="input"><br>
		<br>
	</center>
	       <input type="submit" name="submit" class="btn btn-info btn-lg btn-radius"><br>
<center><a href = 'index.php' style ='color: white;' >  Cadastro </a> </center>
         </div>
	</form>
</section>
</body>
</html>