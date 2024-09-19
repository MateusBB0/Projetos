<?php
session_start();
include_once('conectar_mat.php');

 if (isset($_SESSION['admin_logged_in']) || isset($_GET['identificacao'])) {
    $identificacao = $_GET['identificacao'];

    // Busca os dados atuais do funcionário
    $sqlSelect = "SELECT * FROM tb_funcionarios WHERE identificacao = $identificacao";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->execute();
    $result_user = $stmt->get_result();

    if ($result_user->num_rows > 0) {
        $alt = $result_user->fetch_assoc();
        $nome = $alt['nome'];
        $cargo = $alt['cargo'];
        $data_nasc = $alt['data_nasc'];
        $email = $alt['email'];
        $salario = $alt['salario'];
    } else {
        echo "Funcionário não encontrado.";
        exit;
    }

    // Atualiza os dados do funcionário se o formulário for enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $data_nasc = $_POST['data_nasc'];
        $email = $_POST['email'];
        $salario = $_POST['salario'];

        $sqlUpdate = "UPDATE tb_funcionarios SET nome = ?, cargo = ?, data_nasc = ?, email = ?, salario = ? WHERE identificacao = ?";
        $stmt_update = $conn->prepare($sqlUpdate);
        $stmt_update->bind_param("ssssss", $nome, $cargo, $data_nasc, $email, $salario, $identificacao);

        if ($stmt_update->execute()) {
            echo "<div class='alert alert-success'>Alteração Salva com sucesso! </div>";

        } else {
            echo "<div class='alert alert-danger'>Erro ao atualizar as informações: " . $conn->error. "</div>";
        }
    }
} else {
     echo "Acesso não autorizado ou identificação não fornecida.";
     exit;
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GridRH - Editar dados do funcionário</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="shortcut icon" href="gridrh.jpg" sizes="32x32">  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .form-control {
            width: 45vw;
        }
        
        a {
            text-decoration: none;
        }
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
        .h1-login{
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
    <!-- Formulário de Edição -->
    <center>
        
        <section class="box1">
            <form action="#" method="post">
                <div class="inputboxes2">
                    <h1 class="h1-login"><u>Editar dados do funcionário</u></h1>
                    <p>Nome do funcionário</p>
                    <input class="form-control" type="text" name="nome" placeholder="Digite o nome do funcionário" value='<?php echo $nome; ?>'><br>
                    <br>
                    
                    <?php
                    if ( isset($_SESSION['admin_logged_in']) ) {
                        echo "<p>Cargo do Funcionário</p>";
                        echo "<input class='form-control' type='text' name='cargo' placeholder='Digite o cargo do funcionário' value='  $cargo '><br>
                    <br>";
                    }else{
                         echo "<p hidden>Cargo do Funcionário</p>";
                    echo "<input class='form-control' type='text' name='cargo' placeholder='Digite o cargo do funcionário' value='  $cargo ' hidden><br>
                    <br>";
                    }
                    

                    ?>


                    <p>Email</p>
                    <input class="form-control" type="email" name="email" placeholder="Digite o email do funcionário" value='<?php echo $email; ?>' required><br>
                    <br>
                   <?php

                    if (isset($_SESSION['admin_logged_in'])) {
                    echo "<p>Salário</p>";
                    echo "<input class='form-control' type='text' name='salario' placeholder='Digite o salário do funcionário' value=' $salario ' required><br>
                    <br>";
                    }else{
                        echo "<p hidden>Salário</p>";
                    echo "<input class='form-control' type='text' name='salario' placeholder='Digite o salário do funcionário' value=' $salario ' required hidden><br>
                    <br>";

                    }
                    ?>

                    <input class="form-control" type="hidden" name="identificacao" value="<?php echo $identificacao; ?>"><br>
                    <br>
                    <p>Ano de Nascimento</p>
                    <input class="form-control" type="date" name="data_nasc" value='<?php echo $data_nasc; ?>' required><br>
                    <br>
                    <button class="btn btn-primary" type="submit">Salvar Alterações</button>
                    <!-- <button class="btn btn-secondary" type="button" onclick="window.location.href='dados_login.php'">Cancelar</button> -->
                    <?php  
                    if (isset($_SESSION['admin_logged_in'])) {
                        echo '<a class="btn btn-secondary" href="pag_admin.php">Voltar</a>';
                    }else{
                         echo '<a class="btn btn-secondary" href="login.php">Voltar</a>';
                    }
                         echo"<br><br>";

                     ?>
                </div>
            </form>
        </section>
    </center>

</body>
</html>
