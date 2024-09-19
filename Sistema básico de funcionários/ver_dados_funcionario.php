<!-- Ver dados do funcionário pós-login -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Matriz</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="gridrh.jpg" sizes="32x32">

<style>
    a{
        text-decoration:none;
    }
    
   
    .card{
        top: 32vh;
        width: 30%;
        left:35vw;
        border-radius: 25px;
        background-color: #ffffff61;
        border:1px solid #c9c5c5;
    }

    .matriz {
        display: flex;
        justify-content: center;
        align-items: center;
/*        height: 30vh;*/
    }

    table {
        border-collapse: collapse;
    }

    td {
        width: 150px;
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
</style>
</head>
<body>
<?php
// exibir dados do usuário cadastrado
session_start();

include('conectar_mat.php');
$identificacao = $_SESSION["identificacao"];
$nome = $_SESSION["nome"];

if (isset($_SESSION['nome']) && isset($_SESSION['identificacao'])) {
    $sql_user = "SELECT * FROM tb_funcionarios WHERE identificacao ='".$identificacao."' AND nome = '".$nome."' ";
    $result = $conn->query($sql_user);
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<div class ='card'>";
            echo "<div class ='card-body'>";
            echo "        <span> <b>OBS:</b> Lembre-se do número de <u>Identificação</u> para login!</span> ";
                echo "<div class ='caixa d-flex flex-column justify-content-center align-items-center'> ";
                        echo "<div class='matriz'>";
                            echo "<table>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>Nome</td>";
                                    echo "<td>".$row["nome"]."</td>";
                                    echo "</tr>";
                                      echo "<tr>";
                                    echo "<td>Email</td>";
                                    echo "<td>".$row["email"]."</td>";
                                    echo "</tr>";
                                     echo "<tr>";
                                    echo "<td>Salário</td>";
                                    echo "<td>".$row["salario"]."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Cargo</td>";
                                    echo "<td>".$row["cargo"]."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Número</td>";
                                    echo "<strong><td>".$row["identificacao"]."</td></strong>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>Nascimento</td>";
                                    echo "<td>".$row["data_nasc"]."</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";
                        echo "</div>";
                            echo " </button> <button class='btn btn-success'><a href = 'index.php' style ='color: white;' >  Voltar </a> </button>";
                              echo "<button class='btn btn-info'><a href='editar_dados.php?identificacao=".$identificacao."' style='color: white;'>Editar</a></button>";

                            
                echo "</div>";
                echo "</div>";
            echo "</div>";

    } else {
        echo '<br>';
        echo "Nenhum resultado encontrado.". $conn->error;
    }
}
?>
</body>
</html>
