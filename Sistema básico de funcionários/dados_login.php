<!-- Página de olhar os dados do funcionário em forma de Matriz, depois da página "login.php" -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Matriz</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<style>
    .card {
        top: 32vh;
        width: 30%;
        left: 35vw;
        border-radius: 25px;
        background-color: #ffffff61;
        border: 1px solid #c9c5c5;
        position: relative;
    }

    .matriz {
        display: flex;
        justify-content: center;
        align-items: center;
/*        height: 30vh;*/
        font-family: Patua One, sans-serif;
        font-size: 20px;
    }

    table {
        border-collapse: collapse;
    }

    td {
        width: 100px;
        height: 50px;
        text-align: center;
        border-left: 1px solid black;
        border-right: 1px solid black;
        position: relative;
    }

    td:not(:first-child) {
        border-left: none;
    }

    td:not(:last-child) {
        border-right: none;
    }

    td:before {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        color: black;
    }

    td:last-child:before {
        display: none;
    }

    .mxn {
        position: absolute;
        bottom: 70px;
/*        right: 150px;*/
        float: left;
        font-family: Patua One, sans-serif;
        font-size: 16px;
        color: #333;
    }
</style>
</head>
<body>
     <?php
        include_once('conectar_mat.php');
        session_start();

        $funcionario = $_POST['nome'];
        $identificacao = $_POST['identificacao'];
        ?>
<div class='card'>
    <div class='card-body'>
        <span> <b>OBS:</b> Lembre-se do número de Identificação para login!</span>
        <div class='caixa d-flex flex-column justify-content-center align-items-center'>
            <div class="matriz">
                <table id="matriz"></table>
            </div><br>
             <div class="mxn" id="mxn"></div> 
        </div>
        <center>
            <button class='btn btn-success'>
                <a href='index.php' style='color: white;'>Voltar</a>
            </button>

            </button> 
                <?php
                if (isset($identificacao)) {
                    echo "<button class='btn btn-info'><a href='editar_dados.php?identificacao=" . htmlspecialchars($identificacao, ENT_QUOTES, 'UTF-8') . "' style='color: white;'>Editar</a></button>";
                }
            ?>


        </center>
    </div>
</div>

<script>
    // Definindo os dados da matriz
    var matriz = [
        <?php

        if (isset($_POST['nome']) && isset($_POST['identificacao'])) {
            $sql = "SELECT * FROM tb_funcionarios WHERE nome = '".$funcionario."' AND identificacao = '".$identificacao."' ";
            $result = $conn->query($sql);
            //  $nome = $_SESSION['nome'];
            // $identificacao = $_POST['identificacao'];
            // header("Location: ver_dados_funcionario.php");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    echo "['Nome', '".$row["nome"]."'],";
                    echo "['Email', '".$row["email"]."'],";
                    echo "['Salário', '".$row["salario"]."'],";
                    echo "['Cargo', '".$row["cargo"]."'],";
                    echo  "[' Número', '".$row["identificacao"]."'],";
                     echo "['Nascimento', '".$row["data_nasc"]."']";
                }

            } else {
                echo "['', 'Usuário ou Senha inválidos']";
            }
        }
        ?>
    ];

    // Função para criar e exibir a matriz na página
    function criarMatriz() {
        var tabela = document.getElementById('matriz');

        for (var i = 0; i < matriz.length; i++) {
            var linha = document.createElement('tr');

            for (var j = 0; j < matriz[i].length; j++) {
                var celula = document.createElement('td');
                celula.textContent = matriz[i][j];
                linha.appendChild(celula);
            }

            tabela.appendChild(linha);
        }

        // Adicionando a quantidade de linhas e colunas no elemento mxn
        var info = document.getElementById('mxn');
        var m = matriz.length;
        var n = matriz[0].length;
        info.textContent = `${m}x${n}`;
    }

    // Chamando a função para criar a matriz
    criarMatriz();
</script>
</body>
</html>
