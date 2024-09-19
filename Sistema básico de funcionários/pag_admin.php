<!-- Página do Administrador pós-login -->

<?php
session_start();
include('conectar_mat.php');

// Verifica se o usuário está logado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_user = $_POST['admin'];
    $identificacao = $_POST['senha'];

    // Substitua esses valores pelos seus dados de login de administrador
    $valid_user = 'Admin';

      $valid_pass = "SELECT * FROM tb_funcionarios WHERE identificacao = ? AND nome = ?";
    $stmt = $conn->prepare($valid_pass);
    $stmt->bind_param("is", $identificacao, $admin_user); // "is" significa inteiro e string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        echo "Credenciais inválidas.";
        header('Location: entrar_admin.php');

        exit;
    }
} elseif (!isset($_SESSION['admin_logged_in'])) {
    header('Location: entrar_admin.php');
    exit;
}

// Exibir todos os funcionários
$sql = "SELECT * FROM tb_funcionarios WHERE nome <> 'Admin' ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard do Administrador</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/buttons.css">

<style>
    h2{
        color: white;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
        color: white;
        
    }
    th {
        background-color: #f4f4f4;
        color: gray!important;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Dashboard do Administrador</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Salário</th>
                <th>Cargo</th>
                <th>Número</th>
                <th>Nascimento</th>
                <th colspan="2">Edições</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>R$ " . $row['salario'] . "</td>";
                    echo "<td>" . $row['cargo'] . "</td>";
                    echo "<td>" . $row['identificacao'] . "</td>";
                    echo "<td>" . $row['data_nasc'] . "</td>";
                    echo "<td><form action='deletar_user_btn.php' method='post' style='display:inline-block;'><input type='hidden' name='identificacao' value='" . $row['identificacao'] . "'><button type='submit' class='btn btn-danger btn btn-radius'>Deletar</button></form></td>";

                    echo "<td> <a href='editar_dados.php?identificacao=" . $row['identificacao'] . "' class='btn btn-warning btn btn-radius' style='color: white;'>Editar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum funcionário encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="admin_logout.php" class='btn btn-secondary btn btn-radius'>Logout</a>
</div>
</body>
</html>
